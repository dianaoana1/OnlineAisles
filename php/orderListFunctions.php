<?php
session_start();

function addOrder()
{
    if (!isset($_POST['add'])) { ?>
        <div class="form-popup" id="addOrderForm">
            <form action="<?php echo $_SESSION['currentPage']; ?>" class="form-container" method="POST">
                <h3>Adding User</h3>
                <label for="username"><b>Username</b></label>
                <input type="text" pattern="[a-zA-Z0-9]{1,20}" placeholder="Enter username" id="usernameForm" name="username" required />

                <label for="itemNum"><b>Item Number</b></label>
                <input required type="text" placeholder="Enter item number" id="itemNumForm" name="itemNum"/> 

                <label for="quantity"><b>Quantity</b></label>
                <input type="text" pattern="[0-9]{1,3}" placeholder="Enter item quantity" id="quantityForm" name="quantity" required />

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter address" id="addressForm" name="address" required />
                <br>
                <button type="submit" class="btn btn-primary" name="add">Add New Order</button>
            </form>
        </div>
        <?php
    }
    if (isset($_POST['add'])) {
        $username = $_POST['username'];
        $itemNum = $_POST['itemNum'];
        $quantity = $_POST['quantity'];
        addOrderToFile($username, $itemNum, $quantity);
        header('Location: orderList.php');
    }
}

function addOrderToFile($username, $itemNum, $quantity)
{
    $file = "..\TextFiles\orderInfo.txt";
    if (fileIsEmpty($file)) {
        $orderInfo = $username ."\t" . $itemNum . "\t" . $quantity;
    } else {
        $orderInfo =  "\n" . $username . "\t" . $itemNum;
    }
    if (file_exists($file)) {
        $file = fopen($file, 'a') or die("Unable to open 'orderInfo.txt'.");
        fwrite($file, $orderInfo);
        fclose($file);
    } else {
        echo "Unable to open 'orderInfo.txt'.";
    }
}
function ProcessEmptyOrderTable(){
    echo('<table class="tg" id="orderTable">
    <thead>
        <tr>
            <th class="tg-header">Order Number</th>
            <th class="tg-header">User</th>
            <th class="tg-header">Item Number</th>
            <th class="tg-header">Quantity</th>
            <th class="tg-header">Address</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-even" colspan="5">No orders yet</td>
            </tr>
        </tbody>
        </table></div><div style="position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal">
        <a type="text" name="add-order-button" style="font-weight: bold;" class="btn btn-primary" href="addOrder.php">Add new order</a>
    </div><div style="margin-bottom:517px;">
    </div>');
}

function ProcessOrdersToTable(){
    $file = fopen($_SESSION['file'], "a+");
    $result = "";
    $result .= "<table class=\"tg\" id=\"orderTable\" name = \"orderTable\">
    <thead>
    <th class="tg-header">Order Number</th>
    <th class="tg-header">User</th>
    <th class="tg-header">Item Number</th>
    <th class="tg-header">Quantity</th>
    <th class="tg-header">Address</th>
    <tbody>";
    $count = 0;
    while (!feof($file)) {   //reading file line by line
        $count++;
        $line = fgets($file);
        $lineArr = explode("\t", $line);
        $result .= newRow($count, $lineArr[0], $lineArr[1], $lineArr[2], $lineArr[3]);    //adding new table rows
    }
    $result .= "</tbody></table></div>
    <div style=\"position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal\">
            <a type=\"text\" name=\"add-order-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"addOrder.php\">Add New Order</a>
            <a type=\"text\" name=\"edit-order-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"editOrder.php\">Edit User</a>
            <a type=\"text\" name=\"delete-order-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"deleteOrder.php\">Delete User</a>
        </div>";
    fclose($file);
    echo $result;

}
?>