<?php
require 'userInfoFile.php';
$thisPage = htmlspecialchars($_SERVER["PHPH_SELF"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Form - Online Grocery Store</title>
</head>

<body>
    <?php
    if (isset($_POST['userInfo'])) {
        $username = $_POST['username'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $tel1 = $_POST['tel1'];
        $tel2 = $_POST['tel2'];
        $address = $_POST['address'];
        addUserInfoToFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address);
        echo ProcessUsers($file);
    } else {
    ?>
        <div class="form-popup" id="addUserForm">
            <form action="<?php echo $thisPage; ?>" class="form-container" method="POST">
                <label for="lastName"><b>Last name</b></label>
                <input type="text" placeholder="Enter last name" id="lastNameForm" name="lastName" required />

                <label for="firstName"><b>First name</b></label>
                <input type="text" placeholder="Enter first name" id="firstNameForm" name="firstName" required />

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter email" id="emailForm" name="email" required />

                <label for="tel1"><b>Tel.1</b></label>
                <input type="text" placeholder="Enter phone number" id="tel1Form" name="tel1" required />

                <label for="tel2"><b>Tel.2</b></label>
                <input type="text" placeholder="Enter phone number" id="tel2Form" name="tel2" required />

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter address" id="addressForm" name="address" required />

                <button type="submit" class="btn" name="userInfo">Save</button>
            </form>
        </div>
    <?php
    } ?>


</body>

</html>