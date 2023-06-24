<?php
include "../Model/connection.php";
?>
<?php
if (isset($_POST['signUp'])) {
  $emailPattern =  '/^[a-zA-Z]+[0-9]{2}@epoka\.edu\.al$/';
  $count = 0;
  $sql = "SELECT Email FROM student";
  $mysqlRes = mysqli_query($db, $sql);
  //adding code
  while($row = mysqli_fetch_assoc($mysqlRes)){
    if($row['Email']==$_POST['email']){
      $count++;
    }
  }
  if ($count==0){
    if (preg_match($emailPattern, $_POST['email'])){
      mysqli_query($db,"INSERT INTO `student`(`id`,`Name`, `Surname`, `Email`, `PhoneNumber`, `Password`)
      VALUES ('','$_POST[name]','$_POST[surname]','$_POST[email]','$_POST[phone]','$_POST[password]')");
      ?>
      <script>window.location='../Views/login.php'</script>
      <?php
    }
    else{
      ?>
      <i class="fa-solid fa-circle-info" id="warningIcon"></i>
      <label style = "color: red;" id="warningText">Please enter your epoka email</label>
      <?php
    }
  } else {
    ?>
    <i class="fa-solid fa-circle-info" id="warningIcon"></i>
    <label style = "color:red;" id="warningText">This email already exists!</label>
    <?php
  }
}
?>