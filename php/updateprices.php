<?php

include_once "productClass.php";
include_once 'getProductPrices.php';
session_start();


$count = $_SESSION['count'];

function updatequantities(){
    $qtyarr = array();
    
    for($i = 1; $i <= $_SESSION['count']; $i++){
        if(isset($_POST['quantity'.$i])){
            array_push($qtyarr, $_POST['quantity'.$i]);
        }
        else{
            $novalue = 0;
            array_push($qtyarr, $novalue);
        }
        $q1 = $qtyarr[$i-1];
        echo "$q1\t";
    }
    $_SESSION['productcart'] = "..\TextFiles\productCart.txt";
    $file = $_SESSION['productcart'];

    $filedirect = fopen($file, "r+") or die("cannot open file");

    $newfile = "..\TextFiles\\newqty.txt";
    $newfiledirect = fopen($newfile, "w+") or die("cannot open file");

    $count = 0;
    while(!feof($filedirect)){
        $line = fgets($filedirect);
        $lineArr = explode("\t",$line);
        if((int)$lineArr[3] > 0){
            if ((int)$lineArr[3] == (int)$qtyarr[$count]){
                $count++;
            } else {
                (int)$lineArr[3] = (int)$qtyarr[$count];
                $count++;
            }
            $newqty = $qtyarr[$count];
            echo "$count";
        }

        fwrite($newfiledirect, $lineArr[3]."\n");
        $newline = implode("\t", $lineArr);
        $contents = file_get_contents($file);
        $contents = str_replace($line, $newline, $contents);
        file_put_contents($file, $contents);
    }
}

function totalprice(){
    $subtotal = 0;
    updatequantities();

    $_SESSION['productcart'] = "..\TextFiles\productCart.txt";
    $file = $_SESSION['productcart'];

    $filedirect = fopen($file, "r") or die("cannot open file");

    while(!feof($filedirect)){
        $line = fgets($filedirect);
        $lineArr = explode("\t",$line);
        $subtotal += ((float)$lineArr[2]*(float)$lineArr[3]);
    }

    $total = $subtotal * 1.05 * 1.0998;
    return $total;
}

if(isset($_POST['checkout'])){
    $dataline = $_SESSION['count'] . "\t" . totalprice() . "\t";
 
    for($i = 2; $i <= $_SESSION['count']; $i++){
        $dataline += $_SESSION['prodnum'.($i-1)];
    }
    $file = "..\TextFiles\checkout.txt";
    $filedirect = fopen($file, "w+") or die("cannot open file");
    fwrite($filedirect,$dataline);

    //empties cart
    unset($_SESSION['cart']);

   
}

