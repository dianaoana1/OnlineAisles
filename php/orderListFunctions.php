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
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="tg-even" colspan="4">No orders yet</td>
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
    <th class=\"tg-header\">Order Number</th>
    <th class=\"tg-header\">User</th>
    <th class=\"tg-header\">Item Number</th>
    <th class=\"tg-header\">Quantity</th>
    <tbody>";
    $count = 0;
    while (!feof($file)) {   //reading file line by line
        $count++;
        $line = fgets($file);
        $lineArr = explode("\t", $line);
        $result .= newRow($count, $lineArr[0], $lineArr[1], $lineArr[2]);    //adding new table rows
    }
    $result .= "</tbody></table></div>
    <div style=\"position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal\">
            <a type=\"text\" name=\"add-order-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"addOrder.php\">Add New Order</a>
            <a type=\"text\" name=\"edit-order-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"editOrder.php\">Edit Order</a>
            <a type=\"text\" name=\"delete-order-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"deleteOrder.php\">Delete Order</a>
        </div>";
    fclose($file);
    echo $result;

}

function newRow($count, $username, $itemNum, $quantity)
{
    $userID = $count;
    if ($count % 2 == 0) {
        return "<tr>
        <td class=\"tg-even\">" . $userID . "</td>
        <td class=\"tg-even\">" . $username . "</td>
        <td class=\"tg-even\">" . $itemNum . "</td>
        <td class=\"tg-even\">" . $quantity . "</td>
    </tr>";
    } else {
        return "<tr>
        <td class=\"tg-even\">" . $userID . "</td>
        <td class=\"tg-even\">" . $username . "</td>
        <td class=\"tg-even\">" . $itemNum . "</td>
        <td class=\"tg-even\">" . $quantity . "</td>
        
        </tr>";
    }
}

function ProcessOrderList()
{
    $file = fopen($_SESSION['file'], "a+");
    $result = "";
    $result .= "<table class=\"tg\" id=\"orderTable\" name = \"orderTable\">
    <thead>
    <th class=\"tg-header\">Order Number</th>
    <th class=\"tg-header\">User</th>
    <th class=\"tg-header\">Item Number</th>
    <th class=\"tg-header\">Quantity</th>
    <tbody>";
    $count = 0;
    while (!feof($file)) {   //reading file line by line
        $count++;
        $line = fgets($file);
        $lineArr = explode("\t", $line);
        $result .= newRow($count, $lineArr[0], $lineArr[1], $lineArr[2]);
    }
    $result .= "</tbody></table>";
    fclose($file);
    echo $result;
}

function addOrderInfoToFile($userID, $username, $itemNum, $quantity)
{
    if (fileIsEmpty($_SESSION['file'])) {
        $orderInfo = $userID ."\t" . $username ."\t" . $itemNum . "\t" . $quantity;
    } else {
        $orderInfo =  "\n" . $userID ."\t" . $username ."\t" . $itemNum . "\t" . $quantity;
    }
    if (file_exists($_SESSION['file'])) {
        $file = fopen($_SESSION['file'], 'a') or die("Unable to open 'orderInfo.txt'.");
        fwrite($file, $orderInfo);
        fclose($file);
    } else {
        echo "Unable to open 'orderInfo.txt'.";
    }
}

function getLastLine(){
    $file = fopen("..\TextFiles\orderInfo.txt", 'r') or die("Unable to open 'orderInfo.txt'.");
    $lineCount = 0;
    while (!feof($file)) {
        fgets($file);
        $lineCount++;
    }
    return $lineCount;
    fclose($file);
}

