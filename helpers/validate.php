<?php 
function validateUser($user){
    
    if($user == ''){
        
        $errors['user'] = 'Please specify a username';
        $_SESSION['username_value'] = $user;
        $_SESSION['errors'] = $errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }else{
        return htmlspecialchars(stripslashes(trim($user)));
    }
}


function validatePassword($pass){
    if(!isset($pass) || strlen($pass) < 8){
        $errors['password'] = 'Password is too short';
        $_SESSION['username_value'] = $user;
        $_SESSION['errors'] = $errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}


function validatePasswordRegister($input1,$input2){
    if($input1 != $input2){
        $errors['password_registration'] = "Password doesn't match";
        $_SESSION['username_value'] = $user;
        $_SESSION['errors'] = $errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
function validateEmail($email){
    
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
  $errors['email'] = "Invalid email format";
  $_SESSION['username_value'] = $user;
  $_SESSION['errors'] = $errors;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}
}

function validateNewUser($input,$pdo){
    $stmt = $pdo->prepare('SELECT user FROM users where user=?');
    $stmt->execute([$input]);
    if($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $errors['user_exists'] = "this Username already been used";
        $_SESSION['username_value'] = $user;
        $_SESSION['errors'] = $errors;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}