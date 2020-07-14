<?php
    session_start();
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
        $stmt->closeCursor();


        // query for basket
        $userIdInProducts = $_SESSION['currentUserId'];
        $stmt_orders = $dbh->prepare(
            "SELECT * FROM basketTmp WHERE id_customer=$userIdInProducts"
        );
        $stmt_orders->setFetchMode(PDO::FETCH_ASSOC);
        $stmt_orders->execute();
        
        $countResultsOrders = $stmt_orders->rowCount();
        $row_orders = $stmt_orders->fetchAll();
        
        $whichGetIdProduct = array();
        for ($i=0; $i < $countResultsOrders; $i++) { 
            array_push($whichGetIdProduct, intval($row_orders[$i]['id_product']));
        }
        $howGetAmountProduct = array();
        for ($i=0; $i < $countResultsOrders; $i++) { 
            array_push($howGetAmountProduct, $row_orders[$i]['amount_product']);
        }
        $stmt_orders->closeCursor();

        $dbh = null;

    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
    }

?>