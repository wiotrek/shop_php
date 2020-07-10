<?php
    include_once('products.php');
    
    session_start();

    if (isset($_GET['logout'])) {
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
        <a href='index.php'><h1>Sklep</h1></a>
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
                if(!isset($_GET['site']) ){

                    // HOME SITE
                    if(isset($_SESSION['currentUserId'])){
                        $currentUserName = $_SESSION['currentUserName'];
                        echo "<h1>Witaj, $currentUserName</h1>";
                    }else{
                        echo "<h1>Witaj w sklepie</h1>";
                    }
                    echo "<h2>Mamy nadzieje, że spodobają Ci się nasze produkty</h2>";
                    echo "<a href='?site='><h2 class='mainLookProducts'>Zobacz nasze produkty</h2></a>";
                }else{
                    if($countResults){
                        for ($i=0; $i < $countResults; $i++) { 
                            echo "<article>";
                            echo "<img class='picture' src='assets/".$row[$i]['picture_product']."' />";
                            echo "<div class='description'>";
                            echo "<h2>".$row[$i]['name_product']."</h2>";
                            echo "<table><tr><td>Kategoria: </td><td>".$row[$i]['category_product']."</td></tr>";
                            echo "<tr><td>Rozmiar: </td><td>".$row[$i]['size_product']."</td></tr>";
                            echo "<tr><td>Cena: </td><td>".$row[$i]['price_product']." zł</td></tr>";
                            echo "</table>";
                                if(isset($_SESSION['currentUserId'])){
                                    echo "<div class='descriptionFooter'>";
                                    echo "<button class='minuse'>-</button><input type='text' value='0' class='how'/><button class='pluse'>+</button><button class='addToBasket'>Dodaj</button>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</article>";
                                }else{
                                    echo "</div>";
                                    echo "</article>";
                                }
                            
                        }
                    }else{
                        echo "<article><h2>Niestety aktualnie brak towaru</h2></article>";
                    }

                    
                    

                }
            ?>
        </div>
        <?php
                if(isset($_SESSION['existTryAndFail'])){
                    switch ( $_SESSION['existTryAndFail']) {
                        case '0':
                            echo "";
                            break;
                        case '1':
                            echo '<div class="existTryAndFailSingIn"></div>';
                            break;
                        case '2':
                            echo '<div class="existTryAndFailSingOut"></div>';
                            break;
                    }
                }
            ?>
    </main>
</body>
</html>