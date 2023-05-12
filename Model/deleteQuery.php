<?php
session_start();
include "../Model/connection.php";
$sql = "DELETE FROM `ordered` WHERE `BookId`= '{$_SESSION['bookId']}'";
$db->query($sql)
?>