<?php
/*function userIDInFile(){
    
}*/

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

deleteUserFromFile(2);
?>