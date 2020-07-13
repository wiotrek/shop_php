<?php
    session_start();
    if(!isset($_SESSION['currentUserId']))
        header("Location: index.php");


    // header("Location: index.php?site=1");
     $orderGetIdProduct = $_POST['get_id_product'];
    // $_POST['get_amount_product'] = $orderGetAmountProduct;
    // $_POST['get_current_site'] = $orderGetAmountProduct;

    echo $orderGetIdProduct;


?>