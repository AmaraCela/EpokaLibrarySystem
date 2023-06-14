<?php
include "../Model/connection.php";
session_start();
$query = "SELECT * FROM `favorites` WHERE `id` = '{$_SESSION['id']}'";
$favorites = $db->query($query);
$disabled = array();
while ($row = $favorites->fetch_assoc())
{
    array_push($disabled, $row['BookId']);

}

$jsonArray = json_encode($disabled);
echo $jsonArray;
?>