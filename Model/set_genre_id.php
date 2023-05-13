<?php
session_start();
require "./connection.php";

if(isset($_POST['genreId']))
{
    $_SESSION['genreId'] = $_POST['genreId'];

}

?>