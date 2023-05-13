<?php
session_start();
if(isset($_POST['bookId']))
{
    $_SESSION['bookId'] = $_POST['bookId'];
}
?>