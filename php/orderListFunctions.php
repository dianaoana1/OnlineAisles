<?php

function addOrder()
{
    if (!isset($_POST['add'])) { ?>
        <div class="form-popup" id="addUserForm">
            <form action="<?php echo $_SESSION['currentPage']; ?>" class="form-container" method="POST">
                <h3>Adding User</h3>
                <label for="username"><b>Username</b></label>
                <input type="text" pattern="[a-zA-Z0-9]{1,20}" placeholder="Enter username" id="usernameForm" name="username" required />

                <label for="password"><b>Password</b></label>
                <input required type="text" placeholder="Enter password" id="passwordForm" name="password"/> 

                <label for="lastName"><b>Last name</b></label>
                <input type="text" pattern="[a-zA-Z]{1,20}" placeholder="Enter last name" id="lastNameForm" name="lastName" required />

                <label for="firstName"><b>First name</b></label>
                <input type="text" pattern="[a-zA-Z]{1,20}" placeholder="Enter first name" id="firstNameForm" name="firstName" required />

                <label for="email"><b>Email</b></label>
                <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter email" id="emailForm" name="email" required />

                <label for="tel1"><b>Tel.1</b></label>
                <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter phone number" id="tel1Form" name="tel1" required />

                <label for="tel2"><b>Tel.2</b></label>
                <input type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter phone number" id="tel2Form" name="tel2" required />

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter address" id="addressForm" name="address" required />
                <br>
                <button type="submit" class="btn btn-primary" name="add">Add New User</button>
            </form>
        </div>
        <?php
    }
    if (isset($_POST['add'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $tel1 = $_POST['tel1'];
        $tel2 = $_POST['tel2'];
        $address = $_POST['address'];
        addUserInfoToFile($username, $password, $lastName, $firstName, $email, $tel1, $tel2, $address);
        header('Location: userList.php');
    }
}
?>