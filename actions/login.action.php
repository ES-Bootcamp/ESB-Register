<?php 
session_start();
require '../config/database.php';
require '../helpers/validate.php';
try{
    
    $user = $_POST['user'];
    $pass = $_POST['password'];
    if($user == ''){
        $user = validate($user);
        $errors['user'] = 'Please specify a username';
        $_SESSION['username_value'] = $user;
        $_SESSION['errors'] = $errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    if(!isset($pass) || strlen($pass) < 8){
        $errors['password'] = 'Password is too short';
        $_SESSION['username_value'] = $user;
        $_SESSION['errors'] = $errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    $errors = [];
    $pdo->beginTransaction();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user=? LIMIT 1');
    $stmt->execute([$user]);
    if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        if(password_verify($pass, $result['password'])){
            $_SESSION['is_logged_in'] = true;
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



