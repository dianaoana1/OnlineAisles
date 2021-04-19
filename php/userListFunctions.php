<?php
if(!isset($_SESSION)) {
    session_start();
}
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

function editUser($userID)
{
    $thisPage = htmlspecialchars($_SERVER["PHP_SELF"]);
    if (!isset($_POST['edit'])) {
        $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
        $lineCount = 1;
        while (!feof($file)) {   //reading file line by line
            $line = fgets($file);
            if ($lineCount == $userID) {
                $lineArr = explode("\t", $line);
                $username = $lineArr[0];
                $password = $lineArr[1];
                $lastName = $lineArr[2];
                $firstName = $lineArr[3];
                $email = $lineArr[4];
                $tel1 = $lineArr[5];
                $tel2 = $lineArr[6];
                $address = $lineArr[7];
            }
            $lineCount++;
        }
?>
        <div class="form-popup" id="editUserForm">
            <form action="<?php echo $thisPage; ?>" class="form-container" method="POST">
                <h3>Editing User</h3>
                <label for="username"><b>Username</b></label>
                <input required type="text" pattern="[a-zA-Z0-9]{1,20}" placeholder="Enter username" id="usernameForm" name="username" value="<?php echo $username; ?>" />

                <label for="password"><b>Password</b></label>
                <input required type="text" placeholder="Enter password" id="passwordForm" name="password" value="<?php echo $password; ?>" />  

                <label for="lastName"><b>Last name</b></label>
                <input required type="text" pattern="[a-zA-Z]{1,20}" placeholder="Enter last name" id="lastNameForm" name="lastName" value="<?php echo $lastName; ?>" />

                <label for="firstName"><b>First name</b></label>
                <input required type="text" pattern="[a-zA-Z]{1,20}" placeholder="Enter first name" id="firstNameForm" name="firstName" value="<?php echo $firstName; ?>" />

                <label for="email"><b>Email</b></label>
                <input required type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter email" id="emailForm" name="email" value="<?php echo $email; ?>" />

                <label for="tel1"><b>Tel.1</b></label>
                <input required type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter phone number" id="tel1Form" name="tel1" value="<?php echo $tel1; ?>" />

                <label for="tel2"><b>Tel.2</b></label>
                <input required type="text" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Enter phone number" id="tel2Form" name="tel2" value="<?php echo $tel2; ?>" />

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
    if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $tel1 = $_POST['tel1'];
        $tel2 = $_POST['tel2'];
        $address = $_POST['address'];
        editUserInfoFile($userID, $username, $password, $lastName, $firstName, $email, $tel1, $tel2, $address);
        header('Location: userList.php');
    }
}


//adds row to the table being generated
function newRow($count, $username, $password, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    $userID = $count;
    if ($count % 2 == 0) {
        return "<tr>
        <td class=\"tg-even\">" . $userID . "</td>
        <td class=\"tg-even\">" . $username . "</td>
        <td class=\"tg-even\">" . $password . "</td>
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
            <td class=\"tg-odd\">" . $password . "</td>
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
                        <th class="tg-header">Password</th>
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
                        <td class="tg-even" colspan="9">No users have been registered yet aside from the admin role</td>
                    </tr>
                </tbody>
                </table></div><div style="position:center; text-align:center; margin:15px;font-family:Arial, sans-serif;font-size:20px;font-weight:normal">
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
    <th class=\"tg-header\">Password</th>
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
        $result .= newRow($count, $lineArr[0], $lineArr[1], $lineArr[2], $lineArr[3], $lineArr[4], $lineArr[5], $lineArr[6], $lineArr[7]);    //adding new table rows
    }
    $result .= "</tbody></table></div>
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
    <th class=\"tg-header\">Password</th>
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
        $result .= newRow($count, $lineArr[0], $lineArr[1], $lineArr[2], $lineArr[3], $lineArr[4], $lineArr[5], $lineArr[6], $lineArr[7]);    //adding new table rows
    }
    $result .= "</tbody></table>";
    fclose($file);
    echo $result;
}

function addUserInfoToFile($username, $password, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    if (fileIsEmpty($_SESSION['file'])) {
        $userInfo = $username ."\t" . $password . "\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    } else {
        $userInfo =  "\n" . $username . "\t" . $password ."\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    }
    if (file_exists($_SESSION['file'])) {
        $file = fopen($_SESSION['file'], 'a') or die("Unable to open 'userInfo.txt'.");
        fwrite($file, $userInfo);
        fclose($file);
    } else {
        echo "Unable to open 'userInfo.txt'.";
    }
}

function getLastLine(){
    $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
    $lineCount = 0;
    while (!feof($file)) {
        fgets($file);
        $lineCount++;
    }
    return $lineCount;
    fclose($file);
}

function editUserInfoFile($userID, $username, $password, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    $userInfo =  $username . "\t" . $password ."\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempUserInfo.txt", 'w') or die("Unable to open 'tempUserInfo.txt'.");
    $lineCount = 1;
    //copying userInfo.txt to tempUserInfo.txt
    $lastLine = getLastLine();
    echo $lastLine;
    while (!feof($file)) {
        $line = fgets($file);
        if ($lineCount==$userID) {
            if ($lineCount == $lastLine){
                echo $lastLine;
                fwrite($tempFile, $userInfo);
            }
            else{
                fwrite($tempFile, $userInfo."\n");
            }
        }
        else{
            fwrite($tempFile, $line);
        }
        $lineCount++;
    }
    fclose($tempFile);
    fclose($file);
    //clearing userInfo.txt
    $file = fopen("..\TextFiles\userInfo.txt", 'w') or die("Unable to open 'userInfo.txt'.");
    fclose($file);
    $file = fopen("..\TextFiles\userInfo.txt", 'a') or die("Unable to open 'userInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempUserInfo.txt", 'r') or die("Unable to open 'tempUserInfo.txt'.");
    //putting back all user info into userInfo.txt
    while (!feof($tempFile)) {
        $line = fgets($tempFile);
        fwrite($file, $line);
    }
    fclose($file);
    fclose($tempFile);
}

function deleteUserFromFile($userID)
{
    $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempUserInfo.txt", 'w') or die("Unable to open 'tempUserInfo.txt'.");
    $lineCount = 1;
    //copying userInfo.txt to tempUserInfo.txt
    while (!feof($file)) {
        $line = fgets($file);
        if ($lineCount!=$userID) {
            fwrite($tempFile, $line);
        }
        $lineCount++;
    }
    fclose($tempFile);
    fclose($file);
    //clearing userInfo.txt
    $file = fopen("..\TextFiles\userInfo.txt", 'w') or die("Unable to open 'userInfo.txt'.");
    fclose($file);
    $file = fopen("..\TextFiles\userInfo.txt", 'a') or die("Unable to open 'userInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempUserInfo.txt", 'r') or die("Unable to open 'tempUserInfo.txt'.");
    //putting back all user info into userInfo.txt except the deleted user
    while (!feof($tempFile)) {
        $line = fgets($tempFile);
        fwrite($file, $line);
    }
    fclose($file);
    fclose($tempFile);
}

/*function userIDInFile($userID){
    $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
    $lineCount = 1;
    while (!feof($file)) {
        $line = fgets($file);
        $lineCount++;
        echo $line."<br>";
    }
    if ($userID<=$lineCount){
        return true;
    }
    else{
        return false;
    }
    fclose($file);
}
?>*/