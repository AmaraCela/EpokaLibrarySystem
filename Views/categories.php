<?php 
include "../Model/connection.php";
$title = "Categories";
$individualStyle = "../assets/css/categories.css";
require_once "./navbar.php"
?>

<div class="container">
    <div class="side-div">
        <p class="text">
        Not finding the right one?<br>Browse more categories:
        </p>
        <form action="" method="" class="side-form">
        <?php
        $query = "SELECT DISTINCT `Genre` FROM `books`";
        $res = $db->query($query);
        
        
        while($row=$res->fetch_assoc())
        {
          echo"<input type = 'checkbox' class='checkbox-item' name='category-checkBox' id='".$row['Genre']."' value='".$row['Genre']."'> <label class='side-label' for='".$row["Genre"]."'>".$row['Genre']."</label>" ;
            
        }
        ?>
        <button id='choose'>Choose</button>

        </form>
    </div>
        <div class="row">
        <?php
         $sql = "SELECT * FROM `books` 
         WHERE `Genre` =  '{$_SESSION['genreId']}'";
         $titles = $db->query($sql);
         while($row = $titles->fetch_assoc())
         {
            echo"
            <div class='col-sm-4 mb-3 mb-sm-0'>
            <div class='card' style='width: 18rem;'>
            <img src='data:image/png;base64," . base64_encode($row['Image']) . "' class='card-img-top' alt='photo' style='width: 150px; height: 200px;'>
            <div class='card-body'>
            <h6 class='card-title'>".$row['Title']."</h6>
            <p class='card-text'>Author:".$row['Author']."<br>
            Genre:".$row['Genre']."<br>
            <ul class='buttons-ul'>
            <li class='buttons-li'>
            <button class='btn btn-primary'>More</button>
            </li>
            <li class='buttons-li'>
            <button id ='button.".$row['BookId']."' class ='btn btn-primary'>Order</button>
            </li>
            <li class='buttons-li'>
            <button class ='btn btn-primary'><img src='../assets/images/favorite.png' style='width:25px'></button>
            </li>
            </ul>
            </div>
            </div>
            ";
         }
         $db->close();
        ?>
        <script src="../Controller/orderScript.js"></script>
        </div>
</div>