if(isset($_POST['returnshopping'])){
    updatequantities();
    unset($_SESSION['cart']);
    $file = "..\TextFiles\\newqty.txt";
    $filedirect = fopen($file, "r") or die("cannot open file");
    $linearr = array();
    while(!feof($filedirect)){
        $line = fgets($filedirect);
        array_push($linearr, (int)fgets($filedirect));
        echo "$line";
    }
    $apple = new Item(1, "apple", getPrice("Apple"), $linearr[0], "../Images/apple.png");
    $banana = new item(2, "banana", getPrice("Banana"), $linearr[1], "../Images/banana.jpg");
    $bread = new item(3, "bread", getPrice("Slice Bread"), $linearr[2], "../Images/bread.jpg");
    $broccoli = new item(4, "broccoli", getPrice("Broccoli"), $linearr[3], "../Images/brocco.jpg");
    $carrots = new item(5, "carrots", getPrice("Carrots"), $linearr[4], "../Images/carrots.jpg");
    $cereals = new item(6, "cereals", getPrice("Cereals"), $linearr[5], "../Images/cereal.jpg");
    $cheese = new item(7, "cheese", getPrice("Cheese"), $linearr[6], "../Images/cheese.jpg");
    $chicken = new item(8, "whole chicken", getPrice("Whole Chicken"), $linearr[7], "../Images/chicken.jpg");
    $eggs = new item(9, "dozen of eggs", getPrice("Eggs"), $linearr[8], "../Images/eggs.jpeg");
    $groundbeef = new item(10, "ground beef", getPrice("Ground Beef"), $linearr[9], "../Images/ground-beef.jpg");
    $lobster = new item(11, "lobster", getPrice("Lobster"), $linearr[10], "../Images/lobster.jpg");
    $milk = new item(12, "milk", getPrice("Milk"), $linearr[11], "../Images/milk.jpg");
    $mushrooms = new item(13, "mushrooms", getPrice("Mushrooms"), $linearr[12], "../Images/mushrooms.jpg");
    $pasta = new item(14, "fusilli", getPrice("Fusilli"), $linearr[13], "../Images/pasta.jpg");
    $pear = new item(15, "pear", getPrice("Pear"), $linearr[14], "../Images/pear.jpg");
    $rice = new item(16, "rice", getPrice("Rice"), $linearr[15], "../Images/rice.png");
    $salmon = new item(17, "salmon", getPrice("Salmon"), $linearr[16], "../Images/salmon.jpg");
    $sausages = new item(18, "sausages", getPrice("Two-Sausages"), $linearr[17], "../Images/sausages.jpg");
    $shrimps = new item(19, "shrimps", getPrice("Shrimps"), $linearr[18], "../Images/shrimp.jpg");

    //note bug first qty takes place of previous product

    $_SESSION['cart'] = array($apple, $banana, $bread, $broccoli, $carrots, $cereals, $cheese, $chicken, $eggs, $groundbeef, $lobster, $milk, $mushrooms, $pasta, $pear, $rice, $salmon, $sausages, $shrimps);
    header('Location: Main Page.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Checkout</title>
    <link rel="stylesheet" href="..\CSS\Page UI.css">
    <link rel="icon" type="image/png" href="..\Images\favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="Main Page.php">Online Aisles</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aisles</a>

                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                                <a class="dropdown-item" href="..\php\Product links/fruits.php" target="_self">Fruits
                                </a>
                                <a class="dropdown-item" href="..\php\Product links/meats and poultry.php" target="_self">
                                    Meats
                                    and Poultry </a>
                                <a class="dropdown-item" href="..\php\Product links/seafood.php" target="_self">Seafood </a>
                                <a class="dropdown-item" href="..\php\Product links/dairy and eggs.php" target="_self">Dairy
                                    and
                                    Eggs </a>
                                <a class="dropdown-item" href="..\php\Product links/cereal products.php" target="_self">Cereal
                                    Products </a>
                                <a class="dropdown-item" href="..\php\Product links/Vegetables.php" target="_self">Vegetables
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Back end Pages</a>

                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                                <a class="dropdown-item" href="userList.php" target="_self">User List</a>
                                <a class="dropdown-item" href="productList.php" target="_self"> Product list </a>
                                <a class="dropdown-item" href="orderList.php" target="_self">Order List </a>
                            </div>
                    </li>
                    <li class="nav-item">
                    <?php
                    if (isset($_SESSION['userLoggedIn'])){?>
                        <a class="nav-link" href="logout.php" target="_blank">Logout</a><?php
                    }
                    else{?>
                        <a class="nav-link" href="Login.php" target="_blank">Login / Sign up</a>
                    <?php
                    }
                    ?>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item-dropdown">
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&#9881;</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                                <a class="dropdown-item" href="..\html\Back end\change password.html"> Change
                                    Password</a>
                                <a class="dropdown-item" href="..\html\Back end\account-info.html" target="_self"> Account
                                    Info</a></a>
                                <a class="dropdown-item" href="..\html\Back end\delete-user.php">Delete Account</a>
                                <a class="dropdown-item" href="..\html\logout.html">Log Out</a>
                            </div>
                        </div>
                    </li>
                    </li>
                </ul>
                <div class="shopping-cart-holder">
                    <a class="nav-link-shopping-cart" href="shoppingcart.php" target="_self">&#128722; </a>
                </div>
            </div>
        </nav>

    <div class="container">
        <div class="login" style="text-align: center;">
            <form method="post" action="..\php\logout.php">
                <h3>Thank you for shopping at Online Aisles<em><a href="Signup.php" target="_blank"></a></em></h3>
                <h2>Have a great day</h2>
                <a href="..\php\Main Page.php" target="_self" ><i style="color: blue;">click here to return to main page</i></a>
               

            </form>
            <br>

        </div>
    </div>
    <footer>
        <div class="section contactInfo">
            <h3>Contact Info</h3>
            <ul class="info">
                <li>
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    <p>123 Main Street<br /> Montreal, QC<br /> Canada</p>
                </li>
                <li>
                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <p><a href="tel:5141234567">514-123-4567</a></p>
                </li>
                <li>
                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <p><a href="mailto:zixi.quan@concordia.ca?subject=SOEN287">online_aisles@groceries.ca</a></p>
                </li>
                <li>
                    <span><i class="fa fa-smile-o" aria-hidden="true"></i></span>
                    <p><a href="..\html\contactUsFrom.html">Help us improve your experience</a></p>
                </li>
            </ul>
        </div>
        <div class="section about-us">
            <h3>About Us</h3>
            <p>
                At the start of 2020, the coronavirus pandemic brought on new difficulties for many people with
                pre-existing medical conditions. Something as simple as grocery shopping was now a high risk activity
                for those who were more succeptible to serious illnesses cause by the Covid-19 virus. Our goal is to
                make grocery shopping safe and affordable for all Canadians so that no one is has to face food
                insecurity in these difficult times.
            </p>
            <ul class="icons">
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com/?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://www.youtube.com/"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </footer>
</body>

</html>