<!-- <?php
include "../Model/connection.php";
?> -->
<?php
$title = "favorites";
$individualStyle = "../assets/css/favorite.css";
// $individualStyle = '../assets/css/StudentHomePageStyle.css';
require_once './navbar.php';
?>

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
          <button id ='".$row['BookId']."' class ='btn btn-primary unorder-button'>Unorder</button>
          </li>
          <li class='buttons-li'>
          <button id = '".$row['BookId']."' class ='btn btn-primary unfavorite-button'><img src='../assets/images/favorite.png' style='width:25px'></button>";
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