function editOrderInfoFile($userID, $username, $itemNum, $quantity)
{
    $orderInfo = $userID ."\t" . $username ."\t" . $itemNum . "\t" . $quantity;
    $file = fopen("..\TextFiles\orderInfo.txt", 'r') or die("Unable to open 'orderInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempOrderInfo.txt", 'w') or die("Unable to open 'tempOrderInfo.txt'.");
    $lineCount = 1;
    //copying userInfo.txt to tempOrderInfo.txt
    $lastLine = getLastLine();
    echo $lastLine;
    while (!feof($file)) {
        $line = fgets($file);
        if ($lineCount==$userID) {
            if ($lineCount == $lastLine){
                echo $lastLine;
                fwrite($tempFile, $orderInfo);
            }
            else{
                fwrite($tempFile, $orderInfo."\n");
            }
        }
        else{
            fwrite($tempFile, $line);
        }
        $lineCount++;
    }
    fclose($tempFile);
    fclose($file);
    //clearing 
    $file = fopen("..\TextFiles\orderInfo.txt", 'w') or die("Unable to open 'orderInfo.txt'.");
    fclose($file);
    $file = fopen("..\TextFiles\orderInfo.txt", 'a') or die("Unable to open 'orderInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempOrderInfo.txt", 'r') or die("Unable to open 'tempOrderInfo.txt'.");
    //putting back all order info into orderInfo.txt
    while (!feof($tempFile)) {
        $line = fgets($tempFile);
        fwrite($file, $line);
    }
    fclose($file);
    fclose($tempFile);
}

function deleteOrderFromFile($userID)
{
    $file = fopen("..\TextFiles\orderInfo.txt", 'r') or die("Unable to open 'orderInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempOrderInfo.txt", 'w') or die("Unable to open 'tempOrderInfo.txt'.");
    $lineCount = 1;
    //copying orderInfo.txt to tempOrderInfo.txt
    while (!feof($file)) {
        $line = fgets($file);
        if ($lineCount!=$userID) {
            fwrite($tempFile, $line);
        }
        $lineCount++;
    }
    fclose($tempFile);
    fclose($file);
    //clearing orderInfo.txt
    $file = fopen("..\TextFiles\orderInfo.txt", 'w') or die("Unable to open 'orderInfo.txt'.");
    fclose($file);
    $file = fopen("..\TextFiles\orderInfo.txt", 'a') or die("Unable to open 'orderInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempOrderInfo.txt", 'r') or die("Unable to open 'tempOrderInfo.txt'.");
    //putting back all order info into orderInfo.txt except the deleted order
    while (!feof($tempFile)) {
        $line = fgets($tempFile);
        fwrite($file, $line);
    }
    fclose($file);
    fclose($tempFile);
}

function editUser($userID)
{
    $thisPage = htmlspecialchars($_SERVER["PHP_SELF"]);
    if (!isset($_POST['edit'])) {
        $file = fopen("..\TextFiles\orderInfo.txt", 'r') or die("Unable to open 'orderInfo.txt'.");
        $lineCount = 1;
        while (!feof($file)) {   //reading file line by line
            $line = fgets($file);
            if ($lineCount == $userID) {
                $lineArr = explode("\t", $line);
                $ordernum = $lineArr[0];
                $username = $lineArr[1];
                $itemNum = $lineArr[2];
                $quantity = $lineArr[3];
                
            }
            $lineCount++;
        }
?>
        <div class="form-popup" id="editOrderForm">
            <form action="<?php echo $thisPage; ?>" class="form-container" method="POST">
                <h3>Editing Order</h3>
                <label for="username"><b>username</b></label>
                <input required type="text" pattern="[a-zA-Z0-9]{1,20}" placeholder="Enter username" id="usernameForm" name="username" value="<?php echo $username; ?>" />

                <label for="itemNum"><b>item number</b></label>
                <input required type="text" placeholder="Enter item number" id="Enter itemNum" name="itemNumForm" value="<?php echo $itemNum; ?>" />  

                <label for="lastName"><b>quantity</b></label>
                <input required type="text" pattern="[a-zA-Z]{1,20}" placeholder="Enter quantity" id="quantityForm" name="quantity" value="<?php echo $quantity; ?>" />

                <br>
                <button type="submit" class="btn btn-primary" name="edit">Save Changes</button>
            </form>
        </div>
<?php
    } else {
        echo "Error occured.<br>Unable to open 'orderInfo.txt'.";
    }
    if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $itemNum = $_POST['itemNum'];
        $quantity = $_POST['quantity'];
        
        editUserInfoFile($userID, $username, $itemNum, $quantity);
        header('Location: orderList.php');
    }
}

?>