<?php 
    session_start();
    try{
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
        );
        $dbh = new PDO("mysql:host=localhost;dbname=bazaProjekt3", "root", "", $options);
        
        $email = $_POST['singOutEmail'];
        $login = $_POST['singOutLogin'];
        $name = $_POST['singOutName'];
        $surname = $_POST['singOutSurname'];
        $pass = $_POST['singOutPassword'];

        $stmt = $dbh->prepare(
            "INSERT INTO klienci (email, login, password, name, surname)  VALUES (:email, :login, :pass, :name, :surname)"
        );
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":surname", $surname, PDO::PARAM_STR);
        
        $salt = 'dsanio$(*)!?lPDS32432SDMkl#!';
        $pass = hash("sha512", $salt.$pass);
        $stmt->bindValue(":pass", $pass, PDO::PARAM_STR);
        $stmt->execute();

        $id_Customer = $dbh->lastInsertId();

        $_SESSION['currentUserId'] = $id_Customer;
        $_SESSION['currentUserLogin'] = $login;
        $_SESSION['currentUserSurname'] = $surname;
        $_SESSION['currentUserName'] = $name;
        $_SESSION['currentUserEmail'] = $email;
            
        $_SESSION['existTryAndFail'] = 0;
        unset($_SESSION['existTryAndFail']);
        header("Location: index.php");
        
        $dbh = null;

    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
        $_SESSION['existTryAndFail'] = 2;
        header("Location: index.php");
    }
?>