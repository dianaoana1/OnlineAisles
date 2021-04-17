<!DOCTYPE html>
<html>

<body>
<?php
class Item
{
    $_SESSION["itemnumber"];
    $item;
    $price;
    $quantity;
    $image;

    function __construct($itemnumber, $item, $price, $quantity, $image)
    {
        $this->itemnumber = $itemnumber;
        $this->item = $item;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
    }

    function set_itemnumber($itemnumber)
    {
        $this->itemnumber = $itemnumber;
    }

    function get_itemnumber()
    {
        return $this->itemnumber;
    }

    function set_item($item)
    {
        $this->item = $item;
    }

    function get_item()
    {
        return $this->item;
    }

    function set_price($price)
    {
        $this->price = $price;
    }

    function get_price()
    {
        return $this->price;
    }

    function set_quantity($quantity)
    {
        $this->quantity = $quantity;
    }

    function get_quantity()
    {
        return $this->quantity;
    }

    function set_image($image)
    {
        $this->image = $image;
    }

    function get_image()
    {
        return $this->image;
    }

}
?>