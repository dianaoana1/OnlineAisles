<?php
  class User{
   private $username;
   private $email;
   private $pword;
   private $ismember;//boolean
   private $iscorporate;//boolean
   private $company;
   private $address1;
   private $address2;//this one can be null
   private $city;
   private $pcode;
   
   function set_username($username){
    $this->username=$username;
   }
   function get_username(){
    return $this->username;
   }
   function set_email($email){
    $this->email=$email;
   }
   function get_email(){
    return $this->email;
   }
   function set_pword($pword){
    $this->pword=$pword;
   }
   function get_pword(){
    return $this->pword;
   }
   function set_ismember($ismember){
    $this->ismember=$ismember;
   }
   function get_ismember(){
    return $this->ismember;
   }
   function set_iscorporate($iscorporate){
    $this->iscorporate=$iscorporate;
   }
   function get_iscorporate(){
    return $this->iscorporate;
   }
   function set_company($company){
    $this->company=$company;
   }
   function get_company(){
    return $this->company;
   }
   function set_address1($address1){
    $this->address1=$address1;
   }
   function get_address1(){
    return $this->address1;
   }
   function set_address2($address2){
    $this->address2=$address2;
   }
   function get_address2(){
    return $this->address2;
   }
   function set_city($city){
    $this->city=$city;
   }
   function get_city(){
    return $this->city;
   }
   function set_pcode($pcode){
    $this->pcode=$pcode;
   }
   function get_pcode(){
    return $this->pcode;
   }

}
