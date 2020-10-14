<?php 
session_start();
require '../config/database.php';
try{
    
    $user = $_POST['user'];
    $pass = $_POST['password'];
    
    $errors = [];
    $stmt = $pdo->prepare('SELECT * FROM users WHERE user=? LIMIT 1');
    $stmt->execute([$user]);
    if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        if(password_verify($pass, $result['password'])){
            header('Location: ../dashboard/index.php');
            $_SESSION['is_logged_in'] = true;
        }else{
            $errors['password']= 'password is incorrect';
            $_SESSION['errors'] = $errors;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        print_r($result);
    }else{
        $errors['user']= 'user not found';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        $_SESSION['errors'] = $errors;
    }
}catch(Exception $e){
    throw new Exception();
}



