<!DOCTYPE html>
<html>

<body>
<?php
class Item
{
    private $itemnumber;
    private $item;
    private $price;
    private $quantity;
    private $image;

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

<?=template_header('productClass')?>
    <tr class="cart-row">
    <td class="tg-even"><?=$itemnumber?></td>
    <td class="tg-even"><img id="image" src="<?=$image["image"]?>" width="60" height="60"></td>
    <td class="tg-even"><?=$item["item"]?></td>

    <td class="tg-even" style="text-align:right"><input type="button" class="btn btn-primary"
        style=" border-radius:100%; padding: 3px 9px;" onclick="decreaseQuantity()"
        value=&#8722; />
    </td>
    <td class="tg-even item-quantity"><?=$quantity["quantity"]?></td>
    <td class="tg-even" style="text-align:left"><input type="button" class="btn btn-primary"
        style=" border-radius:100%; padding: 3px 9px;" onclick="increaseQuantity()"
        value=&#43; />
    </td>

    <?php $price = substr($price["price"], 1, ?>
    <td class="tg-even item-price">$<?=$price?></td>
    <td class="tg-even"><input type="button" class="btn btn-primary"
        style=" border-radius:100%; padding: 3px 10px;" onclick="deleteItem()" value="×" />
    </td>
    </tr>
<?=template_footer()?>
