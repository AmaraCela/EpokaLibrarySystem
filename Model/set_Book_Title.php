<?php 
require "./connection.php";
session_start();
  if(isset($_POST['Title'])){
      $_SESSION['Title'] = $_POST['Title'];
      // $_SESSION['Image'] = $_POST['Image'];
  }
  echo $_SESSION['Title'];
  echo "<script>console.log('ktu ktu');</script>";
?>