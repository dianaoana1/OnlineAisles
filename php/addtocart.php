<?php
session_start();
// creating array of objects

if(empty($_SESSION['cart'])){

    // creating objects for every item
    $apple = new item(1, "apple", 0.89, 0, "../../Images/apple.png");
    $banana = new item(2, "banana", 0.33, 0, "../../Images/banana.jpg");
    $bread = new item(3, "bread", 1.69, 0, "");
    $broccoli = new item(4, "broccoli", 3,49, 0, "../../Images/brocco.jpg");
    $carrots = new item(5, "carrots", 2.99, 0, "../../Images/carrots.jpg");
    $cereals = new item(6, "cereals", 4.99, 0, "../../Images/cereal.jpg");
    $cheese = new item(7, "cheese", 6.09, 0, "../../Images/cheese.jpg");
    $chicken = new item(8, "chicken", 12.54, 0, "../../Images/chicken.jpg");
    $eggs = new item(9, "dozen of eggs", 2.99, 0, "../../Images/eggs.jpeg");
    $groundbeef = new item(10, "ground beef", 1.54, 0, "../../Images/ground-beef.jpg");
    $lobster = new item(11, "lobster", 21.35, 0, "../../Images/lobster.jpg");
    $milk = new item(12, "milk", 4.99, 0, "../../Images/milk.jpg");
    $mushrooms = new item(13, "mushrooms", 2.49, 0, "../../Images/mushrooms.jpg");
    $pasta = new item(14, "fusilli", 2.49, 0, "../../Images/pasta.jpg");
    $pear = new item(15, "pear", 1.05, 0, "../../Images/pear.jpg");
    $rice = new item(16, "rice", 19.99, 0, "../../Images/rice.png");
    $salmon = new item(17, "salmon", 6.83, 0, "../../Images/salmon.jpg");
    $sausages = new item(18, "sausages", 3.75, 0, "../../Images/sausages.jpg");
    $shrimps = new item(19, "shrimps", 9.99, 0, "../../Images/shrimp.jpg");

    $_SESSION['cart'] = [$apple, $banana, $bread, $broccoli, $carrots, $cereals, $cheese, $chicken, $eggs, $groundbeef, $lobster, $milk, $mushrooms, $pasta, $pear, $rice, $salmon, $sausages, $shrimps];

}

$quantity = $_POST["quantity"];

if (isset($_POST['1'])){

} else if (isset($_POST['2'])){

} else if (isset($_POST['3'])){

} else if (isset($_POST['4'])){

}



?>

<p>