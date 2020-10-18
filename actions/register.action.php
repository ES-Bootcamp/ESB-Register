<?php
require "../config/database.php";
require "../helpers/validate.php";


try{
    $username=$_POST["username"];
    $password=$_POST["password"];
    $rpassword=$_POST["rpassword"];
    //  $email=$_POST["email"];
    $email = ($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      echo $emailErr;
    }

    $pdo->beginTransaction();
    $query1=$pdo->prepare("SELECT * FROM `users` WHERE `user` = ? LIMIT 1");
    //$query->bindValue(":user",$username);
    $query1->execute([$username]);
    $result = $query1->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);
    //var_dump($result);
    
   
    if (!isset($result)){
    
        echo "this username is already used";


    }else{
           try {
           // $pdo->beginTransaction();// need to know that
            $statment=$pdo->prepare('INSERT INTO users(user,password,email)
                        VALUES(:user, :pass, :email)');
        
          $statment->bindValue(":user",$username);
          $statment->bindValue(":pass",$password);
          $statment->bindValue(":email",$email);
          $statment->execute();
        
        
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        
        
        }

    }


}catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();


}

