<?php

//include_once 'php\productClass.php';
// creating array of objects


include_once 'productClass.php';
include_once 'getProductPrices.php';
session_start();

//TODO: get prices from data file. Dont hardcode

if(empty($_SESSION['cart'])){

    //creating objects for every item
    $apple = new Item(1, "apple", getPrice("Apple"), 0, "../Images/apple.png");
    $banana = new item(2, "banana", getPrice("Banana"), 0, "../Images/banana.jpg");
    $bread = new item(3, "bread", getPrice("Slice Bread"), 0, "../Images/bread.jpg");
    $broccoli = new item(4, "broccoli", getPrice("Broccoli"), 0, "../Images/brocco.jpg");
    $carrots = new item(5, "carrots", getPrice("Carrots"), 0, "../Images/carrots.jpg");
    $cereals = new item(6, "cereals", getPrice("Cereals"), 0, "../Images/cereal.jpg");
    $cheese = new item(7, "cheese", getPrice("Cheese"), 0, "../Images/cheese.jpg");
    $chicken = new item(8, "whole chicken", getPrice("Whole Chicken"), 0, "../Images/chicken.jpg");
    $eggs = new item(9, "dozen of eggs", getPrice("Eggs"), 0, "../Images/eggs.jpeg");
    $groundbeef = new item(10, "ground beef", getPrice("Ground Beef"), 0, "../Images/ground-beef.jpg");
    $lobster = new item(11, "lobster", getPrice("Lobster"), 0, "../Images/lobster.jpg");
    $milk = new item(12, "milk", getPrice("Milk"), 0, "../Images/milk.jpg");
    $mushrooms = new item(13, "mushrooms", getPrice("Mushrooms"), 0, "../Images/mushrooms.jpg");
    $pasta = new item(14, "fusilli", getPrice("Fusilli"), 0, "../Images/pasta.jpg");
    $pear = new item(15, "pear", getPrice("Pear"), 0, "../Images/pear.jpg");
    $rice = new item(16, "rice", getPrice("Rice"), 0, "../Images/rice.png");
    $salmon = new item(17, "salmon", getPrice("Salmon"), 0, "../Images/salmon.jpg");
    $sausages = new item(18, "sausages", getPrice("Two-Sausages"), 0, "../Images/sausages.jpg");
    $shrimps = new item(19, "shrimps", getPrice("Shrimps"), 0, "../Images/shrimp.jpg");

    $_SESSION['cart'] = array($apple, $banana, $bread, $broccoli, $carrots, $cereals, $cheese, $chicken, $eggs, $groundbeef, $lobster, $milk, $mushrooms, $pasta, $pear, $rice, $salmon, $sausages, $shrimps);

} 
// else{
//     $newfile = "..\TextFiles\\newqty.txt";

//     $linearr = array();
//     if(filesize($newfile)){
//         $newfiledirect = fopen($newfile, "r") or die("cannot open file");
//         while(!feof($newfiledirect)){
//             array_push(fgets($newfiledirect), $linearr);
//         }
//         for($i=0; $i < 19; $i++){
//             if($_SESSION['cart'][$i] -> get_quantity() != (int)$linearr[$i]){
//                 $_SESSION['cart'][$i] -> set_quantity((int)$linearr[$i]);
//             }
//         }
//     }
// }

$quantity = $_POST["quantity"];

// TODO: before writing to the file and changing qty, check if the quantities are all the same in file and array. if they are, ignore, if they arent, update the quantities in array

