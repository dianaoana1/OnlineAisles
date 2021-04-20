<?php 

if(!isset($_SESSION)) {
    session_start();
}

require_once("../../php/getProductPricesProducts.php");
$product="Banana";
$productCurrPrice=getPrice($product);





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bananas</title>

    <meta charset="utf-8" name=>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="..\../CSS/aisles.css">
    <script src="..\..\JavaScript\ItemDetails.js"></script>
    <script type="text/javascript" src="..\..\JavaScript\weeklydealsProduct.js"></script>
    <link rel="stylesheet" href="..\..\CSS\Page UI.css">
    <link rel="icon" 
    type="image/png" 
    href="..\..\Images\favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script>
        var name = "banana";
    </script>
        <script type="text/javascript" srx="..\..\JavaScript\weeklydeals.js"></script>
        <script type = "text/javascript" src = "..\..\JavaScript\cart.js" async></script>

</head>


<body style="height: 100%;width: 100%;">
<nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <a class="navbar-brand" href="..\Main Page.php">Online Aisles</a>
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
                            <a class="dropdown-item" href="../Product links/fruits.php"
                                target="_self">Fruits
                                </a>
                            <a class="dropdown-item" href="../Product links/Vegetables.php" target="_self">Vegetables </a>
                            <a class="dropdown-item" href="../Product links/meats and poultry.php" target="_self">
                                Meats
                                and Poultry </a>
                            <a class="dropdown-item" href="../Product links/seafood.php" target="_self">Seafood </a>
                            <a class="dropdown-item" href="../Product links/dairy and eggs.php" target="_self">Dairy
                                and
                                Eggs </a>
                            <a class="dropdown-item" href="../Product links/cereal products.php" target="_self">Cereal
                                Products </a>
                            
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Back end Pages</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="..\..\php\userList.php" target="_self">User List</a>
                            <a class="dropdown-item" href="..\..\php\productList.php" target="_self"> Product list </a>
                            <a class="dropdown-item" href="..\..\php\orderList.php" target="_self">Order List </a>
                        </div>
                </li>
                <li class="nav-item">
                <?php
                    if (isset($_SESSION['userLoggedIn'])){?>
                        <a class="nav-link" href="../../php/logout.php" target="_blank">Logout</a><?php
                    }
                    else{?>
                        <a class="nav-link" href="../../php/Login.php" target="_blank">Login / Sign up</a>
                    <?php
                    }
                    ?>   
                </li>
                <li class="nav-item">
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&#9881;</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                        <a class="dropdown-item" href="..\..\html\Back end\change password.html" target="_blank"> Change
                                Password</a>
                            <a class="dropdown-item" href="..\..\html\Back end\account-info.html" target="_self"> Account
                                Info</a>
                            <a class="dropdown-item" href="..\..\html\Back end\delete-user.php" target="_blank">Delete
                                Account</a>
                                <a class="dropdown-item" href="..\..\html\logout.html">Log Out</a>
                        </div>
                    </div>
                </li>
                </li>
            </ul>
            <div class="shopping-cart-holder">

                <a class="nav-link shopping-cart" href="../../php/shoppingcart.php" target="_blank">&#128722; </a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="products" style="height:100%">
            <div class="products_row">
                <div class="right-side" >
                    <form action="../../php/addtocart.php" method = "POST">
                        <h2 class ="item">Bananas</h2>
                        <img class="image" src="../../Images/banana.jpg">
                        <h4 class="price_banana">$<?php echo $productCurrPrice?>/un</h4>
                        <script></script>
                        <input class="quatity" name="quantity"type="number" value="1">
                        <input type="submit" id="add-to-cart" name = "2" class="button add-to-cart" value = "Add to Cart">
                    </form>
                </div>
                <div class="right-side">
                    <h2>Quick description</h2>
                    <p>
                        Bananas are rich in fibers and many minerals such as zinc which is an oligo-element (present in
                        little quantities in the body). It therefore contains important vitamins for our immune system.
                    </p>
                    <button class="accordion">Full Product description</button>
                    <div class="panel">
                        <p>A banana is an elongated, edible fruit botanically a berry.The fruit is variable in size,
                            color, and firmness,
                            but is usually elongated and curved, with soft flesh rich in starch covered with a rind,
                            which may be green, yellow, red, purple,
                            or brown when ripe.Bananas contain a fair amount of fiber, as well as several antioxidants.
                            One medium-sized banana (118 grams) also boasts:
                        <ul id="nutritionList">
                            <li>Potassium: 9% of the RDI</li>
                            <li>Vitamin B6: 33% of the RDI</li>
                            <li>Vitamin C: 11% of the RDI</li>
                            <li> Magnesium: 8% of the RDI</li>
                            <li> Copper: 10% of the RDI</li>
                            <li> Manganese: 14% of the RDI</li>
                            <li>Net carbs: 24 grams</li>
                            <li>Fiber: 3.1 grams</li>
                            <li>Protein: 1.3 grams</li>
                            <li>Fat: 0.4 grams</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="clear: both"></div>
    <div style="clear: both"></div>
    <footer position=absolute bottom=0>
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
                    <p><a href="mailto:zixi.quan@concordia.ca?subject=SOEN287">online_grocerystore@groceries.ca</a></p>
                </li>
                <li>
                    <span><i class="fa fa-smile-o" aria-hidden="true"></i></span>
                    <p><a href="..\..\html\contactUsFrom.html">Help us improve your experience</a></p>
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

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>