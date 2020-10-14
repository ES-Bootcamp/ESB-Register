<?php if(php_sapi_name() != 'cli') die("Please run this script from terminal");

if(!isset($argv[1])){
    echo "\n\e[31mPlease specify a number of records to insert!\n\n";
    exit;
}
/**
 * PDO Connection data
 */
$dsn = 'mysql:host=localhost;dbname=ESBRegister';
$user = 'root';
$pass = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
/**
 * Connect to the database
 */
try{
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "\e[32mConnected to databases successfully...\n";
}catch(PDOException $e){
    throw new PDOException($e->getMessage());
}
/**
 * Insert records in DB
*/
if(isset($argv[1])){
    try{
        $pdo->beginTransaction();
        echo "\e[32mPreparing values...\n";
        $query = $pdo->prepare("INSERT INTO users(user,password,email) VALUES(:user, :pass, :email)");
        echo "\e[32mSetting values...\n";
        
        if(isset($query)){
            $user = "user_";
            $password = password_hash("abcd1234", PASSWORD_DEFAULT);
            $email = "mmm@mmm.com";

            echo "\e[32mValues set correctly...\n";
            echo "\e[32mInserting records...\n";

            for($i = 1; $i <= $argv[1]; $i++){
                $query->bindValue(":user", $user.$i);
                $query->bindValue(":pass", $password);
                $query->bindValue(":email", $email);
                $query->execute();
            }
        }else{
            echo "\e[31mValues couldn't be set correctly... exiting\n";
            exit;  
        }
        $pdo->commit();
        echo "\e[32m".$argv[1]." Records inserted successfully!\n";
    }catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }
}