<?php

include_once 'php\productClass.php';
include_once 'php\addtocart.php';

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
    <title>My Cart</title>
    <link rel="icon" 
    type="image/png" 
    href="..\Images\favicon.png">
    <link rel="stylesheet" href="..\CSS\Page UI.css">
    <link rel="stylesheet" href="..\CSS\shopping-cart.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script type="text/javascript" src="..\JavaScript\cart.js"></script>

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

    <!-- <div id="mega-container" style="max-width100%;height:100%"> -->
    <div class="container" style="margin-bottom: 100px;">
        <div class="cart-table" style = "overflow:auto; margin:50px; position:left absolute; max-width:75%">
            <form action="updateprices.php" method="POST">
                <table class="tg" id="cartTable">
                    <label>
                        <h3 style="font-size: 2rem">My Shopping Cart</h3>
                    </label>
                    <thead>
                        <tr>
                            <th class="tg-header">Items</th>
                            <th class="tg-header">Preview</th>
                            <th class="tg-header">Product</th>
                            <th class="tg-header" colspan="3">Quantity</th>
                            <th class="tg-header" style="text-align:left !important" colspan="2">Price</th>

                        </tr>
                    </thead>
                    <tbody class="item-list">
                        <tr class="cart-row">
                            <?php
                            if(isset($_SESSION['cart'])){
                                $_SESSION['count'] = 1;
                                $count = $_SESSION['count'];
                                $file = fopen($_SESSION['productcart'], "r") or die("cannot read file productCart.txt");
                                while(!feof($file)){
                                    $line = fgets($file);
                                    $lineArr = explode("\t",$line);
                                    if((int)$lineArr[3] > 0){
                                        $_SESSION['prodnum'.$count] = $lineArr[0];
                                        $_SESSION['image'. $count] = $lineArr[4];
                                        $image = $_SESSION['image'. $count];
                                        (int)$_SESSION['quantity'.$count] = $lineArr[3];
                                        $quantity = $_SESSION['quantity' . $count];
                                        $_SESSION['items'] = array();
                                        array_push($_SESSION['items'],$lineArr[1]);
                                        $item = $lineArr[1];
                                        (float)$_SESSION['price'.$count] = $lineArr[2];
                                        $price = $_SESSION['price'.$count];
                                        //<td id=\"qty$count\" class=\"tg-even item-quantity\">$quantity</td>
                                        echo "
                                        <tr name = \"row$count\" class=\"cart-row\">
                                            <td class=\"tg-even\">$count</td>
                                            <td name=\"image$count\" class=\"tg-even\"><img id=\"image\" src=\"$image\" width=\"60\" height=\"60\"></td>
                                            <td class=\"tg-even\">$item</td>
        
                                            <td class=\"tg-even\" style=\"text-align:right\"><input type=\"button\" class=\"btn btn-primary\"
                                            style=\" border-radius:100%; padding: 3px 9px;\" name=\"decrease\" onclick=\"decreaseQuantity()\"
                                            value=&#8722; />
                                            </td>
                                            <td><input class = \"quantity\" name=\"quantity$count\" type=\"number\" onclick=\"totalCalculators()\" value=\"$quantity\"></td>
                                            <td class=\"tg-even\" style=\"text-align:left\"><input type=\"button\" class=\"btn btn-primary\"
                                            style=\" border-radius:100%; padding: 3px 9px;\" name=\"increase\" onclick=\"increaseQuantity()\"
                                            value=&#43; />
                                            </td>
        
                                            <td id = \"price\" class=\"tg-even item-price\">$price</td>
                                            <td class=\"tg-even\"><input type=\"button\" class=\"btn btn-primary\"
                                            style=\" border-radius:100%; padding: 3px 10px;\" name=\"delete\" onclick=\"deleteItem()\" value=\"×\" />
                                            </td>
                                        </tr>
                                        ";
                                        $count++;
                                    }
                                }
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
                <div id="subTotal" style="position:right absolute;  margin:30px 50px;; max-width: 25%;">
                        
                    <table class="total" style="border: 2px solid rgb(63, 105, 63); width:300px">
                        <tr>
                            <th style="font-size: 20px;">Sub-Total:</th>
                            <th style="font-size: 20px;text-align:right" id="subtotal">$0.00</th>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td style="text-align:right" class="shipping" id = "shipping-cost">Free</td>
                        </tr>

                        <tr>
                            <td>5% QST</td>
                            <td style="text-align:right" class="qst" id ="QST">$0.00</td>
                        </tr>
                        <tr>
                            <td>9.98% GST</td>
                            <td style="text-align:right" class="gst" id = "GST">$0.00</td>
                        </tr>
                        <tr>
                            <th style="font-size: 18px;" class="total-price">Estimated total:</th>
                            <th style="font-size: 18px; text-align:right" id = "estimatedTotal">$0.00</th>
                        </tr>
                    </table>
                        <p style="font-size: 16px; margin:10px 0px; ">Discount code :
                            <br />
                            <input type="text" placeholder="Enter code here" style="margin: 10px 0px;width:auto !important">
                            <div>
                                <table>  <tr>
                                    <td><input type="submit" class="btn btn-primary" name="checkout" style ="width:150px; margin-right:5px;" value="Go to checkout"></td>
                                    <td><input type="submit" class="btn btn-primary" name="returnshopping"  style ="width:160px;" value="Return Shopping"></td>
                                </tr>
                                </table>
                            </div>
                        </p>

                </div>
            </form
    </div>

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
                    <p><a href="mailto:zixi.quan@concordia.ca?subject=SOEN287">online_grocerystore@groceries.ca</a>
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
    <script>
        document.write(totalCalculators());
    </script>
</body>

</html>