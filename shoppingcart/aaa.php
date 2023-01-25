<?php 
    try{
        echo 'aaa';
        $db = new PDO('mysql:host=localhost;dbname=shopping;charset=utf8','root','');
         $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
         $statement = $db->prepare("
        SELECT product (name,num,price)
         VALUES (:name,:num,:price)
         ");
    
         $statement->bindParam(':name',$name,PDO::PARAM_STR);
         $statement->bindParam(':num',$num,PDO::PARAM_INT);
         $statement->bindParam(':price',$price,PDO::PARAM_INT);
        
         $result = $statement->fetchAll();
         var_dump($result);
    
        $statement->execute();
  
    }catch(PDOException $e){
        // echo 'ddd';ok
       exit('エラー:'.$e->getMessage());
       
    }
?>