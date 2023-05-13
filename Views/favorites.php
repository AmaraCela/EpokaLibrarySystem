<!-- <?php
include "../Model/connection.php";
?> -->
<?php
$title = "favorites";
$individualStyle = "../assets/css/favorite.css";
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset = "UTF-8">
  <meta http-equiv = "X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/9cfc78147e.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
  crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Mukta&family=Open+Sans&family=Overpass&display=swap"
  rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
  <body>
    <?php require_once './navbar.php';?>  
  <div class = "container"> 
  <div class="row">
    <?php 
    // $cnt = 1;
    $sql = "SELECT b.Title, b.BookId, b.Author, b.Genre, b.Image, b.Description
    FROM books b, favorites f
    WHERE f.BookId=b.BookId AND f.id IN(
    SELECT id FROM student WHERE email = '{$_SESSION['email']}')";
    $titles = $db->query($sql);
    while($row = $titles->fetch_assoc()){
      echo "<div class='col-sm-4 mb-3 mb-sm-0'>
      <div class='card'  >

      <img src='data:image/png;base64," . base64_encode($row['Image']) . "'
      class='card-img-top' alt='photo' style='width: 150px; height: 200px;'>

      <div class='card-body'>
        <h6 class='card-title'>".$row["Title"]."</h6>
        <p class='card-text'>Author:".$row["Author"]."<br>
          Genre:".$row["Genre"]."<br>";
        ?>
        <div class = "card-content card-text">
        <?php
        echo"Description:".$row["Description"]."<br>";
        ?>
        </div>
        <?php
          echo"<ul class='buttons-ul'>
              <li class='buttons-li'>
          <a href='#' class='btn btn-primary' '>Read more</a>
          </li>
          <li class='buttons-li'>
          <button class ='btn btn-primary unorder-button'>Unorder</button>
          </li>
          <li class='buttons-li'>
          <button class ='btn btn-primary unfavorite-button'><img src='../assets/images/favorite.png' id='".$row['BookId']."' style='width:25px'></button>";
          // $_SESSION['cnt'] = $cnt;
          // $cnt++;
          echo"</li>
          </ul>
          </div>
      </div>
      </div>";
    }
    ?>
<script>
  document.querySelectorAll('.unfavorite-button').forEach(button=>{
    button.addEventListener('click',function(event){
      event.target.disabled = true;

      var request = new XMLHttpRequest();
      var bookId = event.target.id;

      $.ajax({
        type:'POST',
        url:'../Model/set_book_id.php',
        data:{bookId:bookId},
        success:function(response){
          request.open('POST','../Model/deleteFavorite.php',true);
          request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
          request.onreadyStateChange = function(){
            if(this.readyState === 4 && this.status === 200){
              window.location = './favorites.php';
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
<!-- <?php include "footer.html"?> -->
  </body>
</html>
