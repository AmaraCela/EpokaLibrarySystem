<?php
$title = "Ordered";
$individualStyle = "../assets/css/orderedStyle.css";
require_once "./navbar.php";
?>

<div class="container">

<?php
$query = "SELECT b.BookId,b.Title,b.Author,b.Genre,b.Image,b.Description,o.DateOrdered
FROM books b, ordered o
WHERE o.BookId = b.BookId and o.id IN(
    SELECT id FROM student WHERE email = '{$_SESSION['email']}'
)";
$titles = $db->query($query);
if (mysqli_num_rows($titles)==0)
{
    echo"<p class='no-orders'> You have not ordered any books yet.<br>
    Go back to main page to order.</p>";
}
while ($row = $titles->fetch_assoc())
{
    echo"
    <div class='col-sm-4 mb-3 mb-sm-0'>
    <div class='card' style='width: 18rem;'>
    <img src='data:image/png;base64," . base64_encode($row['Image']) . "' class='card-img-top' alt='photo'>
    <div class='card-body'>
    <h6 class='card-title'>".$row["Title"]."</h6>
    <p class='card-text'>Author:".$row["Author"]."<br>
    Genre:".$row["Genre"]."<br>
    <p class='date-paragraph'>You ordered this book on: ".$row["DateOrdered"]."</p><hr>
    <ul class='buttons-ul'>
    <li class='buttons-li'>
    <a href='#' class='btn btn-primary' '>More</a>
    </li>
    <li class='buttons-li'>
    <button id ='".$row['BookId']."' class ='btn btn-primary order-button'>Unorder</button>
    </li>
    <li class='buttons-li'>
    <button class ='btn btn-primary'><img src='../assets/images/favorite.png' style='width:25px'></button>
    </li>
    </ul>
    </div>
    </div>
    </div>
    ";
}
?>
<script src="../Controller/deleteOrders.js"></script>

</div>