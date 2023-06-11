<?php
$title = "Home";
// $individualStyle = "../assets/css/StudentHomePageStyle.css";
require_once "./navbar.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="../assets/css/StudentHomePageStyle.css">
   
  </head>
  <body>
  <div class = "wrapper">
<div class ="container">
  <div class = "row" id = "row"> 
    <p class="error">
      No items match your search! <br>
      Search for another keyword or go back to all books.
    </p>
    <?php
      $query = "SELECT * FROM books";
      $books = $db->query($query);
      while($row=$books->fetch_assoc())
      {
        echo "<div class='col-sm-4 mb-3 mb-sm-0'>
        <div class='card'>
        <img src='data:image/png;base64," . base64_encode($row['Image']) . "' class='card-img-top' alt='photo'>
        <div class='card-body'>
        <h6 class='card-title'>".$row['Title']."</h6>
        <p class='card-text'><b>Author: </b>".$row['Author']."<br>
        <b>Genre: </b>".$row['Genre']."<br>
        </p>
        <ul class='buttons-ul'>
        <li class ='buttons-li'><button title='Press for more' id='".$row['BookId']."' class='btn btn-primary more-button'> More</a></li>
        <li class ='buttons-li'><button title='Order book' id='".$row['BookId']."' class='btn btn-primary order-button'> Order</a></li>
      <li class ='buttons-li'>
      <button title='Save book' class ='btn btn-primary favorite-button' ><img id='".$row['BookId']."' src='../assets/images/favorite.png' style='width:25px'></button></li>
        
        </ul>
        </div>
        </div>
        </div>
        ";  
      }

      $db->close();
?> 

<!-- <script src="../Controller/displayBooks.js"></script> -->


      <!-- //Adding functionality to the ordered button -->
    
<script defer src="../Controller/orderScript.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    order();
  });
</script>

<script defer src='../Controller/favoriteScript.js'></script>
<script defer src="../Controller/moreScript.js"></script>

  </div>
</div>
<div class="side-panel" id="a">
      <div class="side-header">
        <button id="cancel-Side" class="cancel-Side" onclick="cancelSide()">
          <img src="../Assets/Images/remove.png" id="remove-img" class="remove-img"alt="">
        </button>
      </div>
      <div class="side-body" id="side-body">
        <img class ="side-img"src="" id="side-img" class="side-img"alt="">
        <div class="side-text">
          <p id="side-p" class="side-p"></p>
        </div>
      </div>
</div>
<script>
    function cancelSide()
    {
      document.getElementsByClassName("side-panel")[0].style.display = "none";
    }
</script>
</div>
<?php
require_once "./footer.html"?>
</body>
</html>
