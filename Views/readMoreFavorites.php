<?php
include '../Model/connection.php';
$title = "BookInfo";
require_once "./navbar.php";
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/9cfc78147e.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
  crossorigin="anonymous">
  <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
<link rel = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Mukta&family=Open+Sans&family=Overpass&display=swap"
  rel="stylesheet">
  <link rel = "stylesheet" href="../assets/css/readMoreFavorites.css">
  </head>
  <body>
    <div class="container">
    <div class="card" style="width: 18rem">
    <?php
    $sql = "SELECT * FROM `books` WHERE Title = '{$_GET['title']}'";
    $result= $db->query($sql);
    if(mysqli_num_rows($result) > 0){
        $row = $result->fetch_assoc();
        echo "<img class = 'image' src='data:image/jpeg;base64,".base64_encode($row['Image'])."'>";
    } else {
        echo "Image not available";
    }?>
  <div class="card-body">
    <h5 class="card-title"><?php echo $_GET['title']; ?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><b>Author: </b><?php echo $row['Author']?></li>
    <li class="list-group-item"><b>Stock: </b><?php echo $row['Stock']?></li>
    <li class="list-group-item"><b>Genre: </b><?php echo $row['Genre']?></li>
  </ul>
</div>

<div class="Title"><h1><?php echo $_GET['title'] ?></h1>
<p><?php echo nl2br($row['newsReview'])?></p>
<p><?php echo nl2br($row['moreRead'])?></p>
</div>
    </div>

    <?php require_once "./footer.html" ?>
  </body>
</html>