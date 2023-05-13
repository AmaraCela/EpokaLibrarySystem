<?php

include "../Model/connection.php";
?>
<?php 
    if (isset($_POST['loginBtn'])) {
      $count = 0;
      $mysqli = mysqli_query($db, "SELECT * FROM `student` WHERE `Email` = '$_POST[email]'
      AND `Password` = '$_POST[password]'");

      $row = mysqli_fetch_assoc($mysqli);

      $count = mysqli_num_rows($mysqli);
      if($count == 0){
        ?>
        <i class="fa-solid fa-circle-info"></i>
        <label class = "signUpReq">Email and password do not match.</label>
        <?php
      }else {
          $_SESSION['email'] = $_POST['email'];
          $_SESSION['id'] = $row['id'];
          $_SESSION['login_user_name'] = $row['Name'];
          $_SESSION['login_user_surname'] = $row['Surname'];
          $_SESSION['pic'] = $row['Pic'];
          
          //echo "<img src='data:image/png;base64,";
          //base64_encode($row['Pic']);
        ?>
        <script>
          window.location = "../Views/StudentHomePage.php";
          </script>
        <?php
      }
    }
  ?>