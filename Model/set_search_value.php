<?php
session_start();
include "../Model/connection.php";

if(isset($_POST['valuee']))
{
    $_SESSION['value'] = $_POST['valuee'];
}
echo $_SESSION['value'];
?>