<?php
session_start();

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
                <h3>Adding User</h3>
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
        addUserInfoToFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address);
        header('Location: userList.php');
    }
}

/*function getUserID()
{
    if (isset($_POST['edit-user-button'])) { ?>
    <div>
        <form action="<?php echo $_SESSION["currentPage"]; ?>" method="POST">
            <label>Enter the user ID number of the user you would like to edit:</label>
            <input type="text" placeholder="User ID #" name="userID" required />
            <div style="position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal">
                <a type="text" name="enter-button" style="font-weight: bold;" class="btn btn-primary" href="editUserPage.php">Enter</a>
                <a type="text" name="cancel-button" style="font-weight: bold;" class="btn btn-primary" href="userList.php">Cancel</a>
            </div>
        </form>
    </div>
        <?php
        if (isset($_POST['enter-button'])) {
            $userID = $_POST['userID'];
            return $userID;
        }
    }
    if (isset($_POST['delete-user-button'])) {
        echo '<form action="<?php echo $_SESSION["currentPage"]; ?>" method="POST">
        <label>Enter the user ID number of the user you would like to delete:</label>
        <input type="text" placeholder="User ID #" name="userID" required />
        <div style="position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal">
            <a type="text" name="enter-button" style="font-weight: bold;" class="btn btn-primary" href="deleteUserPage.php">Enter</a>
            <a type="text" name="cancel-button" style="font-weight: bold;" class="btn btn-primary" href="userList.php">Cancel</a>
        </div>
    </form>';
        if (isset($_POST['enter-button'])) {
            $userID = $_POST['userID'];
            return $userID;
        }
    }
}*/
function editUser()
{
    if (!isset($_POST['edit'])) {
        if (file_exists($_SESSION['file'])) {
            $file = fopen($_SESSION['file'], 'r+') or die("Unable to open 'userInfo.txt'.");
            $lineCount = 0;
            $userID = $_SESSION['chosenUserID'];
            while (!feof($file)) {   //reading file line by line
                if ($lineCount == $userID) {
                    $line = fgets($file);
                    $lineArr = explode("\t", $line);
                    $username = $lineArr[0];
                    $lastName = $lineArr[1];
                    $firstName = $lineArr[2];
                    $email = $lineArr[3];
                    $tel1 = $lineArr[4];
                    $tel2 = $lineArr[5];
                    $address = $lineArr[6];

                }
                $lineCount++;
            }
        ?>
            <div class="form-popup" id="editUserForm">
                <form action="<?php echo $_SESSION['currentPage']; ?>" class="form-container" method="POST">
                    <h3>Editing User</h3>
                    <label for="username"><b>Username</b></label>
                    <input required type="text" placeholder="Enter username" id="usernameForm" name="username" value="<?php echo $username; ?>" />

                    <label for="lastName"><b>Last name</b></label>
                    <input required type="text" placeholder="Enter last name" id="lastNameForm" name="lastName" value="<?php echo $lastName; ?>" />

                    <label for="firstName"><b>First name</b></label>
                    <input required type="text" placeholder="Enter first name" id="firstNameForm" name="firstName" value="<?php echo $firstName; ?>" />

                    <label for="email"><b>Email</b></label>
                    <input required type="text" placeholder="Enter email" id="emailForm" name="email" value="<?php echo $email; ?>" />

                    <label for="tel1"><b>Tel.1</b></label>
                    <input required type="text" placeholder="Enter phone number" id="tel1Form" name="tel1" value="<?php echo $tel1; ?>" />

                    <label for="tel2"><b>Tel.2</b></label>
                    <input required type="text" placeholder="Enter phone number" id="tel2Form" name="tel2" value="<?php echo $tel2; ?>" />

                    <label for="address"><b>Address</b></label>
                    <input required type="text" placeholder="Enter address" id="addressForm" name="address" value="<?php echo $address; ?>" />
                    <br>
                    <button type="submit" class="btn btn-primary" name="edit">Save Changes</button>
                </form>
            </div>
<?php
        } else {
            echo "Error occured.<br>Unable to open 'userInfo.txt'.";
        }
    }
    if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $tel1 = $_POST['tel1'];
        $tel2 = $_POST['tel2'];
        $address = $_POST['address'];
        editUserInfoFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address);
        header('Location: userList.php');
    }
}

/*function editUser($userID)
{
    if (!isset($_POST['edit'])) {
        if (file_exists($_SESSION['file'])) {
            $file = fopen($_SESSION['file'], 'r+') or die("Unable to open 'userInfo.txt'.");
            $lineCount = 0;
            while (!feof($file)) {   //reading file line by line
                if ($lineCount == $userID) {
                    $line = fgets($file);
                    $lineArr = explode("\t", $line);
                    $username = $lineArr[0];
                    $lastName = $lineArr[1];
                    $firstName = $lineArr[2];
                    $email = $lineArr[3];
                    $tel1 = $lineArr[4];
                    $tel2 = $lineArr[5];
                    $address = $lineArr[6];
                }
                $lineCount++;
            }
        ?>
            <div class="form-popup" id="editUserForm">
                <form action="<?php echo $_SESSION['currentPage']; ?>" class="form-container" method="POST">
                    <h3>Editing User</h3>
                    <label for="username"><b>Username</b></label>
                    <input required type="text" placeholder="Enter username" id="usernameForm" name="username" value="<?php echo $username; ?>" />

                    <label for="lastName"><b>Last name</b></label>
                    <input required type="text" placeholder="Enter last name" id="lastNameForm" name="lastName" value="<?php echo $lastName; ?>" />

                    <label for="firstName"><b>First name</b></label>
                    <input required type="text" placeholder="Enter first name" id="firstNameForm" name="firstName" value="<?php echo $firstName; ?>" />

                    <label for="email"><b>Email</b></label>
                    <input required type="text" placeholder="Enter email" id="emailForm" name="email" value="<?php echo $email; ?>" />

                    <label for="tel1"><b>Tel.1</b></label>
                    <input required type="text" placeholder="Enter phone number" id="tel1Form" name="tel1" value="<?php echo $tel1; ?>" />

                    <label for="tel2"><b>Tel.2</b></label>
                    <input required type="text" placeholder="Enter phone number" id="tel2Form" name="tel2" value="<?php echo $tel2; ?>" />

                    <label for="address"><b>Address</b></label>
                    <input required type="text" placeholder="Enter address" id="addressForm" name="address" value="<?php echo $address; ?>" />
                    <br>
                    <button type="submit" class="btn btn-primary" name="edit">Save Changes</button>
                </form>
            </div>
<?php
        } else {
            echo "Error occured.<br>Unable to open 'userInfo.txt'.";
        }
    }
    if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $tel1 = $_POST['tel1'];
        $tel2 = $_POST['tel2'];
        $address = $_POST['address'];
        editUserInfoFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address);
        header('Location: userList.php');
    }
}*/

