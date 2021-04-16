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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        if (!empty($_POST["username"])) {
            $username = test_input($_POST["username"]);
    }

        if (empty($_POST["itemName"])) {
            $itemNameErr = "Item Name is required";
           
        }else if (checkitemName($_POST["itemName"])){
          $itemNameErr="Please enter a valid itemName";
          echo "empty mofo";
        } else {
            $itemname = test_input($_POST["itemName"]);
        }
        if (empty($_POST["orderNumber"])) {
            $orderNameErr = "Order Number is Empty";
        } else if(checkOrderNum($_POST["orderNumber"])){
           $orderNameErr="Order Number does Not match the #12345AB format";
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
    function  checkitemName($itemname)
    {
        $reg="/[0-9]/";
        if(preg_match($reg,$itemname)){
            return true;
        }else{
            return false;
        }
    }
    function checkOrderNum($orderNum){
       $reg="/^#{1}[0-9]{5}[A-Za-z]{2}$/";
       if(strlen($orderNum)!=8){
           return false;
       }else if (preg_match($reg,$orderNum)) {
            return true;
       }else{
           return false;
       }
    }
    
    
    
    ?>


</body>

</html>