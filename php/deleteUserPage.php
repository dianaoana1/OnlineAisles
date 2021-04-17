<?php
session_start();
deleteUserFromFile($_SESSION['chosenID']);
header('Location: userList.php');
?>