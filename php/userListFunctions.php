<?php
session_start();
/*function deleteUser(){

}*/

function fileIsEmpty($file)
{
    $fileOpen = fopen($file, "r");
    while (!feof($fileOpen)) {   //reading file line by line
        $line = fgets($fileOpen);
        if ($line != "") {
            return false;
        }
    }
    return true;
}

function addUser()
{
    if (!isset($_POST['add'])) { ?>
        <div class="form-popup" id="addUserForm">
            <form action="<?php echo $_SESSION['currentPage']; ?>" class="form-container" method="POST">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter username" id="usernameForm" name="username" required />

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
                <br>
                <button type="submit" class="btn btn-primary" name="add">Add New User</button>
            </form>
        </div>
    <?php
    }
    if (isset($_POST['add'])) {
        $username = $_POST['username'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $tel1 = $_POST['tel1'];
        $tel2 = $_POST['tel2'];
        $address = $_POST['address'];
        // echo ($username.$lastName.$firstName.$email.$tel1.$tel2.$address);
        addUserInfoToFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address);
        echo '<a type="text" name="return-to-user-list" style="font-weight: bold;" class="btn btn-primary" href="userList.php">Click here to return to user list</a>';
        // header('Location: userList.php');
    }
}

function editUser()
{
    fopen($_SESSION['file'], "a+");
    if (isset($_POST['save'])) {
        $username = $_POST['username'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $tel1 = $_POST['tel1'];
        $tel2 = $_POST['tel2'];
        $address = $_POST['address'];
        editUserInfoFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address);
        echo ProcessUsersToTable();
    } else {
    ?>
        <div class="form-popup" id="editUserForm">
            <form action="<?php echo $_SESSION['currentPage']; ?>" class="form-container" method="POST">
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
                <br>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            </form>
        </div>
<?php
    }
}
//adds row to the table being generated
function newRow($count, $username, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    $userID = $count;
    if ($count % 2 == 0) {
        return "<tr>
        <td class=\"tg-even\">".$userID."</td>
        <td class=\"tg-even\">".$username."</td>
        <td class=\"tg-even\">".$lastName."</td>
        <td class=\"tg-even\">".$firstName."</td>
        <td class=\"tg-even\"><a href=".$tel1.">514-123-4567</a></td>
        <td class=\"tg-even\"><a href=".$tel2.">514-891-0111</a></td>
        <td class=\"tg-even\"><a href=\"mailto:".$email."?subject=Changes to User Profile\">".$email."</a></td>
        <td class=\"tg-even\">".$address."</td>
        <td class=\"tg-even\"><input type=\"checkbox\" class=\"users\" name=\"user\"></td>
    </tr>";
    } else {
        return "<tr>
            <td class=\"tg-odd\">".$userID."</td>
            <td class=\"tg-odd\">".$username."</td>
            <td class=\"tg-odd\">".$lastName."</td>
            <td class=\"tg-odd\">".$firstName."</td>
            <td class=\"tg-odd\"><a href=".$tel1.">".$tel1."</a></td>
            <td class=\"tg-odd\"><a href=".$tel2.">".$tel2."</a></td>
            <td class=\"tg-odd\"><a href=\"mailto:".$email."?subject=Changes to User Profile\">".$email."</a></td>
            <td class=\"tg-odd\">".$address."</td>
            <td class=\"tg-odd\"><input type=\"checkbox\" class=\"users\" name=\"user\"></td>
        </tr>";
    }
}

