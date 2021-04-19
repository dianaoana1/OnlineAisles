<?PHP
session_start();


/*error_reporting(~0);
ini_set('display_errors', 1);*/
?>



<?PHP


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['UserName'];
    $password = $_POST['password'];

    if (strcmp($username, "admin") == 0 && strcmp($password, "admin") == 0) {
        $_SESSION['userLoggedIn'] = $username;
        echo "<script>alert('Welcome $username, you are  now logged in.');document.location='productList.php'</script>";
    } else {
        $file = fopen("..\TextFiles\userInfo.txt", "r") or die("FIle not found or can't be opened");
        $currLine = usernameExists($username, $file);

        if ($currLine == -1) {
            //error the email/username doesnt exists
            echo "<script>alert('The User or email does not exist.');document.location='Login.php'</script>";
        } else if (!isSamePassword($currLine, $password)) {
            // password is not the same`
            echo "<script>alert('Password and username do not match.');document.location='Login.php'</script>";
        } else {
            // password is the same 
            $_SESSION['userLoggedIn'] = $username;
            echo "<script>alert('Welcome $username, you are  now logged in.');document.location='Main Page.php'</script>";
        }
    }
}
function usernameExists($username, $file)
{
    $numLines = count(file("..\TextFiles\userInfo.txt"));
    $arr = array();
    $arr = getUserData($numLines, $file);
    for ($i = 0; $i < $numLines; $i++) {
        $lines = explode("\t", $arr[$i]);
        if ($lines[0] == $username || $lines[4] == $username) {
            return $lines;
        }
    }
    return -1;
}
function getUserData($numLines, $file)
{
    $arr = array();
    for ($i = 0; $i < $numLines; $i++) {
        $arr[$i] = fgets($file);
    }
    return $arr;
}
function isSamePassword($currLine, $password)
{
    return $currLine[1] == $password;
}
?>