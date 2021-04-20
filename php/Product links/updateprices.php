<?php
start_session();
include_once 'shoppingcart.php';

function totalprice(){
    $subtotal = 0;
    for($i = 1; $i <= $_SESSION['count']; $i++){
        $subtotal += $_SESSION['quantity'.$i]*$_SESSION['price'.$i];
    }
    $total = $subtotal * 1.05 * 1.0998;
    return $total;
}


$dataline = $_SESSION['count'] . "\t" . totalprice() . "\t";
for($i = 1; $i <= $_SESSION['count']; $i++){
    $dataline += $_SESSION['prodnum'.$i];
}
$file = "..\TextFiles\orderInfo.txt";
$filedirect = fopen($file, "w+") or die("cannot open file");
fwrite($filedirect,$dataline);

echo 'Successfully written to file!';
?>