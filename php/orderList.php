<?php
if(!isset($_SESSION)) {
    session_start();
}
require_once('orderListFunctions.php');
$thisPage = htmlspecialchars($_SERVER["PHP_SELF"]);
$_SESSION['currentPage'] = htmlspecialchars($_SERVER["PHP_SELF"]);
$_SESSION['file'] = "..\TextFiles\orderInfo.txt";
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>Order List - Online Aisles</title>
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
    <style>
        .notAdmin{
            text-align: center;
        }
        .out-of-order{
            max-width:70vw;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <a class="navbar-brand" href="Main Page.php">Online Aisles</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aisles</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="..\php\Product Links/fruits.php" target="_self">Fruits</a>
                            <a class="dropdown-item" href="..\php\Product Links/Vegetables.php" target="_self">Vegetables</a>
                            <a class="dropdown-item" href="..\php\Product Links/Meats and poultry.php" target="_self"> Meats and Poultry
                            </a>
                            <a class="dropdown-item" href="..\php\Product Links/seafood.php" target="_self">Seafood </a>
                            <a class="dropdown-item" href="..\php\Product Links/dairy and eggs.php" target="_self">Dairy and Eggs </a>
                            <a class="dropdown-item" href="..\php\Product Links/cereal products.php" target="_self">Cereal Products </a>
                        </div>
                </li>
                <li class="nav-item dropdown">
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Back end Pages</a>

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
                </li>
            </ul>
            <div class="shopping-cart-holder">
                <a class="nav-link shopping-cart" href="shoppingcart.php" target="_blank">&#128722; </a>
            </div>
        </div>
    </nav>
    <div class = "container" style="max-width: 96%; height:100%;margin-top:60px; margin-bottom:327px ">
        <div class="order-table" style="overflow-x:auto;">
        <?php
            if ($_SESSION['userLoggedIn']!= "admin"){?>
            <div class = "notAdmin">
                <h3>Sorry, this page cannot be accessed at this time.</h3><a href = "Login.php" target="_self"><h5>Log on as an administrator</a> to access full website functionality.</h5>
                <br>
                <img src="..\Images\out-of-order.png" class="out-of-order" alt="Cannot display photo">
            </div>              
               <?php 
            }
            else{?>
                <div class="order-table" style="overflow:auto;">
                <?php
                if (fileIsEmpty($_SESSION['file'])) {
                    ProcessEmptyOrderTable();
                }
                else {
                    ProcessOrdersToTable();
                }
            }?>

            <!--<table class="tg" id="orderTable">
                <thead>
                    <tr>
                        <th class="tg-header">Order Number</th>
                        <th class="tg-header">User</th>
                        <th class="tg-header">Total number of Products</th>
                        <th class="tg-header">Sub-total</th>
                        <th class="tg-header">No of products</th>

                        <th class="tg-header">Select Order</th>
                    </tr>
                </thead>
                <tbody id="orderTableBody">
                    <tr>
                        <td class="tg-even">1</td>
                        <td class="tg-even">Oumar</td>
                        <td class="tg-even">4</a></td>
                        <td class="tg-even">25$</a></td>
                        <td class="tg-even">1,2,3,4</a></td>

                        <td class="tg-even"><input type="checkbox" class="orders" name="order-checkbox" id="orderchkbx">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-odd">2</td>
                        <td class="tg-odd">Matthew</td>
                        <td class="tg-odd">4</a></td>
                        <td class="tg-odd">25$</a></td>
                        <td class="tg-odd">1,2,3,4</a></td>

                        <td class="tg-odd"><input type="checkbox" class="orders" name="order-checkbox" id="orderchkbx">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-even">3</td>
                        <td class="tg-even">Diana</td>
                        <td class="tg-even">4</a></td>
                        <td class="tg-even">25$</a></td>
                        <td class="tg-even">1,2,3,4</a></td>

                        <td class="tg-even"><input type="checkbox" class="orders" name="order-checkbox" id="orderchkbx">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-odd">4</td>
                        <td class="tg-odd">Alexandra</td>
                        <td class="tg-odd">4</a></td>
                        <td class="tg-odd">25$</a></td>
                        <td class="tg-odd">1,2,3,4</a></td>

                        <td class="tg-odd"><input type="checkbox" class="orders" name="order-checkbox" id="orderchkbx">
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-even">5</td>
                        <td class="tg-even">Ziyi</td>
                        <td class="tg-even">4</a></td>
                        <td class="tg-even">25$</a></td>
                        <td class="tg-even">1,2,3,4</a></td>

                        <td class="tg-even"><input type="checkbox" class="orders" name="order-checkbox" id="orderchkbx">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="list-buttons">
            <a type="text" id="add-button" style="font-weight: bold;" class="btn btn-primary" href="#"
                onclick="addRow()">Add
                New Order</a>

            <a type="text" id="edit-button" style="font-weight: bold;" class="btn btn-primary"
                href="#" onclick = "editSelectedRows()">Edit Order</a>

            <a type="text" id="delete-button" style="font-weight: bold;" class="btn btn-primary" href="#"
                onclick="deleteSelectedRows()">Delete
                Order</a>
        </div>-->
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
                    <p><a href="mailto:online_grocerystore@groceries.ca?subject=Customer Feedback">online_grocerystore@groceries.ca</a></p>
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