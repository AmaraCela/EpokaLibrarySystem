<?php 
include "../Model/connection.php";
$title = "Categories";
// $individualStyle = "../assets/css/categories.css";
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
    require_once "./navbar.php"?>
    <link rel = "stylesheet" href="../assets/css/categories.css">
  </head>
  <body>
  
<div class="container">
    <div class="side-div">
        <p class="text">
        Not finding the right one?<br>Browse more categories:
        </p>
        <form action="" method="" class="side-form" id="form" onsubmit="return false">
        <?php
        $query = "SELECT DISTINCT `Genre` FROM `books`";
        $res = $db->query($query);
        
        while($row=$res->fetch_assoc())
        {
          echo"<input type = 'button' class='radio-item' name='category-radio' id='".$row['Genre']."' value='".$row['Genre']."'>" ;
            
        }
        ?>
        </form>
        <script>

        document.querySelectorAll("input[class='radio-item']").forEach(button=>{
          button.addEventListener("click",function(){
            var genre =button.id;
            window.location = '../Views/categories.php?genre='+genre;
          });
        });
       
        </script>
    </div>
        <div class="row">
        <?php
         $sql = "SELECT * FROM `books` 
         WHERE `Genre` =  '{$_GET['genre']}'";
         $titles = $db->query($sql);
         if(mysqli_num_rows($titles)==0)
         {
          echo"
          <p class='error-msg'>Sorry! No books can be momentarily found for the chosen category:".$_SESSION['genre']."</p>
          ";
         }

         while($row = $titles->fetch_assoc())
         {
            echo"
            <div class='col-sm-4 mb-3 mb-sm-0'>
            <div class='card' style='width: 18rem;'>
            <img src='data:image/png;base64," . base64_encode($row['Image']) . "' class='card-img-top' alt='photo'>
            <div class='card-body'>
            <h6 class='card-title'>".$row['Title']."</h6>
            <p class='card-text'>Author:".$row['Author']."<br>
            Genre:".$row['Genre']."<br>
            <ul class='buttons-ul'>
            <li class='buttons-li'>
            <button title='Order book' id ='".$row['BookId']."' class ='btn btn-primary order-button'>Order</button>
            </li>
            <li class='buttons-li'>
            <button title='Save book' class ='btn btn-primary favorite-button' ><img id='".$row['BookId']."' src='../assets/images/favorite.png' style='width:25px'></button></li>
            </ul>
            </div>
            </div>
            </div>
            ";
         }

         $db->close();
        ?>
        <script defer src="../Controller/orderScript.js">
        </script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    order();
  });
</script>
<script defer src='../Controller/favoriteScript.js'></script>
      </div>
</div>
 </body>
<?php
require_once "./footer.html";?>
</html>