if (isset($_POST['1'])){
    $_SESSION['cart'][0] -> set_quantity($_SESSION['cart'][0] -> get_quantity() + $quantity);
} 
else if (isset($_POST['2'])){
    $_SESSION['cart'][1] -> set_quantity($_SESSION['cart'][1] -> get_quantity() + $quantity);
} else if (isset($_POST['3'])){
    $_SESSION['cart'][2] -> set_quantity($_SESSION['cart'][2] -> get_quantity() + $quantity);
} else if (isset($_POST['4'])){
    $_SESSION['cart'][3] -> set_quantity($_SESSION['cart'][3] ->get_quantity() + $quantity);
} else if (isset($_POST['5'])){
    $_SESSION['cart'][4] -> set_quantity($_SESSION['cart'][4] -> get_quantity() + $quantity);
} else if (isset($_POST['6'])){
    $_SESSION['cart'][5] -> set_quantity($_SESSION['cart'][5] -> get_quantity() + $quantity);
} else if (isset($_POST['7'])){
    $_SESSION['cart'][6] -> set_quantity($_SESSION['cart'][6] -> get_quantity() + $quantity);
} else if (isset($_POST['8'])){
    $_SESSION['cart'][7] -> set_quantity($_SESSION['cart'][7] -> get_quantity() + $quantity);
} else if (isset($_POST['9'])){
    $_SESSION['cart'][8] -> set_quantity($_SESSION['cart'][8] -> get_quantity() + $quantity);
} else if (isset($_POST['10'])){
    $_SESSION['cart'][9] -> set_quantity($_SESSION['cart'][9] -> get_quantity() + $quantity);
} else if (isset($_POST['11'])){
    $_SESSION['cart'][10] -> set_quantity($_SESSION['cart'][10] -> get_quantity() + $quantity);
} else if (isset($_POST['12'])){
    $_SESSION['cart'][11] -> set_quantity($_SESSION['cart'][11] -> get_quantity() + $quantity);
} else if (isset($_POST['13'])){
    $_SESSION['cart'][12] -> set_quantity($_SESSION['cart'][12] -> get_quantity() + $quantity);
} else if (isset($_POST['14'])){
    $_SESSION['cart'][13] -> set_quantity($_SESSION['cart'][13] -> get_quantity() + $quantity);
} else if (isset($_POST['15'])){
    $_SESSION['cart'][14] -> set_quantity($_SESSION['cart'][14] -> get_quantity() + $quantity);
} else if (isset($_POST['16'])){
    $_SESSION['cart'][15] -> set_quantity($_SESSION['cart'][15] -> get_quantity() + $quantity);
} else if (isset($_POST['17'])){
    $_SESSION['cart'][16] -> set_quantity($_SESSION['cart'][16] -> get_quantity() + $quantity);
} else if (isset($_POST['18'])){
    $_SESSION['cart'][17] -> set_quantity($_SESSION['cart'][17] -> get_quantity() + $quantity);
} else{
    $_SESSION['cart'][18] -> set_quantity($_SESSION['cart'][18] -> get_quantity() + $quantity);
}
$_SESSION['productcart'] = "..\TextFiles\productCart.txt";
$file = $_SESSION['productcart'];

$filedirect = fopen($file, "w+") or die("cannot open file");


for($i = 0; $i < 19; $i++){
    if($i != 18){
        $productInfo = $_SESSION['cart'][$i] -> get_itemnumber() ."\t". $_SESSION['cart'][$i] -> get_item() . "\t" . $_SESSION['cart'][$i] -> get_price() . "\t" . $_SESSION['cart'][$i] -> get_quantity() . "\t" . $_SESSION['cart'][$i] -> get_image() . "\n";
        fwrite($filedirect, $productInfo);
    }
    else {
        $productInfo = $_SESSION['cart'][$i] -> get_itemnumber() ."\t". $_SESSION['cart'][$i] -> get_item() . "\t" . $_SESSION['cart'][$i] -> get_price() . "\t" . $_SESSION['cart'][$i] -> get_quantity() . "\t" . $_SESSION['cart'][$i] -> get_image();
        fwrite($filedirect, $productInfo);
    }
}
fclose($filedirect);

echo '
<script>
    alert("Item successfully added to cart");window.history.back()
</script>
';
?>