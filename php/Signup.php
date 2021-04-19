<?php

if(!isset($_SESSION)) {
    session_start();
}
require ("userListFunctions.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Register | OGS
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="..\CSS\Page UI.css">
    <link rel="stylesheet" href="..\CSS\signup.css">
    <meta charset="utf-8">
    <link rel="icon" 
    type="image/png" 
    href="..\Images\favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="mega-container" style="height: 100%;width: 100%;">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
            <a class="navbar-brand" href="Main Page.html">Online Grocery Store</a>
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
                                <a class="dropdown-item" href="Product links/fruits.html" target="_self">Fruits</a>
                                <a class="dropdown-item" href="Product links/Vegetables.html"
                                    target="_self">Vegetables</a>
                                <a class="dropdown-item" href="Product links/meats and poultry.html" target="_self">
                                    Meats
                                    and Poultry </a>
                                <a class="dropdown-item" href="Product links/seafood.html" target="_self">Seafood </a>
                                <a class="dropdown-item" href="Product links/dairy and eggs.html" target="_self">Dairy
                                    and
                                    Eggs </a>
                                <a class="dropdown-item" href="Product links/cereal products.html" target="_self">Cereal
                                    Products </a>
                            </div>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Back end Pages</a>

                            <div class="dropdown-menu" aria-labelledby="dropdown03">
                                <a class="dropdown-item" href="..\php\userList.php" target="_self">User List</a>
                                <a class="dropdown-item" href="Productlist.html" target="_self"> Product list </a>
                                <a class="dropdown-item" href="Back end\Order-list.html" target="_self">Order List </a>
                            </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.html">Login / Sign up</a>
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
                    <a class="nav-link shopping-cart" href="shopping_cart.html">&#128722; </a>
                </div>
            </div>
        </nav>
        <br>
        <div class="container" style="height: 100%;width: 100%;">
            <p id="signin-button">Already have an onlinegorcerystore.ca account? <em><a href=.../php/Login.php>Sign in</a></em>
            </p>
            <!--<p id="mendatoryfield">* mentadory field</p>-->
            <p><span class="error">* mentadory fields</span></p>
            <form class="sign-up-form" method = "post" action="Signup.php">
                <div class="card">
                    <h2>
                    <span class="error">* </span>Do you have an OGS membership card?
                    </h2>
                    <div class="card-form">
                        <div class="row">
                            <div class="col-md">
                                <input type="radio" name="havecard" required value="Yes" /> <b>I already have a card</b>
                                <p>and I would like to create an onlinegorcerystore.ca profile to access my personalized
                                    offers.</p>
                            </div>
                            <div class="col-md">
                                <input type="radio" name="havecard" value="Want" /> <b>I want an OGS membership card</b>
                                <p>to access all the perks of the program including personalized offers.</p>
                            </div>
                            <div class="col-md">
                                <input type="radio" name="havecard" value="No" /> <b>I do not want an OGS membership
                                    card</b>
                                <p>but I wish to create an onlinegrocerystore.ca profile to shop online or recieve the
                                    newsletter.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <div class="personal-info">
                    <h2>Personal Information</h2>
                    <div class="personal-info-form">
                        <div class="row">
                            <div class="col"><label for="Title"><span class="error">* </span>TITLE</label><br>
                                <select id="Title" name="Title" required>
                                    <option value="Select">Select your title</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms.">Ms.</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="FirstName"><span class="error">* </span>FIRST NAME</label><br>
                                <input type="text" id="FirstName" name="FirstName" required>
                            </div>
                            <div class="col-md">
                                <label for="LastName"><span class="error" required>* </span>LAST NAME</label><br>
                                <input type="text" id="LastName" name="LastName">
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md">
                                <label for="UserName"><span class="error">* </span>USER NAME</label><br>
                                <input type="text" id="UserName" name="UserName" required>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="contact-information">
                    <h2>Contact Information</h2>
                    <div class="contact-info-form">
                        <div class="row">
                            <div class="col-md">
                                <label for="Address"><span class="error">* </span>ADDRESS LINE 1 (No, Street)</label><br>
                                <input type="text" id="Address" name="Address" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="Address">ADDRESS LINE 2 (No, Street)</label><br>
                                <input type="text" id="Address" name="Address2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="Apartment">APARTMENT</label><br>
                                <input type="text" id="Apartment" name="Apartment">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="City"><span class="error">* </span>CITY</label><br>
                                <input type="text" id="City" name="City" required>
                            </div>
                            <div class="col-md">
                                <label for="province"><span class="error">* </span>PROVINCE</label><br>
                                <select id="province" name="province" required>
                                    <option >Select your province</option>
                                    <option value="Alberta">Alberta</option>
                                    <option value="British Columbia">British Columbia</option>
                                    <option value="Manitoba">Manitoba</option>
                                    <option value="New Brunswick">New Brunswick</option>
                                    <option value="Newfoundland And Labrador">Newfoundland And Labrador</option>
                                    <option value="Northwest Territories">Northwest Territories</option>
                                    <option value="Nova Scotia">Nova Scotia</option>
                                    <option value="Nunavut">Nunavut</option>
                                    <option value="Ontario">Ontario</option>
                                    <option value="Prince Edward Island">Prince Edward Island</option>
                                    <option value="Quebec">Quebec</option>
                                    <option value="Saskatchewan">Saskatchewan</option>
                                    <option value="Yukon">Yukon</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="Postal Code"><span class="error">* </span>POSTAL CODE</label><br>
                                <input type="text" id="Postal Code" name="PostalCode" required>
                            </div>
                            <div class="col-md">
                                <label for="cellphone"><span class="error">* </span>CELLPHONE NUMBER</label><br>
                                <input type="text" class="Cellphone" name="Cellphone" required>
                            </div>
                            <div class="col-md">
                                <label for="telephone">PHONE NUMBER (HOME)</label><br>
                                <input type="text" class="telephone" name="telephone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="email"><span class="error">* </span>EMAIL</label><br>
                                <input type="text" class="email" name="email" required>
                            </div>
                            <div class="col-md">
                                <label for="confirm-email"><span class="error">* </span>CONFIRM EMAIL</label><br>
                                <input type="text" class="confirm-email" name="confirm-email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="password"><span class="error">* </span>PASSWORD</label><br>
                                <input type="password" class="password" name="password" required>
                            </div>
                            <div class="col-md">
                                <label for="confirm-password"><span class="error">* </span>CONFIRM PASSWORD</label><br>
                                <input type="password" class="confirm-password" name="confirm-password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <input type="checkbox" class="terms" name="terms" required>
                <label for="terms">I accept the Online Grocery Store terms and conditions.<span class="error">* </span>-</label><br>
                <input type="checkbox" class="newsletter" name="newsletter">
                <label for="newsletter">I wish to receive our newsletter by email to stay up to date with our latest
                    offers.</label><br>
                <input class="btn btn-primary" type="submit" value="Register" name="Registered">
                <input class="btn btn-primary" type="reset" value="Reset">

            </form>
        </div>
    </div> </br>
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
<?php   
   if(isset($_POST['Registered'])){
       $firstname = $_POST['FirstName'];
       $lastname = $_POST['LastName'];
       $username = $_POST['UserName'];
       $Address = $_POST['Address'];
       $city = $_POST['City'];
       $province = $_POST['province'];
       $postalcode = $_POST['PostalCode'];
       $cellphone = $_POST['Cellphone'];
       $telephone = $_POST['telephone'];
       $email = $_POST['email'];
       $emailconfirmation = $_POST['confirm-email'];
       $password = $_POST['password'];
       $passwordconfirmation = $_POST['confirm-password'];
    
    $file=file_get_contents("..\TextFiles\customersAccounts.txt");

    //$username, $password, $lastName, $firstName, $email, $tel1, $tel2, $address
    //Checking if a customer is already signed up in the website
    if(!strstr($file, $email)&&!strstr($file,$username))
    {
        if($email==$emailconfirmation&&$password==$passwordconfirmation){
            $UsingFile = "..\TextFiles\customersAccounts.txt";
            $pw = fopen($UsingFile, 'a') or die("can't find or open the file");
            if (fileIsEmpty($UsingFile)){
                fwrite($pw, $username . "\t");
            }
            else{
                fwrite($pw, "\n".$username . "\t");
            }
            fwrite($pw, $password . "\t");
            fwrite($pw, $lastname . "\t");
            fwrite($pw, $firstname . "\t");
            fwrite($pw, $email . "\t");
            fwrite($pw, $cellphone . "\t");
            fwrite($pw, $telephone . "\t");
            fwrite($pw, $Address . ", " . $city);
            fwrite($pw, ", " . $province);
            echo "<script>alert('Your information was proprely saved.')</script>";
            fclose($pw);
        }
        else
        {
            echo "<script>alert('Sorry check again either the email or password confirmation do not correspond.')</script>";

        }
    }   
    else
    {
        echo "<script>alert('Sorry, the email or username is already in the database. Please create a new account.')</script>";
    }
    } 
    
    /*$file=fopen("..\TextFiles\customersAccounts.txt","r") or die("RIP");
    $numLines=count(file("..\TextFiles\customersAccounts.txt"));
        $arr=array();
        $arr=getUserData($numLines,$file);
    for($i=0;$i<$numLines;$i++){
        $lines=explode("\t",$arr[$i]);
        echo"hi";
        if($lines[11]==$username||$lines[21]==$email||$lines[24]==$password){
            echo"hi";
            echo '<script> alert ("Sorry, the information entered is incorrect.\n Please try again.") </script>';

            echo "<script>alert('Sorry, some information is already in the database. Please create a new account.')</script>";
            
            
        }
        else
        {
        if($email==$emailconfirmation&&$password==$passwordconfirmation){
            //$UsingFile = "..\TextFiles\customersAccounts.txt";
            //$pw = fopen($UsingFile, 'a') or die("can't find or open the file");
            fwrite($pw, "First name : " . $firstname . "\t");
            fwrite($pw, "Last name : " . $lastname . "\t");
            fwrite($pw, "Username : " . $username . "\t");
            fwrite($pw, "Address : " . $Address . "\t");
            fwrite($pw, "City : " . $City . "\t");
            fwrite($pw, "province : " . $province . "\t");
            fwrite($pw, "email : " . $email . "\t");
            fwrite($pw, "password : " . $password . "\n\n");
            echo "<script>alert('Your information was proprely saved.')</script>";
            //fclose($pw);
        }
        else
        {
            echo "<script>alert('Sorry check again either the email or password confirmation do not correspond.')</script>";
        }
        }
        }
        fclose($file);
    }*/





   




?>