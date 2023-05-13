<?php
session_start();
include "../Model/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Browse Epoka Online Library system">
  <script src="https://kit.fontawesome.com/9cfc78147e.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
  crossorigin="anonymous">
  <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
<link rel = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Mukta&family=Open+Sans&family=Overpass&display=swap"
  rel="stylesheet">
    <link rel="icon" href="../assets/images/epokaLogo.png">
    <link rel="stylesheet" href = "../assets/css/navbarStyle.css" type="text/css">
    <?php echo"<link rel='stylesheet'href='".$individualStyle."'>";?>
    <title><?php echo $title?></title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
            <img class = "navbar-brand navbar-brand-img" src="../assets/images/logo.png" alt="epokaLogo" >
            <a class="navbar-brand" href="StudentHomePage.php"><b>EPOKA </b>LIBRARY SYSTEM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./StudentHomePage.php">Home</a>
                     </li>
                    
                    <!-- The categories dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu">
                            <?php
                            // The query is written
                            $query = "SELECT DISTINCT Genre FROM books";
                            // The query is executed
                            $genres = $db->query($query);

                            //The results of the execution of the query are fetched one row by one
                            while($row=$genres->fetch_assoc())
                            {
                                echo"<li><a class='dropdown-item' href='./categories.php' id='".$row['Genre']."'>".$row['Genre']."</a></li>";
                            }
                            ?>
                            <script>
                                let categories = document.querySelectorAll('.dropdown-item');

                                categories.forEach(category => {

                                    category.addEventListener('click',function()
                                    {
                                        var genreId = category.id;
                                        console.log(genreId);
                                        $.ajax({
                                            type:'POST',
                                            url:'../Model/set_genre_id.php',
                                            data:{genreId:genreId},
                                            success:function(response)
                                            {
                                                console.log(this.response);
                                            }
                                        });
                                    });
                                });
                            </script>
                        </ul>
                    </li>
                    <!-- My books dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">My Books</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./favorites.php">Favorites</a></li>
                            <li><a class="dropdown-item" href="./orderedPage.php">Ordered</a></li>
                            
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="./feedback.html" target="_blank">Feedback</a>
                    </li>
                <li>  
                <form class="d-flex" role="search" onsubmit="return false">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <script>
                    document.getElementsByTagName("form")[0].addEventListener('click',function()
                    {
                        var book = document.querySelector("input[type='search']").value;
                        console.log(book);
                    });
                    
                </script>

                </li>
                    <!-- Profile dropdown -->
                    <li class="nav-item dropdown">
                    <!-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a> -->
                    <?php 
            if($_SESSION['pic']!=""){
              echo "<img src='data:image/jpeg;base64,".base64_encode($_SESSION['pic'])."'class = 'img-circle profile-img' height=40 width=40>";
            }
            echo " ";
            if(isset($_SESSION['login_user_name'], $_SESSION['login_user_surname'])){
              echo $_SESSION['login_user_name']," ",$_SESSION['login_user_surname']; 
            }
            else{
              echo"";
              // echo"session is not set";
            }
            ?>
          </a>
                    <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./profile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="./login.php">Log Out</a></li>   
                        </ul> 
                    </li>
                </ul>
        </div>
        </div>
    </nav>
    <script>
        document.getElementsByClassName("navbar-toggler")[0].addEventListener('click',function()
        {
              
               console.log(document.getElementById("navbarSupportedContent").classList);
               console.log(document.getElementById("navbarSupportedContent").classList.contains("show"));

        });
        </script>
    </header>
</body>
</html>