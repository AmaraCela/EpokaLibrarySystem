<?php
session_start();
include "../Model/connection.php";
$date = date('Y-m-d');
$sql= "INSERT INTO `ordered`(`id`, `BookId`,`DateOrdered`) VALUES ({$_SESSION['user_id']},'{$_SESSION['bookId']}','$date')";
$db->query($sql)
?>