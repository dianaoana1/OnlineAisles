<?php
error_reporting(~0);
ini_set('display_errors', 1);
function getPrice($product){
    $file=fopen("..\..\TextFiles\productDatabase.txt","r") or die("RIP");
    $numLines=count(file("..\..\TextFiles\productDatabase.txt"));
    
    $arr=array();
    $arr=getUserData($numLines,$file);
    for($i=0;$i<$numLines;$i++){
     $lines=explode("*",$arr[$i]);
     if($lines[0]==$product){
      return $lines[2];       
     }
    }
    return null;
    
}
function getUserData($numLines,$file)
{
    $arr=array();       
    for($i=0;$i<$numLines;$i++){
    $arr[$i]=fgets($file);
    }
    return $arr;
}


?>