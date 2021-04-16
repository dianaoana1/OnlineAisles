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

    $usernameErr = $itemNameErr = $OrderNameErr = $commentErr = "";
    $username = $itemname  = $comment = $order = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $nameErr = "Username is required";
        } else {
            $username = test_input($_POST["username"]);
        }

        if (empty($_POST["itemname"])) {
            $itemNameErr = "Item Name is required";
        } else {
            $itemname = test_input($_POST["itemname"]);
        }
        if (empty($_POST["order"])) {
            $OrderNameErr = "Order Number is Empty";
        } else {
            $order = test_input($_POST["comment"]);
        }
        if (empty($_POST["comment"])) {
            $commentErr = "Please enter a comment";
        } else {
            $comment = test_input($_POST["commentt"]);
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function checkOrderNum($orderNum)
    {
        $reg="/[a-zA-z]/";
    }/*
    function checkOrderNum() {
    var order_num = document.getElementById("orderNum").value;
    const regexp2=new RegExp("^#{1}[0-9]{5}[A-Za-z]{2}$");
    console.log(regexp2.test(order_num));
    if(order_num.length==0){
        alert("Please enter the order number");
    }else  if (regexp2.test(order_num)) {
        return true;
    }
    else {
       alert('Order number does not follow expected format. Should be of the form #12345AB.');
        return false;
    }
   
}*/
    ?>


</body>

</html>