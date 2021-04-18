<?php
session_start();
require 'userListFunctions.php';
$thisPage = htmlspecialchars($_SERVER["PHP_SELF"]);
$_SESSION['currentPage'] = htmlspecialchars($_SERVER["PHP_SELF"]);
$_SESSION['file'] = "..\TextFiles\userInfo.txt";
// $_SESSION['timesCalled'] = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users List - Online Grocery Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="..\CSS\Page UI.css">
    <link rel="stylesheet" href="..\CSS\Back end\list.css" />
    <link rel="stylesheet" href="..\CSS\Back end\user-list form.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="..\JavaScript\UserList.js"></script>
    <link rel="icon" type="image/png" href="..\Images\favicon.png">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <a class="navbar-brand" href="..\Main Page.html">Online Grocery Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aisles</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="..\Product links/fruits.html" target="_self">Fruits</a>
                            <a class="dropdown-item" href="..\Product links/Vegetables.html" target="_self">Vegetables</a>
                            <a class="dropdown-item" href="..\Product links/meats and poultry.html" target="_self"> Meats and Poultry
                            </a>
                            <a class="dropdown-item" href="..\Product links/seafood.html" target="_self">Seafood </a>
                            <a class="dropdown-item" href="..\Product links/dairy and eggs.html" target="_self">Dairy and Eggs </a>
                            <a class="dropdown-item" href="..\Product links/cereal products.html" target="_self">Cereal Products </a>
                        </div>
                </li>
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Back end Pages</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="userList.php" target="_self">User List</a>
                            <a class="dropdown-item" href="..\Productlist.html" target="_self"> Product list </a>
                            <a class="dropdown-item" href="..\Back end/Order-list.html" target="_self">Order List </a>
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="..\Login.html" target="_blank">Login / Sign up</a>
                </li>
                <li class="nav-item">
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&#9881;</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="change password.html" target="_blank"> Change Password</a>
                            <a class="dropdown-item" href="account-info.html" target="_self"> Account Info</a></a>
                            <a class="dropdown-item" href="delete-user.html" target="_blank">Delete Account</a>
                        </div>
                </li>
                </li>
            </ul>
            <div class="shopping-cart-holder">
                <a class="nav-link shopping-cart" href="..\shopping_cart.html" target="_blank">&#128722; </a>
            </div>
        </div>
    </nav>
    <br>
    <div class="container" style="max-width: 96%; height:100%;margin-top:60px; margin-bottom:166px ">
            <?php 
            $pattern = "[1-".getLastLine()."]";
            if (!isset($_POST['enter-button'])) {?>
            <div>
                <form action="<?php echo $_SESSION["currentPage"]; ?>" method="POST">
                <label>Enter the user ID number of the user you would like to edit:</label>
                <input type="text" title="User ID must be within range of 1-<?php echo getLastLine(); ?>" pattern=<?php echo $pattern?> placeholder="User ID #" name="userID" required />
                <div style="position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal">
                    <button type="submit" name="enter-button" style="font-weight: bold;" class="btn btn-primary">Enter</button>
                    <a type="submit" name="cancel-button" style="font-weight: bold;" class="btn btn-primary" href="userList.php">Cancel</a>
                </div>
            </form>
            </div>
            <?php
            ProcessUserList();
            }
            if (isset($_POST['enter-button'])){
                $_SESSION['chosenUserID'] = $_POST['userID'];
                header('Location: editUserPage.php');
            }
            ?>
        </div>
    </div>
    <div style="clear: both"></div>
    <div style="clear: both"></div>
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
                    <p><a href="mailto:zixi.quan@concordia.ca?subject=SOEN287">online_grocerystore@groceries.ca</a></p>
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
                At the start of 2020, the coronavirus pandemic brought on new difficulties for many people with pre-existing
                medical conditions. Something as simple as grocery shopping was now a high risk activity for those who were more
                succeptible to serious illnesses cause by the Covid-19 virus. Our goal is to make grocery shopping safe and
                affordable for all Canadians so that no one is has to face food insecurity in these difficult times.
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