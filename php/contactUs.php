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
    $user_exists=false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //username part
        if (!empty($_POST["username"])) {
            $username = test_input($_POST["username"]);
            echo $username."</br>";
        }
        //itemname part
        if (!empty($_POST["itemName"]) && !checkitemName($_POST["itemName"])) {
            $itemname = test_input($_POST["itemName"]);
            echo $itemname."</br>";
        }

        //ordernumber part
        if (!empty($_POST["orderNumber"]) && checkOrderNum($_POST["orderNumber"])) {
            $order = test_input($_POST["orderNumber"]);
            echo $order."</br>";
        }
        //comment part
        if (!empty($_POST["comment"])) {
            $comment = test_input($_POST["comment"]);
            echo $comment."</br>";
        }
        if(!isset($_SESSION)||!usernameExists($username)){
          header("Location:../html/login.html");
        }

    }
    
    function usernameExists($username){
     return false;
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