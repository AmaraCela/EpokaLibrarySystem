<?php 
session_start();
error_reporting(E_ALL);
$email = $_SESSION['email'];
var_dump($email);
$to = "amaracela@gmail.com"; // Replace with the recipient's email address
$subject = "New email from website";
$message = "Email: " . $email;
$headers = $headers = "From: " . $email;// Replace with the sender's email address

if (mail($to, $subject, $message, $headers)) {
  echo "Email sent successfully!";
} else {
  echo "An error occurred while sending the email.";
}
