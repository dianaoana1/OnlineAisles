<?php
$id=$_GET['id'];
$order=file("..\TextFiles\orderInfo.txt");
$line=explode("\t",$order[$id]);

$user=file("..\TextFiles\userInfo.txt");
foreach ($user as $k=>$u) {
    $linea=explode("\t",$u);
    if($linea[0]=$line[0]){
        $to=$linea[4];
    }
}    

foreach ($order as $k=>$o) {
    
    if ($k==$id) { 
        
        unset($order[$k]);
        break;
    }
}
unlink("..\TextFiles\orderInfo.txt");
$fp=fopen("..\TextFiles\orderInfo.txt","w");
foreach ($order as $value) {
fwrite($fp,$value);
}
fclose($fp);



$subject = "Test mail";
$message = "Hello! Your order deleted.";
$from = "someonelse@example.com";
$headers = "From: $from";
mail($to,$subject,$message,$headers);


/*
echo "<script>location.href='orderList.php';</script>";
*/
?>
