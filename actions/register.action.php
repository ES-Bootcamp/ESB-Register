<?php
session_start();
require '../config/database.php';
require '../helpers/validate.php';
if(isset($_POST["register-button"])){
    $user=$_POST['username'];

    $pass=$_POST['password'];
    $pass_R=$_POST['Repeat_password'];

    $email=$_POST['email'];
    

    //uservalidation
    
    $user=validateUser($user);
    validatePassword($pass);
    validatePasswordRegister($pass,$pass_R);
    validateEmail($email);
    validateNewUser($user,$pdo);
    try{
            $pdo->beginTransaction();
            $stmt = $pdo->prepare('INSERT INTO users(user,password,email) values(?,?,?)');
        if(isset($stmt)){
            $password=password_hash($pass, PASSWORD_DEFAULT);
            $stmt->execute([$user,$password,$email]);
        }else{
            $errors['dbError'] = "Values couldn't be set correctly, We are having deficulty with our databases";
            $_SESSION['username_value'] = $user;
            $_SESSION['errors'] = $errors;
            $pdo->rollBack();
            header('Location: /ESB-Register/ESB-Register/register.php');
            exit;
        }
            $pdo->commit();
            $_SESSION["succes_register"]=true;
            header('Location: /ESB-Register/ESB-Register/login.php');
    }catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }

}else{
    $errors['register'] = "Please register here";
    $_SESSION['username_value'] = $user;
    $_SESSION['errors'] = $errors;
    header('Location: /ESB-Register/ESB-Register/register.php');
    exit;
}