//generates empty table
function ProcessEmptyTable()
{
    echo ('<table class="tg" id="userTable" name="userTable">
                <thead>
                    <tr>
                        <th class="tg-header">User ID</th>
                        <th class="tg-header">Username</th>
                        <th class="tg-header">Last name</th>
                        <th class="tg-header">First Name</th>
                        <th class="tg-header">Tel.1</th>
                        <th class="tg-header">Tel.2</th>
                        <th class="tg-header">Email</th>
                        <th class="tg-header">Address</th>
                        <th class="tg-header">Select User</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tg-even" colspan="9">No users have been registered yet aside from the admin role</td>
                    </tr>
                </tbody>
                </table><div style="position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal">
                <a type="text" name="add-user-button" style="font-weight: bold;" class="btn btn-primary" href="addUserPage.php">Add New User</a>
            </div>');
}

//generates table when users exist
function ProcessUsersToTable()
{
    $file = fopen($_SESSION['file'], "a+");
    $result = "";
    $result .= "<table class=\"tg\" id=\"userTable\" name = \"userTable\">
    <thead>
    <th class=\"tg-header\">User ID</th>
    <th class=\"tg-header\">Username</th>
    <th class=\"tg-header\">Last name</th>
    <th class=\"tg-header\">First Name</th>
    <th class=\"tg-header\">Tel.1</th>
    <th class=\"tg-header\">Tel.2</th>
    <th class=\"tg-header\">Email</th>
    <th class=\"tg-header\">Address</th>
    <th class=\"tg-header\">Select User</th>
    </thead>
    <tbody>";
    $count = 0;
    while (!feof($file)) {   //reading file line by line
        $count++;
        $line = fgets($file);
        // $lineArr = explode($line, "\t");
        $lineArr = explode($line, "\t");
        echo $lineArr[0].$lineArr[1]. $lineArr[2]. $lineArr[3]. $lineArr[4]. $lineArr[5]. $lineArr[6];
        $result .= newRow($count, $lineArr[0], $lineArr[1], $lineArr[2], $lineArr[3], $lineArr[4], $lineArr[5], $lineArr[6]);    //adding new table rows
    }
    $result .= "</tbody></table>
    <div style=\"position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal\">
            <a type=\"text\" name=\"add-user-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"addUserPage.php\">Add New User</a>
            <a type=\"text\" name=\"edit-user-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"editUser.php\">Edit User</a>
            <a type=\"text\" name=\"delete-user-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"userList.php?delete-user-button=true\">Delete User</a>
        </div>";
    fclose($file);
    echo $result;
}

function addUserInfoToFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    if (fileIsEmpty($_SESSION['file'])){
        $userInfo = $username . "\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    }
    else{
        $userInfo =  "\n".$username . "\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    }
    $filedir = $_SESSION['file'];
    if (file_exists($filedir)) {
        $file = fopen($filedir, 'a') or die("Unable to open 'userInfo.txt'.");
        fwrite($file, $userInfo);
        fclose($file);
    } else {
        echo "Unable to open 'userInfo.txt'.";
    }
}

function editUserInfoFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    $userInfo =  $username . "\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    $filedir = $_SESSION['file'];
    if (file_exists($filedir)) {
        $file = fopen($filedir, 'r+') or die("Unable to open 'userInfo.txt'.");
        while (!feof($file)) {   //reading file line by line
            $line = fgets($file);
            $lineArr = explode($line, "\t");
            if (strcmp($lineArr[0], $username) == 0)
                $editedLine = $userInfo;
        }
        //deleting specific user info line from the file
        $contents = file_get_contents($file);
        $contents = str_replace($editedLine, '', $contents);
        file_put_contents($file, $contents);
        fclose($file);
    } else {
        echo "Unable to open 'userInfo.txt'.";
    }
}

function deleteUserFromFile($username)
{
    $filedir = $_SESSION['file'];
    if (file_exists($filedir)) {
        $file = fopen($filedir, 'r+') or die("Unable to open 'userInfo.txt'.");
        if (is_readable($file) && is_writeable($file)) {
            while (!feof($file)) {   //reading file line by line
                $line = fgets($file);
                $lineArr = explode($line, "\t");
                if (strcmp($lineArr[0], $username) == 0) {
                    $skippedLine = $line;
                }
            }
            //deleting specific user info line from the file
            $contents = file_get_contents($file);
            $contents = str_replace($skippedLine, '', $contents);
            file_put_contents($file, $contents);
            fclose($file);
        }
    } else {
        echo "Unable to open 'userInfo.txt'.";
    }
}
?>