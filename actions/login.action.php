<?php 
session_start();
require '../config/database.php';
require '../helpers/validate.php';
try{
    //information from login page 
    $user = $_POST['user'];
    $pass = $_POST['password'];
    //validation user
    $user = validateUser($user);
    //validation password
    validatePassword($pass);
    //Transaction begin
    $errors = [];
    $pdo->beginTransaction();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user=? LIMIT 1');
    $stmt->execute([$user]);
    if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        if(password_verify($pass, $result['password'])){
            $_SESSION['is_logged_in'] = true;
            $_SESSION['username_value'] = $user;
            $pdo->commit();
            header('Location: ../dashboard/index.php');
        }else{
            $errors['password']= 'password is incorrect';
            $_SESSION['errors'] = $errors;
            $_SESSION['username_value'] = $user;
            if($pdo->inTransaction()){
                $pdo->rollBack();
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        print_r($result);
    }else{
        $errors['user']= 'user not found';
        $_SESSION['username_value'] = $user;
        if($pdo->inTransaction()){
            $pdo->rollBack();
        }
        $_SESSION['errors'] = $errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}catch(Exception $e){
    throw new Exception();
}



