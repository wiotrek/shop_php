<?php
    session_start();
    if(!isset($_SESSION['currentUserId']))
        header("Location: index.php");

    try{
        $orderGetIdProduct = $_POST['get_id_product'];
        $orderGetAmountProduct = $_POST['get_amount_product'];
        $orderGetCurrentSite = $_POST['get_current_site'];
        $currentUser = $_SESSION['currentUserId'];

        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
        );
        $dbh = new PDO("mysql:host=localhost;dbname=bazaProjekt3", "root", "", $options);
        
        
        $stmt = $dbh->prepare(
            "INSERT INTO orders (id_customer, id_product, amount_product)  VALUES (:currentUser, :orderGetIdProduct, :orderGetAmountProduct)"
        );

        $stmt->bindValue(":currentUser", $currentUser, PDO::PARAM_INT);
        $stmt->bindValue(":orderGetIdProduct", $orderGetIdProduct, PDO::PARAM_INT);
        $stmt->bindValue(":orderGetAmountProduct", $orderGetAmountProduct, PDO::PARAM_INT);

        $stmt->execute();
        $stmt->closeCursor();

        $dbh = null;

    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
    }
?>