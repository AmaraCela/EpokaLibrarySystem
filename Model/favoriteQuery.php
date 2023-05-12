<?php
session_start();
include "../Model/connection.php";
$sql= "INSERT INTO `favorites` VALUES ({$_SESSION['id']},'{$_SESSION['bookId']}')";
$db->query($sql)
?>