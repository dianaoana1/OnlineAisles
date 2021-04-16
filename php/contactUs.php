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
    $file=fopen("..\TextFiles\logsContactus.txt","a+");
    fwrite($file2,"a");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        fwrite($file, "Start of this comment:\n");
        //username part
        if (!empty($_POST["username"])) {
            $username = test_input($_POST["username"]);
            fwrite($file,"User:".$username. "\n");
            echo $username . "</br>";

        }
        //itemname part
        if (!empty($_POST["itemName"]) && !checkitemName($_POST["itemName"])) {
            $itemname = test_input($_POST["itemName"]);
            fwrite($file,"Item Name:".$itemname. "\n");
            echo $itemname . "</br>";
        }

        //ordernumber part
        if (!empty($_POST["orderNumber"]) && checkOrderNum($_POST["orderNumber"])) {
            $order = test_input($_POST["orderNumber"]);
            fwrite($file,"Order Number:".$order. "\n\n");
            echo $order . "</br>";
        }
        //comment part
        if (!empty($_POST["comment"])) {
            $comment = test_input($_POST["comment"]);
            fwrite($file,$comment. "\n");
            echo $comment . "</br>";
        }
        if (!isset($_SESSION)) {
            echo "<script>alert('This user is not signed on currently');document.location='../html/Login.html'</script>";
         } else if (!usernameExists($username)) {
            echo "<script>alert('The username does not exist');document.location='../html/Signup.html'</script>";
        } else {
            //Add here the methods to write to the file the comments
            echo "<script>alert('Thank you for the comment we will make sure to do better have a great day ');document.location='../html/shopping_cart.html'</script>";
        }
    }

    function usernameExists($username)
    {
        $fullString = readUserFile();
        if (preg_match("/.$username./", $fullString) && $username == $_SESSION["username"]) {
            return true;
        } else {
            return false;
        }
    }
    function readUserFile()
    {
        $file = fopen("userFile.txt", "r");
        $fullString = file_get_contents($file);
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