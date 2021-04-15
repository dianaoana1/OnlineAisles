<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lobster</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="..\../CSS/aisles.css">

    <link rel="stylesheet" href="..\..\CSS\Page UI.css">
    <link rel="icon" 
    type="image/png" 
    href="..\..\Images\favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script type = "text/javascript" src = "..\..\JavaScript\cart.js" async></script>
    
    <link rel="icon" 
    type="image/png" 
    href="..\..\Images\favicon.png">

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
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aisles</a>

                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="../Product links/fruits.html"
                                target="_self">Fruits</a>
                                <a class="dropdown-item" href="../Product links/Vegetables.html"
                                target="_self">Vegetables</a>
                            <a class="dropdown-item" href="../Product links/meats and poultry.html" target="_self">
                                Meats
                                and Poultry </a>
                            <a class="dropdown-item" href="../Product links/seafood.html" target="_self">Seafood </a>
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
                            <a class="dropdown-item" href="..\user-list.html" target="_self">User List</a>
                            <a class="dropdown-item" href="..\Productlist.html" target="_self"> Product list </a>
                            <a class="dropdown-item" href="..\back end\Order-list.html" _self">Order List </a>
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="..\Login.html" target="_blank">Login / Sign up</a>
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
                            <a class="dropdown-item" href="..\Back end\delete-user.html" target="_blank">Delete
                                Account</a>
                        </div>
                    </div>
                </li>
                </li>
            </ul>
            <div class="shopping-cart-holder">

                <a class="nav-link shopping-cart" href="..\shopping_cart.html" target="_blank">&#128722; </a>
            </div>
        </div>
    </nav>    
    <?php 
       if (empty($_POST["havecard"])||empty($_POST["Title"])||empty($_POST["FirstName"])||empty($_POST["LastName"])||empty($_POST["Address"])||empty($_POST["City"])||empty($_POST["province"])||empty($_POST["Postal Code"])||empty($_POST["email"])||empty($_POST["confirm-email"])||empty($_POST["password"])||empty($_POST["confirm-password"]))
       {    
           $error=TRUE;
           $title="Please Go Back";
       } 
       if($_POST["password"]!=$_POST["confirm-password"]) 
       {
        $errorP=TRUE;
       }
       if($_POST["email"]!=$_POST["confirm-email"]) 
       {
        $errorE=TRUE;
       } ?>
    
   

    <?php if ( isset($errorP) ) { ?>
        <p>Sorry, passewords do not match.</p>
        <p>Please enter the same passeword.</p>
    <?php if ( isset($errorE) ) { ?>
        <p>Sorry, emails do not match.</p>
        <p>Please enter the same email.</p>
    <?php if(isset($missing)){ ?>
        <p>Sorry, the form is incomplete.</p>
        <p>Please go back and fill out all the required entries.  Thank you.</p>
    }
    <?php } else { ?>
        <h1>You have successfully signed up to onlinegrocerystore.ca! <br>Please verify your email</h1>
            <br>
            <h3><a href="Main Page.html">Return to main page</a></h3>
    <?php } ?>
</body>
</html>