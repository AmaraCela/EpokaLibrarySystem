<?php include "../Model/Connection.php";
if(isset($_GET['did'])){
  $id = $_GET['did'];
  $sql = "SELECT * FROM `student` WHERE id=$id";
  $res = mysqli_query($db,$sql);
  if($res){
    $row=mysqli_fetch_assoc($res);
    $name = $row['Name'];
    $surname = $row['Surname'];
    $email = $row['Email'];
    $mobile = $row['PhoneNumber'];
    $password = $row['Password'];
  } 

  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE `student` SET `Name`='$name', `Surname`='$surname', `Email`='$email',`PhoneNumber`='$mobile',`Password`='$password'";
    $result = mysqli_query($db, $sql);
    if($result){
      header('location: ../Views/profile.php');
    }else{
      die(mysqli_error($db));
    }
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile</title>
  <link rel = "stylesheet" href="../assets/css/form.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <!-- <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter your name" autocomplete="off" value="<?= $name ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Surname</label>
        <input type="text" class="form-control" name="surname" placeholder="Enter your surname" autocomplete="off" value="<?= $surname ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="off" value="<?= $email ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Mobile</label>
        <input type="text" class="form-control" name="mobile" placeholder="Enter your mobile" autocomplete="off" value="<?= $mobile ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter your password" autocomplete="off" value="<?= $password ?>">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div> -->

  <div class="login-wrap">
  <form method="post">
    <div class="login-html">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Edit</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
      <div class="login-form">
        <div class="sign-in-htm">
          <div class="group">
          <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter your name" autocomplete="off" value="<?= $name ?>">
          </div>
          <div class="group">
          <label class="form-label">Surname</label>
        <input type="text" class="form-control" name="surname" placeholder="Enter your surname" autocomplete="off" value="<?= $surname ?>">
          </div>
          <div class="group">
          <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="off" value="<?= $email ?>">
          </div>
          <div class="group">
          <label class="form-label">Phone Number</label>
        <input type="text" class="form-control" name="mobile" placeholder="Enter your mobile" autocomplete="off" value="<?= $mobile ?>">
          </div>
          <div class="group">
          <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter your password" autocomplete="off" value="<?= $password ?>">
          </div>
          
          <button type="submit" id="btn" class="btn btn-primary" name="submit">Update</button>
         
        </div>
      </div>
    </div>
</form>
  </div>
</body>

</html>