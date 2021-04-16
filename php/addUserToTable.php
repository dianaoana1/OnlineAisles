<?php
function newRow($count, $username, $lastName, $firstName, $email, $tel1, $tel2, $address){
    $userID = $count+1;
    if ($count%2==0){
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
    }
    else{
          return "<tr>
            <td class=\"tg-odd\">".$userID."</td>
            <td class=\"tg-odd\">".$username."</td>
            <td class=\"tg-odd\">".$lastName."</td>
            <td class=\"tg-odd\">".$firstName."</td>
            <td class=\"tg-odd\"><a href=".$tel1.">514-123-4567</a></td>
            <td class=\"tg-odd\"><a href=".$tel2.">514-891-0111</a></td>
            <td class=\"tg-odd\"><a href=\"mailto:".$email."?subject=Changes to User Profile\">".$email."</a></td>
            <td class=\"tg-odd\">".$address."</td>
            <td class=\"tg-odd\"><input type=\"checkbox\" class=\"users\" name=\"user\"></td>
        </tr>";
    }
      
}

function ProcessUsersToTable($file){
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
    while(!feof($file)) {   //reading file line by line
        $count++;
        $line = fgets($file);
        $lineArr = explode($line, "\t");
        $result .= newRow($count, $lineArr[0], $lineArr[1], $lineArr[2], $lineArr[3], $lineArr[4], $lineArr[5], $lineArr[6]);    //adding new table rows
    }   
    $result .= "</tbody></table>";
    
    return $result;
}


?>
