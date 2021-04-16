<?php
   function addUserInfoToFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address){
        $userInfo =  $username."\t".$lastName."\t".$firstName."\t".$email."\t".$tel1."\t".$tel2."\t".$address;
        $filedir = "..\TextFiles\userInfo.txt";
        if (file_exists($filedir)){
             $file = fopen($filedir,'a') or die("Unable to open 'userInfo.txt'.");
             if (is_readable($file) && is_writeable($file)){
                fwrite($file,$userInfo);
                fclose($file);
             }
        }
        else{
            echo "Unable to open 'userInfo.txt'.";
        }
    }

    function editUserInfoFile($username, $lastName, $firstName, $email, $tel1, $tel2, $address){
        $userInfo =  $username."\t".$lastName."\t".$firstName."\t".$email."\t".$tel1."\t".$tel2."\t".$address;
        $filedir = "..\TextFiles\userInfo.txt";
        if (file_exists($filedir)){
             $file = fopen($filedir,'r+') or die("Unable to open 'userInfo.txt'.");
             if (is_readable($file) && is_writeable($file)){
                while(!feof($file)) {   //reading file line by line
                    $line = fgets($file);
                    $lineArr = explode($line,"\t");
                    if (strcmp($lineArr[0],$username) == 0){
                        $editedLine = $userInfo;
                    }
                }
                //deleting specific user info line from the file
                $contents = file_get_contents($file);
                $contents = str_replace($editedLine,'', $contents);
                file_put_contents($file, $contents);
                fclose($file);
             }
        }
        else{
            echo "Unable to open 'userInfo.txt'.";
        }
    }

    function deleteUserFromFile($username){
        $filedir = "..\TextFiles\userInfo.txt";
        if (file_exists($filedir)){
             $file = fopen($filedir,'r+') or die("Unable to open 'userInfo.txt'.");
             if (is_readable($file) && is_writeable($file)){
                while(!feof($file)) {   //reading file line by line
                    $line = fgets($file);
                    $lineArr = explode($line,"\t");
                    if (strcmp($lineArr[0],$username) == 0){
                        $skippedLine = $line;
                    }
                }
                //deleting specific user info line from the file
                $contents = file_get_contents($file);
                $contents = str_replace($skippedLine,'', $contents);
                file_put_contents($file, $contents);
                fclose($file);
             }
        }
        else{
            echo "Unable to open 'userInfo.txt'.";
        }
    }

?>
