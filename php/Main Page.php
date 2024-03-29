<?php
session_start();
require_once("getProductPrices.php");
$apple="Apple";
$banana="Banana";
$bread="Slice Bread";
$broccoli="Broccoli";
 $AppleCurrPrice=getPrice($apple);
 $BreadCurrPrice=getPrice($bread);
 $BroccoliCurrPrice=getPrice($broccoli);
 $BananaCurrPrice=getPrice($banana);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home - Online Aisles</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/CSS" href="..\CSS\Page UI.css">
    <link rel="stylesheet" type="text/CSS" href="..\CSS\MainPageSlideShow.css">
    <link rel="stylesheet" type="text/CSS" href="..\CSS\ImageHoverEffect.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="..\.vscode\Page UI.js"></script>
    <!--<script src="..\JavaScript\weeklydeals.js"></script>-->
    <script src="..\JavaScript\deal.js"></script>
    <link rel="icon" type="image/png" href="..\Images\favicon.png">
    <script>
        var week;
    </script>


</head>

<body>
    <div id="mega-container">
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

        <div class="container" style="max-width: 100%; height:100%;margin-bottom: 0px;">
            <div id="Main">
                <div class="bg">
                    <img src="..\Images\crops.jpg" alt="Crops" width="100%">
                    <!--https://www.google.com/url?sa=i&url=https%3A%2F%2Ffarm-advisory.eu%2Fen%2F&psig=AOvVaw3D46mh3g8TE0I6zFbuL6eU&ust=1615056545189000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCPja0dLome8CFQAAAAAdAAAAABAD-->
                    <!-- <img src="..\Images\Aisles.jpg" alt="shopping cart picture" width="100%"> https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.zerotothree.org%2Fresources%2F2225-got-math-20-tips-for-making-your-trip-to-the-grocery-store-count&psig=AOvVaw0n5vjWS-6vEW48RzSxtzGd&ust=1615054877836000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCIDJ2b7ime8CFQAAAAAdAAAAABBQ -->
                    <div class="overlay-text">
                        <h2>Welcome to the <em>Online Aisles</em> !</h2>
                        <h5>Our grocery store has fresh food with free shipping on all orders </h5>
                    </div>
                </div>

                <div class="img-container">
                    <div class="text">
                        <h4 style="color:rgb(59, 50, 28);">Our motto is that the customer always comes first </h4>
                        <p style="color:rgb(73, 61, 34); font-weight: bold">Online Aisles has been opened
                            since 
                            2020  and is one of the fastest growing companies in Canada</p>
                    </div>
                    <img src="..\Images\Grocery.jpg" alt="grocerypicture" width="25%" height="25%">
                    <img src="..\Images\grocery2.jpg" alt="secgrocerypicture" width="25%" height="25%">
                </div>
                </br>
                <div class="container" style="height: 30%;width: 100%;text-align: center;background-position:center;">
                    <div class="quick-links">
                        <p>
                        <h3 style="text-align: center;"> Quick links:</h3>
                        <div class="row" style="width: 100%;text-align: center !important;">
                            <p class="col" id="col-fruits">
                                <a class="nav-link" href="..\php\Product links/fruits.php" target="_self">
                                    Fruits</a>
                            </p>
                            <p class="col" id="col-veg">
                                <a class="nav-link" href="..\php\Product links/Vegetables.php" target="_self">

                                    Vegetables</a>
                            </p>
                            <p class="col" id="col-egg">
                                <a class="nav-link" href="..\php\Product links/dairy and eggs.php" target="_self">Dairy and
                                    Eggs</a>
                            </p>
                            <p class="col" id="col-meat">
                                <a class="nav-link" href="..\php\Product links/meats and poultry.php" target="_self">Meat and
                                    Poultry</a>
                            </p>
                            <p class="col" id="col-sea">
                                <a class="nav-link" href="..\php\Product links/seafood.php" target="_self">Fish and
                                    Seafood</a>
                            </p>
                            <p class="col" id="col-cer">
                                <a class="nav-link" href="..\php\Product links/cereal products.php" target="_self">Cereal
                                    Products</a>
                            </p>

                        </div>
                        </p>

                    </div>
                </div>
                <div class="fruit-container" style="text-align: center;">
                    <h3 style="text-align: center;" id="promo"> Weekly Promotions:</h3>
                    <div class="container-fluid main-container">
                        <div class="row dynamic-columns" id="row1" >
                            <div class="col" id="col-apple">
                                <img src="..\Images\apple.png" class="nohover" id="acc-img">
                                <p >The Apples are on sale this week<a 
                                        href=../php/articles/apple.php><i> click
                                            here</i></a> </p>
                                            <p><span class="initial-price" id="initial-price-apple">526</span> now for <?php echo $AppleCurrPrice?></p>
                            </div>

                            <div class="col" id="col-banana">
                                <img src="..\Images\banana.jpg" class="nohover" id="acc-img">
                                <p>The Bananas are on sale this week<a href=../php/articles/banana.php><i> click
                                            here</i></a> </p>
                                            <p><span class="initial-price" id="initial-price-banana">526</span> now for <?php echo $BananaCurrPrice?></p>
                            </div>
                            <div class="col" id="col-bread">
                                <img src="..\Images\bread.jpg" class="nohover" id="acc-img">
                                <p>The Bread is on sale this week<a href=../php/articles/bread.php><i> click
                                            here</i></a> </p>
                                            <p><span class="initial-price" id="initial-price-bread">526</span> now for <?php echo $BreadCurrPrice?></p>
                            </div>
                            <div class="col" id="col-broccoli">
                                <img src="..\Images\brocco.jpg" class="nohover" id="acc-img">
                                <p>The Broccolis are on sale this week<a href=../php/articles/broccoli.php><i> click
                                            here</i></a> </p>
                                            <p><span class="initial-price" id="initial-price-brocc">526</span> now for <?php echo $BroccoliCurrPrice?></p>
                            </div>
                        </div>
                    </div>
                    </br>
                  
                </div>
            </div>
            <script>
               firstPriceSetter();
               newPriceSetter();
               dealChecker(<?php echo $AppleCurrPrice?>,<?php echo $BananaCurrPrice?>,<?php echo $BreadCurrPrice?>,<?php echo $BroccoliCurrPrice?>);
                  //Tests for the method to remove the columns in the weekly deal thing
              /*
                var idCancer = [document.getElementById("col-banana")];
                idCancer.push(document.getElementById("col-apple"));
                for (var i = 0; i < idCancer.length; i++) {
                    if(idCancer[i]!==null){
                    idCancer[i].parentNode.removeChild(idCancer[i]);
                    }
                }*/
               
            </script>

        </div>
        <div id="gif-holder" style="text-align: center;height:100%;width:100%;background-color:rgb(159, 179, 100)">
            <image src="..\Images\index.gif" style="height:25vh ;width:25vw"></image>
        </div>
    </div>
    </div>
    <script>

    </script>


    <div style="clear: both"></div>
    <div style="clear: both"></div>
    <footer id="footer">
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
                    <p><a href="mailto:zixi.quan@concordia.ca?subject=SOEN287">online_aisles@groceries.ca</a>
                    </p>
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
                pre-existing medical conditions. Something as simple as grocery shopping was now a high risk
                activity
                for those who were more succeptible to serious illnesses cause by the Covid-19 virus. Our goal is to
                make grocery shopping safe and affordable for all Canadians so that no one is has to face food
                insecurity in these difficult times.
            </p>
            <ul class="icons">
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="https://twitter.com/?lang=en"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="https://www.youtube.com/"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </footer>
</body>
<script>dealSetter()</script>
<script></script>
<!--
      Old accordion stuff
                <div class="row" style="width: 100%;">
                    <div class="col-6">
                        <div class="Promotions-container" style="margin-left: 20px;">
                            <h3 style="text-align: center;"> Weekly Promotions:</h3>
                            <div class="slideshow-container" style="max-height: 500px;max-width: 500px;">

                                <div class="mySlides fade" id="img1">
                                    <div class="numbertext">1 / 4</div>
                                    <img src="..\Images\apple.png" id="acc-img">
                                    <p id="text2">Week 1</p>

                                </div>

                                <div class="mySlides fade" id="img2">
                                    <div class="numbertext">2 / 4</div>
                                    <img src="..\Images\banana.jpg" id="acc-img">
                                    <p id="text3">Week 2</p>
                                </div>

                                <div class="mySlides fade" id="img3">
                                    <div class="numbertext">3 / 4</div>
                                    <img src="..\Images\bread.jpg" id="acc-img">
                                    <p id="text4">Week 3</p>
                                </div>
                                <div class="mySlides fade" id="img4">
                                    <div class="numbertext">4 / 4</div>
                                    <img src="..\Images\brocco.jpg" id="acc-img">
                                    <p id="text5">Week 4</p>
                                </div>

                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                            </div>
                            <br>
                           
                        </div>
                    </div>
                    <div class="col-6" style="padding:0px" style="text-align:center">
                        <h3 style="text-align: center;">The current promotion is:</h3>
                        </br>
                        <p id="current-promotion"
                            style="color: green;width: 100%;text-align: center;border:1px solid red;">
                            &nbsp;&nbsp;Bananas</p>
                        <h3 id="current-price"></h3>
                        <p style="text-align: center; ">
                            <img id="on-sale" src="../Images/on-sale.png">
                        </p>
                    </div>





                </div>
                <div class="row">
                    
                    <div class="col-5" style="text-align: center;">
                        <div style="text-align:center" id="dots">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                            <span class="dot" onclick="currentSlide(4)"></span>
                        </div>

                    </div>
                </div>


            -->
            <!--Need to somehow get all the currPrice of the items in there as php and then call the function in js to affect the elements-->

</html>