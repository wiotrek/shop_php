<?php
    session_start();

    if (isset($_GET['logout'])) {
        $_SESSION['loggin'] = 0;
        session_destroy();
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt3</title>
    <script src="https://kit.fontawesome.com/03d927952c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="theme.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="headScript.js"></script>
</head>

<body>
    <header>
        <h1>Sklep</h1>
    </header>
    <menu>
        <ul>
            <?php
                if(isset($_SESSION['currentUserId'])){
                    echo "<li><i class='fas fa-shopping-basket'></i></li>";
                    echo "<li><a href='?logout'>Wyloguj sie</a></li>";
                }else{
                    echo "<li class='singIn'>Zaloguj się <i class='fas fa-sign-in-alt'></i></li>";
                    echo "<li class='singOut'>Zarejestruj się</li>";
                }
            ?>
            
        </ul>
    </menu>
    <main>
        <div class='mainHeadQuad'>
            <?php
                if(isset($_SESSION['currentUserId'])){
                    $currentUserName = $_SESSION['currentUserName'];
                    echo "<h1>Witaj, $currentUserName</h1>";
                }else{
                    echo "<h1>Witaj w sklepie</h1>";
                }
            ?>
            <h2>Mamy nadzieje, że spodobają Ci się nasze produkty</h2>
            <h2 class='mainLookProducts'><a href='#'>Zobacz nasze produkty</a></h2>
            <?php
                if(isset($_SESSION['existTryAndFail'])){
                    if($_SESSION['existTryAndFail']){
                        echo '<div id="existTryAndFail"></div>';
                    }
                }
            ?>
        </div>
    </main>
</body>
</html>