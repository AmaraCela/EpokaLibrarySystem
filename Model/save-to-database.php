<?php
session_start();
// include "../Model/connection.php";
// $data = json_decode(file_get_contents("php://input"), true);
// foreach($data as $row){
//   $name = $row["Name"];
//   $surname = $row["Surname"];
//   $email = $row["Email"];
//   $phone_number = $row["PhoneNumber"];
//   $password = $row["Password"];
  function valid($name){
  include "../Model/connection.php";
  // $sql = "INSERT INTO `students` (`name`, `surname`, `email`, `phone_number`, `password`,``)
  //VALUES ('$name', '$surname', '$email', '$phone_number', '$password') WHERE $_SESSION[email]=email";
  $sql =  "UPDATE users SET Name='$name' WHERE id='{$_SESSION['id']}'";
  echo "yayy";
  $db->query($sql);
}
  ?>