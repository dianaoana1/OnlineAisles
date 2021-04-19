<?php 

session_start();

require_once("../../php/getProductPricesProducts.php");
$product="Broccoli";
$productCurrPrice=getPrice($product);





?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Broccoli</title>

    <meta charset="utf-8">

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
        <script type = "text/javascript" src = "..\..\JavaScript\cart.js" async></script>

</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <a class="navbar-brand" href="..\Main Page.html">Online Aisles</a>
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
                            <a class="dropdown-item" href="../Product links/fruits.html" target="_self">Fruits</a>
                            <a class="dropdown-item" href="../Product links/Vegetables.html"
                                target="_self">Vegetables</a>
                            <a class="dropdown-item" href="../Product links/meats and poultry.html" target="_self">
                                Meats
                                and Poultry </a>
                            <a class="dropdown-item" href="../Product links/seafood.html" target="_self">Seafood
                            </a>
                            <a class="dropdown-item" href="../Product links/dairy and eggs.html" target="_self">Dairy
                                and
                                Eggs </a>
                            <a class="dropdown-item" href="../Product links/cereal products.html" target="_self">Cereal
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
                            <a class="dropdown-item" href="..\back end\Order-list.html" target="_self">Order List </a>
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="..\..\php\Login.php" target="_blank">Login / Sign up</a>
                </li>
                <li class="nav-item">
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&#9881;</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="..\Back end\change password.html" target="_blank"> Change
                                Password</a>
                            <a class="dropdown-item" href="..\Back end\account-info.html" target="_self"> Account
                                Info</a></a>
                            <a class="dropdown-item" href="..\back end\Order-list.html" target="_self">Order List
                            </a>
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
    <div class="mega-container" >
        <div class="container" >
            <div class="products">
                <div class="products_row">
                    <div class="right-side">
                        <form action="../../php/addtocart.php" method = "POST">
                        <h2>Broccoli</h2>
                        <img src="../../Images/brocco.jpg" width="400" height="400">
                        <h4 id="price_broccoli">$<?php echo $productCurrPrice?>/un</h4>
                        <script></script>
                        <input type="number" name="quantity" value="1">
                        <input type="submit" name = "4" class="button" value="Add to cart">
                        </form>
                    </div>
                    <div class="right-side">
                        <h2>Quick description</h2>
                        <p>
                            This melting pot of vitamins (A,C,E,K) contains also a good amount of fiber,protein,
                            potassium,
                            magnesium and calcium. If you'd have to stick with one vegetable broccoli would be the right
                            choice!
                        </p>
                        <button class="accordion">Full Product description</button>
                        <div class="panel">
                            <p>Broccoli is an edible green plant in the cabbage family whose large flowering head,stalk
                                and small associated leaves are eaten as a vegetable.
                                Broccoli has large flower heads usually dark green in color arranged in a tree-like
                                structure branching out from a thick stalk which is usually light green.
                                Broccoli is very low in calories providing only 31 calories per cup of 91 grams. The
                                nutrition facts for 1 cup of 91 gram of raw broccoli are:
                            <ul id="nutritionList">
                                <li>Calories: 31</li>
                                <li>Water: 89%</li>
                                <li>Protein: 2.5 grams</li>
                                <li> Carbs: 6 grams</li>
                                <li>Sugar: 1.5 grams</li>
                                <li> Fiber: 2.4 grams</li>
                                <li>Vitamin C: 140% of the DV</li>
                                </p>
                        </div>
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

</body>
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

</html>