//adds row to the table being generated
function newRow($count, $username, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    $userID = $count;
    if ($count % 2 == 0) {
        return "<tr>
        <td class=\"tg-even\">" . $userID . "</td>
        <td class=\"tg-even\">" . $username . "</td>
        <td class=\"tg-even\">" . $lastName . "</td>
        <td class=\"tg-even\">" . $firstName . "</td>
        <td class=\"tg-even\"><a href=" . $tel1 . ">" . $tel1 . "</a></td>
        <td class=\"tg-even\"><a href=" . $tel2 . ">" . $tel2 . "</a></td>
        <td class=\"tg-even\"><a href=\"mailto:" . $email . "?subject=Changes to User Profile\">" . $email . "</a></td>
        <td class=\"tg-even\">" . $address . "</td>
    </tr>";
    } else {
        return "<tr>
            <td class=\"tg-odd\">" . $userID . "</td>
            <td class=\"tg-odd\">" . $username . "</td>
            <td class=\"tg-odd\">" . $lastName . "</td>
            <td class=\"tg-odd\">" . $firstName . "</td>
            <td class=\"tg-odd\"><a href=" . $tel1 . ">" . $tel1 . "</a></td>
            <td class=\"tg-odd\"><a href=" . $tel2 . ">" . $tel2 . "</a></td>
            <td class=\"tg-odd\"><a href=\"mailto:" . $email . "?subject=Changes to User Profile\">" . $email . "</a></td>
            <td class=\"tg-odd\">" . $address . "</td>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tg-even" colspan="8">No users have been registered yet aside from the admin role</td>
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
    </thead>
    <tbody>";
    $count = 0;
    while (!feof($file)) {   //reading file line by line
        $count++;
        $line = fgets($file);
        $lineArr = explode("\t", $line);
        $result .= newRow($count, $lineArr[0], $lineArr[1], $lineArr[2], $lineArr[3], $lineArr[4], $lineArr[5], $lineArr[6]);    //adding new table rows
    }
    $result .= "</tbody></table>
    <div style=\"position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal\">
            <a type=\"text\" name=\"add-user-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"addUserPage.php\">Add New User</a>
            <a type=\"text\" name=\"edit-user-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"editUsersListed.php\">Edit User</a>
            <a type=\"text\" name=\"delete-user-button\" style=\"font-weight: bold;\" class=\"btn btn-primary\" href=\"deleteUsersListed.php\">Delete User</a>
        </div>";
    fclose($file);
    echo $result;
}

function ProcessUserList()
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
    </thead>
    <tbody>";
    $count = 0;
    while (!feof($file)) {   //reading file line by line
        $count++;
        $line = fgets($file);
        $lineArr = explode("\t", $line);
        $result .= newRow($count, $lineArr[0], $lineArr[1], $lineArr[2], $lineArr[3], $lineArr[4], $lineArr[5], $lineArr[6]);    //adding new table rows
    }
    $result .= "</tbody></table>";
    fclose($file);
    echo $result;
}

function addUserInfoToFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    if (fileIsEmpty($_SESSION['file'])) {
        $userInfo = $username . "\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    } else {
        $userInfo =  "\n" . $username . "\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    }
    if (file_exists($_SESSION['file'])) {
        $file = fopen($_SESSION['file'], 'a') or die("Unable to open 'userInfo.txt'.");
        fwrite($file, $userInfo);
        fclose($file);
    } else {
        echo "Unable to open 'userInfo.txt'.";
    }
}

function editUserInfoFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    $userInfo =  $username . "\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    if (file_exists($_SESSION['file'])) {
        $file = fopen($_SESSION['file'], 'r+') or die("Unable to open 'userInfo.txt'.");
        $countLines = 0;
        while (!feof($file)) {   //reading file line by line
            $line = fgets($file);
            $lineArr = explode("\t", $line);
            if (strcmp($lineArr[0], $username) == 0) {
                if ($countLines == 0) {
                    $editedLine = $userInfo;
                } else {
                    $editedLine = "\n" . $userInfo;
                }
            }
            $countLines++;
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

function deleteUserFromFile($userID)
{
    if (file_exists($_SESSION['file'])) {
        $file = fopen($_SESSION['file'], 'r+') or die("Unable to open 'userInfo.txt'.");
        if (is_readable($file) && is_writeable($file)) {
            $lineCount = 0;
            // echo $lineCount;
            while (!feof($file)) {   //reading file line by line
                if ($lineCount == $userID) {
                    $line = fgets($file);
                    $skippedLine = $line;
                    // echo $skippedLine;
                }
                $lineCount++;
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