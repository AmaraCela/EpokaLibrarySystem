<?php
session_start();
include "../Model/connection.php";

if(isset($_GET['valuee']))
{
    $_SESSION['valuee'] = $_GET['valuee'];
}
var_dump($_SESSION['valuee']);
echo $_SESSION['valuee'];
?>