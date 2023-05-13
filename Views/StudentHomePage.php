<?php
$title = "Home";
$individualStyle = "../assets/css/StudentHomePageStyle.css";
require_once "./navbar.php";

?>
<div class = "wrapper">
<div class ="container">
  <div class = "row">
    <?php
      $query = "SELECT * FROM books";
      $books = $db->query($query);
      while($row=$books->fetch_assoc())
      {
        echo "<div class='col-sm-4 mb-3 mb-sm-0'>
        <div class='card' style='width:18rem;'>
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
      <!-- //Adding functionality to the ordered button -->
    
<script src="../Controller/orderScript.js"></script>
<script src='../Controller/favoriteScript.js'></script>
<script>
document.querySelectorAll('.more-button').forEach(button => {
  button.addEventListener('click', function(event) {
    console.log(event.target.id);
    var bookId = event.target.id;
    var req = new XMLHttpRequest();
    $.ajax({
      type: 'POST',
      url: '../Model/set_book_id.php',
      data: {bookId: bookId},
      success: function(response) {
        
      
      req.open('GET','../Model/get_book_info.php',true);
      req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            req.onreadystatechange = function() {
            
              if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // Do something with the response if necessary
              <?php 
            echo"
            document.getElementById('side-p').innerText = '{$_SESSION['Title']}'+'{$_SESSION['Author']}'+'{$_SESSION['Description']}'";
            ?>

                document.getElementsByClassName('side-panel')[0].style.display = 'block';
                console.log(this.responseText);
              }
            };
            req.send();

      }
    });
   
  });
});
</script>

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
<?php require_once 'footer.html'?>