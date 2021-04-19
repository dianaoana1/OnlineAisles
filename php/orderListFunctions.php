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

}

function ProcessOrdersToTable(){

}
?>