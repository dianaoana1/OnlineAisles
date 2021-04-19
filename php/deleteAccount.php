<?php
session_start();

function deleteAccount($username)
{?>
    <script>
    if (confirm("Account will be permanently deleted. Are you sure you want to delete your account?")){
        alert("Account successfully deleted.");
        <?php
            $file = fopen("..\TextFiles\userInfo.txt", 'r') or die("Unable to open 'userInfo.txt'.");
            $tempFile = fopen("..\TextFiles\\tempUserInfo.txt", 'w') or die("Unable to open 'tempUserInfo.txt'.");
            $lineCount = 1;
            //copying userInfo.txt to tempUserInfo.txt
            while (!feof($file)) {
                $line = fgets($file);
                $lineArr = explode("\t", $line);
            if (strcmp($username,$lineArr[0])!==0) {
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
            fclose($tempFile);?>
            window.location.replace("Main Page.php");
    }
    else{
        alert("Account deletion cancelled. Returning to main page.");
        window.location.replace("Main Page.php");
    }
    </script>
    <?php
}
deleteAccount($_SESSION['userLoggedIn']);

?>