<?php
if(!isset($_SESSION)) {
    session_start();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Online Grocery Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" 
    type="image/png" 
    href="..\Images\favicon.png">
    
    <link rel="stylesheet" href = "..\CSS\Page UI.css">
    <link rel ="stylesheet" href = "..\CSS\Back end\list.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="..\JavaScript\ProductList.js"></script>
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
             <div class = "container"style="max-width: 100%; height:80%;margin-top:60px;">
        <table class="tg" id="productTable">
        <thead>
          <tr>
            <th class="tg-header">Product Name</th>
            <th class="tg-header">Type</th>
            <th class="tg-header">Price</th>
            <th class="tg-header">Quantity</th>
            <th class="tg-header">Description</th>
           
            <th class="tg-header">Select Item</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $product=file("..\TextFiles/productDatabase.txt");
        foreach ($product as $k=>$p) {
            $line=explode("*",$p);
        ?>
            <tr>
            <td class="tg-odd"><?php echo $line[0];?></td>
            <td class="tg-odd"><?php echo $line[1];?></td>
            <td class="tg-odd"><?php echo $line[2];?></td>
            <td class="tg-odd"><?php echo $line[3];?></td>
            <td class="tg-des"><?php echo $line[4];?></td>
            
            <td class="tg-odd">
            <a type="text" name="edit-product-button" style="font-weight: bold;" class="btn btn-primary" href="editProduct.php?id=<?php echo $k;?>" >Edit Product</a>
            <br><br>
            <a type="text" name="delete-product-button" style="font-weight: bold;" class="btn btn-primary" href = "deleteProduct.php?id=<?php echo $k;?>" >Remove Selected Products</a>
            </td>
          </tr>
         
        <?php
        }
        ?>
        <div class = "list-buttons">
        <a type="text" name="add-product-button" style="font-weight: bold;" class="btn btn-primary" href ="addProduct.php" >Add New Product</a>
        </div>
         
        <?php 
            }
        ?> 

        </tbody>
        </table>

        


        
      </div>
        <br/>
        <br/>
        <div style="clear: both"></div>
        <div style="clear: both"></div>
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