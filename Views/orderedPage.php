<?php
$title = "Ordered";
$individualStyle = "../assets/css/orderedStyle.css";
require_once "./navbar.php";
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset = "UTF-8">
  <meta http-equiv = "X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
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
<script>

    document.querySelectorAll('.order-button').forEach(button=>{
        button.addEventListener('click',function(event)
        {
            event.target.disabled = true;

            var request = new XMLHttpRequest();
            var bookId = event.target.id;

            $.ajax({
                type:'POST',
                url:'../Model/set_book_id.php',
                data:{bookId:bookId},
                success:function(response)
                {
                    request.open('POST','../Model/deleteQuery.php',true);
                    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    request.onreadystatechange = function()
                    {
                        if(this.readyState ===4 && this.status === 200)
                        {
                            window.location = './orderedPage.php';
                        }
                    }
                    request.send();
                        
                }
            });
            
        });
    });
    </script>

</div>
</div>
<!-- <?php
require_once "./footer.html";
?> -->
  </body>
</html>