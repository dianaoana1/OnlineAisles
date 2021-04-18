<?php
// session_start();
function userIDInFile($userID)
{
    $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
    $lineCount = 1;
    while (!feof($file)) {
        $line = fgets($file);
        $lineCount++;
        echo $line . "<br>";
    }
    if ($userID <= $lineCount) {
        return true;
    } else {
        return false;
    }
    fclose($file);
}

function deleteUserFromFile($userID)
{
    $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempUserInfo.txt", 'w') or die("Unable to open 'tempUserInfo.txt'.");
    $lineCount = 1;
    echo "before deletion<br>";
    //copying userInfo.txt to tempUserInfo.txt
    while (!feof($file)) {
        $line = fgets($file);
        if ($lineCount != $userID) {
            fwrite($tempFile, $line);
        }
        $lineCount++;
        echo $line . "<br>";
    }
    echo "<br>after deletion<br>";
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
        echo $line . "<br>";
        fwrite($file, $line);
    }
    fclose($file);
    fclose($tempFile);
}
function editUserInfoFile($userID, $username, $password, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    $userInfo =  $username . "\t" . $password ."\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempUserInfo.txt", 'w') or die("Unable to open 'tempUserInfo.txt'.");
    $lineCount = 1;
    //copying userInfo.txt to tempUserInfo.txt
    while (!feof($file)) {
        $line = fgets($file);
        // $lineArr = explode("\t", $line);
        if ($lineCount==$userID) {
            fwrite($tempFile, $userInfo."\n");
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
        echo $userID.$username.$password.$lastName.$firstName.$email.$tel1.$tel2.$address;
        editUserInfoFile($userID, $username, $password, $lastName, $firstName, $email, $tel1, $tel2, $address);
        header('Location: userList.php');
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

echo getLastLine();
// editUser(2);
// editUserInfoFile(2, "aspy", "pass", "Spy","Alex", "abc@groceries.ca", "514-321-4567","415-891-0111","321 Main Street, QC, A1B 2C3");
// deleteUserFromFile(2);
?>