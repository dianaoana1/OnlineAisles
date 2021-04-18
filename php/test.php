<?php
function userIDInFile($userID){
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

function deleteUserFromFile($userID)
{
    $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempUserInfo.txt", 'w') or die("Unable to open 'tempUserInfo.txt'.");
    $lineCount = 1;
    echo "before deletion<br>";
    //copying userInfo.txt to tempUserInfo.txt
    while (!feof($file)) {
        $line = fgets($file);
        if ($lineCount!=$userID) {
            fwrite($tempFile, $line);
        }
        $lineCount++;
        echo $line."<br>";
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
        echo $line."<br>";
        fwrite($file, $line);
    }
    fclose($file);
    fclose($tempFile);
}

function editUserInfoFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address)
{
    $userInfo =  $username . "\t" . $lastName . "\t" . $firstName . "\t" . $email . "\t" . $tel1 . "\t" . $tel2 . "\t" . $address;
    $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
    $tempFile = fopen("..\TextFiles\\tempUserInfo.txt", 'w') or die("Unable to open 'tempUserInfo.txt'.");
    $lineCount = 1;
    //copying userInfo.txt to tempUserInfo.txt
    while (!feof($file)) {
        $line = fgets($file);
        $lineArr = explode("\t", $line);
        if (strcmp($lineArr[0], $username) == 0) {
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
editUserInfoFile("aspyridakos", "Spy","Alex", "514-321-4567","415-891-0111","abc@groceries.ca","321 Main Street, QC, A1B 2C3");

// deleteUserFromFile(2);
?>