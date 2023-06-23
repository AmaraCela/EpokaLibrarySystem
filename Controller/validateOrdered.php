<?php
include "../Model/connection.php";
session_start();
$query = "SELECT * FROM `ordered` WHERE `id`='{$_SESSION['id']}'";

$orders = $db->query($query);
$toBeDisabled = array();
while ($row = $orders->fetch_assoc())
{
    array_push($toBeDisabled, $row['BookId']);
    
}

$query = "SELECT * FROM books WHERE Stock = 0";
$orders = $db->query($query);
while ($row = $orders->fetch_assoc())
{
    array_push($toBeDisabled, $row['BookId']);
    
}
$jsonArray = json_encode($toBeDisabled);
echo $jsonArray;
?>