<?php
class Item
{
    protected $itemnumber;
    protected $item;
    protected $price;
    protected $quantity;
    protected $image;

    function __construct($itemnumber, $item, $price, $quantity, $image)
    {
        $this->itemnumber = $itemnumber;
        $this->item = $item;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->image = $image;
    }

    public function set_itemnumber($itemnumber)
    {
        $this->itemnumber = $itemnumber;
    }

    public function get_itemnumber()
    {
        return $this->itemnumber;
    }

    public function set_item($item)
    {
        $this->item = $item;
    }

    public function get_item()
    {
        return $this->item;
    }

    public function set_price($price)
    {
        $this->price = $price;
    }

    public function get_price()
    {
        return $this->price;
    }

    public function set_quantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function get_quantity()
    {
        return (int) $this->quantity;
    }

    public function set_image($image)
    {
        $this->image = $image;
    }

    public function get_image()
    {
        return $this->image;
    }

}
?>