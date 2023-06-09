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
          echo"<input type = 'radio' class='radio-item' name='category-radio' id='".$row['Genre']."' value='".$row['Genre']."'> <label class='side-label' for='".$row["Genre"]."'>".$row['Genre']."</label>" ;
            
        }
        ?>
        <!-- <button id='choose'>Choose</button> -->

        </form>
        <script>
          document.getElementById("form").addEventListener('change',function()
          {
            let radios = Array.from(document.getElementsByClassName('radio-item'));
            
            let genres = new Array();
            
            for(let i=0;i<radios.length;i++)
            {
              if(radios[i].checked)
              {
                var genre =radios[i].id;
                $.ajax({
                                        type : "POST",
                                        url:"../Model/set_genre_id.php",
                                        data:{genre:genre},
                                        success:function(response)
                                        {
                                            console.log(response);
                                            window.location = '../Views/categories.php';
                                        }
                                        
                                    });
              }
            }
          });
        </script>
    </div>
        <div class="row">
        <?php
         $sql = "SELECT * FROM `books` 
         WHERE `Genre` =  '{$_SESSION['genre']}'";
         $titles = $db->query($sql);
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
            <button class='btn btn-primary'>More</button>
            </li>
            <li class='buttons-li'>
            <button title='Order book' id ='".$row['BookId']."' class ='btn btn-primary order-button'>Order</button>
            </li>
            <li class='buttons-li'>
            <button class ='btn btn-primary favorite-button'><img src='../assets/images/favorite.png' style='width:25px'></button>
            </li>
            </ul>
            </div>
            </div>
            </div>
            ";
         }
         $db->close();
        ?>
        <script defer src="../Controller/orderScript.js"></script>
        </div>
</div>
 </body>
<?php
require_once "./footer.html";?>
</html>