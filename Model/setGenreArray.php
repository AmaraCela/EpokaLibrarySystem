<?php
session_start();

if (isset($_POST['array'])) {
  $_SESSION['genreId'] = $_POST['array'];
 
}
?>