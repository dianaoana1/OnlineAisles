<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        session_start();
        // get data from values
        $_SESSION["itemnumber"];
        $_SESSION["item"];
        $_SESSION["price"];
        $_SESSION["quantity"];
        $_SESSION["image"];
        $product = new productClass($itemnumber['itemnumber'], $item['item'], $price['price'], $quantity['quantity'], $image['image'])
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
    </body>
</html>