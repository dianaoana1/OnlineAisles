<?php
 session_start();

error_reporting(~0);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Login / Sign up</title>
    <link rel="stylesheet" type="text/css" href="..\CSS\Page UI.css">
    <link rel="icon" 
    type="image/png" 
    href="..\Images\favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        

        .forgot-pass{
            font-style:italic;
        }

        .btn-primary{
            background-color:rgb(107, 124, 32);
        }

        input[type=text]{
            border-radius: 10px;
            border: 0px;
        }

        input[type=password]{
            border-radius: 10px;
            border: 0px;
        }

    </style>
</head>

<body class="loginbody">
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
                            <a class="dropdown-item" href="..\html\Product links/fruits.html" target="_self">Fruits</a>
                            <a class="dropdown-item" href="..\html\Product links/Vegetables.html" target="_self">Vegetables</a>
                            <a class="dropdown-item" href="..\html\Product links/meats and poultry.html" target="_self">
                                Meats and Poultry </a>
                            <a class="dropdown-item" href="..\html\Product links/seafood.html" target="_self">Seafood </a>
                            <a class="dropdown-item" href="..\html\Product links/dairy and eggs.html" target="_self">Dairy
                                and Eggs </a>
                            <a class="dropdown-item" href="..\html\Product links/cereal products.html" target="_self">Cereal
                                Products </a>
                        </div>
                </li>
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Back end Pages</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="..\php\userList.php" target="_self">User List</a>
                            <a class="dropdown-item" href="..\php\productList.php" target="_self"> Product list </a>
                            <a class="dropdown-item" href="..\php\orderlist.php" target="_self">Order List </a>
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Login.php">Login / Sign up</a>
                </li>
                <li class="nav-item">
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&#9881;</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                        <a class="dropdown-item" href="..\html\Back end\change password.html" target="_blank"> Change
                                Password</a>
                            <a class="dropdown-item" href="..\html\Back end\account-info.html" target="_self"> Account
                                Info</a></a>
                            <a class="dropdown-item" href="..\html\Back end\delete-user.html" target="_blank">Delete Account</a>
                        </div>
                </li>
                </li>
            </ul>
            <div class="shopping-cart-holder">
                <a class="nav-link shopping-cart" href="shoppingcart.php">&#128722; </a>
            </div>
        </div>
    </nav>
    <div id="megadiv" style = background-image:url(..\Images\fruitsandveggies.jpg)>
    <div class= "container">
        <div class="login" >
            <form method="post"  action="../php/loginConfirmation.php" >
                <label for="username"><b>Email or Username</b></label><br>
                <input type="text" id="username" name="UserName"> <br><br>
                <label for="password"><b>Password</b></label><br>
                <input type="password" id="password" name="password"><br>
                <p>
                    <a class="forgot-pass" href="..\html\Back end\verification code.html">Forgot password?</a>
                </p>
                <input class="btn btn-primary" type="submit" value="Login" name="logged">
                <input class="btn btn-primary" type="reset" value="Reset">
            </form>
            <br>
            <p>Don't have an account? Sign up <em><a href="Signup.php" target="_self">here</a></em></p>
        </div>
    </div>
    </div>

    <footer>
        <div class="section contactInfo">
            <h3>Contact Info</h3>
            <ul class="info">
                <li>
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    <p>123 Main Street<br/> Montreal, QC<br/> Canada</p>
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
                    <span><i class = "fa fa-smile-o" aria-hidden = "true"></i></span>
                    <p><a href = "..\html\contactUsFrom.html">Help us improve your experience</a></p>
                </li>
            </ul> 
        </div>
        <div class="section about-us">
            <h3>About Us</h3>
            <p>
                At the start of 2020, the coronavirus pandemic brought on new difficulties for many people with pre-existing medical conditions. Something as simple as grocery shopping was now a high risk activity for those who were more succeptible to serious illnesses cause by the Covid-19 virus. Our goal is to make grocery shopping safe and affordable for all Canadians so that no one is has to face food insecurity in these difficult times.  
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
