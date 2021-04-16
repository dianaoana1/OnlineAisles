<?php
session_start();

?>
<!DOCTYPE HTML>
<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php
    $username = $itemname  = $comment = $order = "";
    $user_exists = false;
    $file = fopen("..\TextFiles\logsContactus.txt", "a+");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //username part
        if (!empty($_POST["username"])) {
            $username = test_input($_POST["username"]);
        }
        //itemname part
        if (!empty($_POST["itemName"]) && !checkitemName($_POST["itemName"])) {
            $itemname = test_input($_POST["itemName"]);
        }
        //ordernumber part
        if (!empty($_POST["orderNumber"]) && checkOrderNum($_POST["orderNumber"])) {
            $order = test_input($_POST["orderNumber"]);
        }
        //comment part
        if (!empty($_POST["comment"])) {
            $comment = test_input($_POST["comment"]);
        }
        if (!empty($_POST["username"]) && !empty($_POST["itemName"]) && !checkitemName($_POST["itemName"]) && !empty($_POST["orderNumber"]) && checkOrderNum($_POST["orderNumber"]) && !empty($_POST["comment"])) {
            if (!usernameExists($username)) {
                echo "<script>alert('This username does not exist please register thank you');document.location='../html/Signup.html'</script>";
            } else {
                if (file_get_contents($file) == "") {
                    fwrite($file, "\n");
                }
                fwrite($file, "Start of this comment:\n");
                fwrite($file, "User:" . $username . "\n");
                fwrite($file, "Item Name:" . $itemname . "\n");
                fwrite($file, "Order Number:" . $order . "\n\n");
                fwrite($file, $comment . "\n");
                echo "<script>alert('Thank you for the comment we will make sure to do better have a great day ');document.location='../html/shopping_cart.html'</script>";
            }
        }
    }
    function usernameExists($username)
    {
        echo readUserFile() . "</br>";
        echo $username . "</br>";
        if (preg_match("/$username/", readUserFile())) {
            return true;
        } else {
            return false;
        }
    }
    function readUserFile()
    {
        $fullString = file_get_contents("..\TextFiles\initialUserDatabase.txt");
        return $fullString;
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function  checkitemName($itemname)
    {
        $reg = "/[0-9]/";
        if (preg_match($reg, $itemname)) {
            return true;
        } else {
            return false;
        }
    }
    function checkOrderNum($orderNum)
    {
        $reg = "/^#{1}[0-9]{5}[A-Za-z]{2}$/";
        if (strlen($orderNum) != 8) {
            return false;
        } else if (preg_match($reg, $orderNum)) {
            return true;
        } else {
            return false;
        }
    }



    ?>


</body>

</html>