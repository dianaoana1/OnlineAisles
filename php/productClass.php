<!DOCTYPE html>
<html>

<body>
<?php
<include "apple.html"
class Item
{
    private $item;
    private $price;
    private $quantity;
    private $image;

    function __construct($item, $price, $quantity, $image)
    {
        $this->item = $item;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
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


cartline()
?>
</body>
</html>