<?php

    session_start();

    $login = $_POST['login'];
    $pass = $_POST['loginPassword'];

    try{
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
        );
        $dbh = new PDO("mysql:host=localhost;dbname=bazaProjekt3", "root", "", $options);
        
        
        $stmt = $dbh->prepare("SELECT * FROM klienci WHERE login= :login AND password= :pass LIMIT 1;");

        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $salt = 'dsanio$(*)!?lPDS32432SDMkl#!';
        $pass = hash("sha512", $salt.$pass);
        $stmt->bindValue(":pass", $pass, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $stmtFetch = $stmt->fetchAll();

        if( count($stmtFetch) ){
            $_SESSION['currentUserId'] = $stmtFetch[0]['id'];
            $_SESSION['currentUserLogin'] = $stmtFetch[0]['login'];
            $_SESSION['currentUserSurname'] = $stmtFetch[0]['surname'];
            $_SESSION['currentUserName'] = $stmtFetch[0]['name'];
            
            $_SESSION['existTryAndFail'] = 0;
            unset($_SESSION['existTryAndFail']);
            header("Location: index.php");
        }else{
            $_SESSION['existTryAndFail'] = 1;
            header("Location: index.php");
        }
        $stmt->closeCursor();

        $dbh = null;

    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
    }

?>