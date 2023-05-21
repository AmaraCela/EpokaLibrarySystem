<?php
include "../Model/connection.php";

$query = "SELECT `BookId`,`Author`,`Genre`,`Title`,`Image` FROM `books`";
$result = $db->query($query);

while ($row = $result->fetch_assoc())
{
    $book = array(
        'BookId' => $row['BookId'],
        'Author' => $row['Author'],
        'Genre' => $row['Genre'],
        'Title' => $row['Title'],
        'Image' => base64_encode($row['Image'])
    );
    $books[] = $book;
}
$jsonArray = json_encode($books);
echo $jsonArray;
?>