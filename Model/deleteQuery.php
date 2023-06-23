<?php
session_start();
include "../Model/connection.php";
$sql = "DELETE FROM `ordered` WHERE `BookId`= '{$_SESSION['bookId']}'";
$db->query($sql);
$sql = "UPDATE books SET Stock = (SELECT Stock FROM books WHERE BookId={$_SESSION['bookId']})+1 WHERE BookId={$_SESSION['bookId']}";
$db->query($sql);
?>