<?php
session_start();
echo"okayylessgo";
if(isset($_POST['bookId']))
{
    $_SESSION['bookId'] = $_POST['bookId'];
}
?>