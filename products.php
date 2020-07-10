<?php

    try{
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
        );
        $dbh = new PDO("mysql:host=localhost;dbname=bazaProjekt3", "root", "", $options);
        
        
        $stmt = $dbh->prepare("SELECT * FROM products");

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        
        $countResults = $stmt->rowCount();
        $row = $stmt->fetchAll();
        // $i = 0;
        // while($row = $stmt->fetch()){
        //     $i++;
        //     $number = $row['name_product'];
        //     $numberId = $i.$number;
        //     echo $numberId;
        // }


        $stmt->closeCursor();

        $dbh = null;

    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
    }

?>