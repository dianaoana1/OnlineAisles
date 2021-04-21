<?php
$id=$_GET['id'];

$fp=fopen("../TextFiles/orderInfo.txt","a") or die("rip");

$cart=file("../TextFiles/productCart.txt");

$line=explode("\t",$cart[$id]);

fwrite($fp,"\r\n"."admin"."\t".$line[1]."\t".$line[3]."\t".$line[2]); 
fclose($fp);

foreach ($cart as $k=>$c) {
    if ($k==$id) { 
        unset($cart[$k]);
        break;
    }
}

unlink("..\TextFiles\productCart.txt");
$fpa=fopen("..\TextFiles\productCart.txt","w");
foreach ($cart as $value) {
fwrite($fpa,$value);
}
fclose($fpa);


echo "<script>location.href='orderList.php';</script>";

?>
