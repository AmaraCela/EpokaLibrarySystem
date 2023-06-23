<?php include "../Model/pdoConnection.php";
$pdo = pdo_connect_db();

$stmt = $pdo->prepare('SELECT * FROM student WHERE id=:id');
$stmt->bindValue(':id', $_SESSION['id']);
$stmt->execute();

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo "$students[Name]";
?>