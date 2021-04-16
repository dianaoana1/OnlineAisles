<?php
   function addUserInfoToFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address){
        $userInfo =  $username."\t".$lastName."\t".$firstName."\t".$email."\t".$tel1."\t".$tel2."\t".$address;
        $fileName = "userInfo.txt";
        if (file_exists($fileName)){
             $file = fopen($fileName,'a') or die("Unable to open 'userInfo.txt'.");
             if (is_readable($file) && is_writeable($file)){
                fwrite($file,$userInfo);
                fclose($file);
             }
        }
        else{
            echo "Unable to open 'userInfo.txt'.";
        }
    }

    function deleteUserFromFile($username){
        $fileName = "userInfo.txt";
        if (file_exists($fileName)){
             $file = fopen($fileName,'r+') or die("Unable to open 'userInfo.txt'.");
             if (is_readable($file) && is_writeable($file)){
                while(!feof($file)) {   //reading file line by line
                    $line = fgets($file);
                    if (strstr($line,$username)){
                        $skippedLine = $line;
                    }
                }
                //deleting specific user info line from the file
                $contents = file_get_contents($file);
                $contents = str_replace($line,'', $contents);
                file_put_contents($file, $contents);
                fclose($file);
             }
        }
        else{
            echo "Unable to open 'userInfo.txt'.";
        }
    }

?>
