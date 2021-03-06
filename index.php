<?php
    include_once('products.php');

    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
    }
    $siteNumber = 1;
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
                    if(isset($_GET['basket']))
                        echo "<li><a href='index.php' class='widtherA'>Powrót</a></li>";
                    else
                        echo "<li><a href='?basket'><i class='fas fa-shopping-basket'></i></a></li>";
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
                    

                    if(isset($_GET['basket'])){
                        if($countResultsOrders){
                            $currentUserName = $_SESSION['currentUserName'];
                            echo "<h2 style='font-size:2em;'>$currentUserName, Twój koszyk:</h2>";

                            echo "<table class='basket'>";
                            $sumPrice = 0;
                            for ($i=0; $i < $countResultsOrders; $i++) { 
                                // here we set id for new rows
                                for($j=0; $j < $countResults; $j++){
                                    if($row[$j]['id'] == $whichGetIdProduct[$i])
                                        $numberIdInRows = $j;
                                }
                                echo "<tr><td>".($i+1).".</td><td style='text-algin:left;'>".$row[$numberIdInRows]['name_product']."</td>";
                                echo "<td>".$row[$numberIdInRows]['size_product']."</td>";
                                echo "<td>".$howGetAmountProduct[$i]." szt</td>";
                                
                                $toSalary = $howGetAmountProduct[$i] * $row[$numberIdInRows]['price_product'];
                                echo "<td>$toSalary zł</td>";
                                
                                echo "</tr>";
                                $sumPrice = $sumPrice + $toSalary;
                            }
                            echo "</table>";
                            echo "<h2>Razem do zapłaty, $sumPrice zł</h2>";
                            echo "<button class='sendOrder'>Złóż zamówienie</button>";
                        }else{
                            echo "<h2>Niestety, nie dodałeś żadnego produktu</h2>";
                        }
                    }else{
                        // HOME SITE
                        if(isset($_SESSION['currentUserId'])){
                            $currentUserName = $_SESSION['currentUserName'];
                            echo "<h1>Witaj, $currentUserName</h1>";
                        }else{
                            echo "<h1>Witaj w sklepie</h1>";
                        }
                        echo "<h2>Mamy nadzieje, że spodobają Ci się nasze produkty</h2>";
                        echo "<a href='?site=$siteNumber'><h2 class='mainLookProducts'>Zobacz nasze produkty</h2></a>";
                    }
                    
                }else{
                    if($countResults){
                        $getSide = $_GET['site'];

                        // Display products while amount products is smaller than $getSide * 5
                        $firstLoopInt = ( $getSide * 5) - 5;
                        if( ($getSide * 5) > $countResults){
                            $secoundLoopInt = $countResults;
                            $lastSide = true;
                        }else{
                            $secoundLoopInt = $getSide * 5;
                            $lastSide = false;
                        }

                        for ($i=$firstLoopInt; $i < $secoundLoopInt; $i++) { 
                            echo "<form action='basketTmp.php' method='post'>";
                            echo "<input type='hidden' name='get_id_product' value='".$row[$i]['id']."'/>";
                            echo "<input type='hidden' name='get_current_site' value='$getSide'/>";
                            echo "<article>";
                            echo "<img class='picture' src='assets/".$row[$i]['picture_product']."' />";
                            echo "<div class='description'>";
                            echo "<h2>".$row[$i]['name_product']."</h2>";
                            echo "<table><tr><td>Kategoria: </td><td>".$row[$i]['category_product']."</td></tr>";
                            echo "<tr><td>Rozmiar: </td><td>".$row[$i]['size_product']."</td></tr>";
                            echo "<tr><td>Cena: </td><td>".$row[$i]['price_product']." zł</td></tr>";
                            echo "<tr><td>Ilość: </td><td>".$row[$i]['amount_product']." szt</td></tr>";

                            echo "</table>";
                                if(isset($_SESSION['currentUserId'])){
                                    echo "<div class='descriptionFooter'>";
                                    echo "<button class='minuse'>-</button><input type='text' value='0' name='get_amount_product'/><button class='pluse'>+</button>";
                                    echo "<button class='addToBasket'>Dodaj</button>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</article>";
                                }else{
                                    echo "</div>";
                                    echo "</article>";
                                }
                            echo "</form>";
                        }
                        echo "<div class ='mainFooter'>";
                        if($getSide > 1)
                            echo "<a href='?site=".($getSide-1)."' class='buttonMainFooter'>Poprzednia</a>";
                        if(!$lastSide)
                            echo "<a href='?site=".($getSide+1)."' class='buttonMainFooter'>Następna</a>";
                        echo "</div>";
                            
                    
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