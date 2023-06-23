<?php
session_start();
include "../Model/connection.php";
$date = date('Y-m-d');
$sql= "INSERT INTO `ordered`(`id`, `BookId`,`DateOrdered`) VALUES ({$_SESSION['id']},'{$_SESSION['bookId']}','$date')";
$db->query($sql);
$sql = "UPDATE books SET Stock = (SELECT Stock FROM books WHERE BookId = {$_SESSION['bookId']}) - 1 WHERE BookId = {$_SESSION['bookId']};";
$db->query($sql);
?>