<?php
session_start();
include "../Model/connection.php";
        $queryy = "SELECT * FROM `books` WHERE `BookId` = '{$_SESSION['bookId']}'";
        
        $book1 = $db->query($queryy);
        
        while ($row = $book1->fetch_assoc()) {
          $_SESSION['Title'] = $row['Title'];
          $_SESSION['Author'] = $row['Author'];
          $_SESSION['Genre'] = $row['Genre'];
          $_SESSION['Description'] = $row['Description'];
        }
$db->close();
?>