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
            "SELECT amount_product FROM products WHERE id=$orderGetIdProduct;
            INSERT INTO basketTmp (id_customer, id_product, amount_product)  VALUES (:currentUser, :orderGetIdProduct, :orderGetAmountProduct);"
        );

            // first statement
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $countResults = $stmt->rowCount();
        if(!$countResults)
            throw new PDOException();
            
        $row = $stmt->fetchAll();
        $currentAmount = $row[0]['amount_product'];
        $stmt->closeCursor();

        $newCurrentAmount = ($currentAmount - $orderGetAmountProduct);
        if($newCurrentAmount < 1)
            throw new PDOException();
            
        
            // secound statement

        $stmt->bindValue(":currentUser", $currentUser, PDO::PARAM_INT);
        $stmt->bindValue(":orderGetIdProduct", $orderGetIdProduct, PDO::PARAM_INT);
        $stmt->bindValue(":orderGetAmountProduct", $orderGetAmountProduct, PDO::PARAM_INT);

        $stmt->execute();
        $stmt->closeCursor();

        // third statement
        $stmt = $dbh->prepare("UPDATE products SET amount_product=$newCurrentAmount WHERE id=$orderGetIdProduct;");
        $stmt->execute();
        $stmt->closeCursor();



        $dbh = null;

    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
    }
?>