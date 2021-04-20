<?php
echo $id=$_GET['id'];

$product=file("../TextFiles/productDatabase.txt");
foreach ($product as $k=>$p) {
    
    if ($k==$id) { 
        print_r($product[$k]);
        unset($product[$k]);
        break;
    }
}
unlink("../TextFiles/productDatabase.txt");
$fp=fopen("../TextFiles/productDatabase.txt","w");
foreach ($product as $value) {
fwrite($fp,$value);
}
fclose($fp);
echo "<script>location.href='productList.php';</script>";

?>
