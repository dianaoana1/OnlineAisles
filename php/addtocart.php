<?php
session_start();
// get data from values

if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

array_push($_SESSION['cart'], S_GET['id']);
?>

<p>