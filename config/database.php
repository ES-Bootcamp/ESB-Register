<?php 
try {

    $dsn = 'mysql:host=localhost;dbname=ESBRegister;port=3308;charset=utf8';

    $db_user = 'root';
    $db_pass = 'root';

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);
    
}catch(PDOException $e){
    throw new PDOException($e->getMessage());
}

