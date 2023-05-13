<?php
session_start();
require "./connection.php";

if(isset($_POST['genre']))
{
    $_SESSION['genre'] = $_POST['genre'];

}
echo  $_SESSION['genre'];
?>