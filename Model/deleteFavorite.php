<?php
session_start();
include "../Model/connection.php";
$sql = "DELETE FROM `favorites` WHERE `BookId`= '{$_SESSION['bookId']}'";
$db->query($sql)
?>