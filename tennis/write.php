<?php 
//データの受け取り
$name = $_POST['name'];
$title = $_POST['title'];
$body = $_POST['body'];
$pass = $_POST['pass'];

if($name == '' || $body == ''){
    header("Location: bbs.php");
    exit();
}

if(!preg_match("/^[0-9]{4}$/",$pass)){
    header("Location: bbs.php");
    exit();
}

setcookie('name',$name,time() + 60*60*24*30);

$dsn = 'mysql:host=localhost;dbname=tennis;charset=utf8';
$user = 'root';
$password = '';

try{
    $db = new PDO($dsn,$user,$password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $statement = $db->prepare("
    INSERT INTO bbs (name,title,body,date,pass)
    VALUES (:name,:title,:body,now(),:pass)
    ");

    $statement->bindParam(':name',$name,PDO::PARAM_STR);
    $statement->bindParam(':title',$title,PDO::PARAM_STR);
    $statement->bindParam(':body',$body,PDO::PARAM_STR);
    $statement->bindParam(':pass',$pass,PDO::PARAM_STR);

    $statement->execute();
    header('Location:bbs.php');
    exit();

}catch(PDOException $e){
    // echo 'ddd';ok
   exit('エラー:'.$e->getMessage());
   
}
