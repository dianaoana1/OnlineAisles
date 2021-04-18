<?php
echo $id=$_GET['id'];

$product=file("../productDatabase.txt");
foreach ($product as $k=>$p) {
    
    if ($k==$id) { 
        print_r($product[$k]);
        unset($product[$k]);
        break;
    }
}
unlink("../productDatabase.txt");
$fp=fopen("../productDatabase.txt","w");
foreach ($product as $value) {
fwrite($fp,$value);
}
fclose($fp);
echo "<script>location.href='productList.php';</script>";

?>
