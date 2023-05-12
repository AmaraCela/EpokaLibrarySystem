<?php include "../Model/connection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/9cfc78147e.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Mukta&family=Open+Sans&family=Overpass&display=swap"
        rel="stylesheet">
  <link rel = "stylesheet" href = "../assets/css/signup.css">
  <title>Sign up</title>
</head>
<body >
  <div class = "container py-5">
    <div class = "row d-flex justify-content-center align-items-center">
      <div class = "col-xs-5 col-md-7 col-lg-7 d-flex align-items-center">
        <div class = " card card-body  p-4 p-lg-7 text-black"
            style="border: 1px solid; padding: 10px; --bs-card-border-radius: none">
          <form name = "SignUp" action = "" method = "POST">
            <div class = "d-flex align-items-center mb-3 pb-1">
            <span class="h1 mb-0" ><img src = "../assets/images/epokaLogo.png" alt="Epoka Logo"
            class="logoImg">EPOKA Library System</span>
            </div>
            <h5 class="mb-3 pb-3">Sign into your account</h5>
            <div class = "form-outline mb-4">
              <input name = "name" class="form-control form-control-lg">
              <label class = "formLabel" name = "nameLabel">First Name</label>
            </div>
            <div class = "form-outline mb-4">
              <input name = "surname" class = "form-control form-control-lg">
              <label class = "formLabel" name = "surnameLabel">Last Name</label>
            </div>
            <div class = "form-outline mb-4">
              <input name = "email" class = "form-control form-control-lg">
              <label class = "formLabel" name = "emailLabel">Email</label>
              <br>
              <?php include '../Controller/validateDataSignup.php'?>
            </div>
            <div class = "form-outline mb-4">
              <select name = "country" id="country" class="selectBox" required>
                <option value="" selected disabled>Select one...</option>
              </select>
              <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
              <br>
              <label class = "formLabel" name = "contactLabel">Phone Number</label>
            </div>
            <div class = "form-outline mb-4">
              <input type = "password" name = "password" class = "form-control form-control-lg">
              <label class = "formLabel" name = "passLabel">Password</label>
            </div>
              <div class = "pt-1 mb-4">
                <button class = "btn btn-default btn-dark btn-lg btn-block"
                        type = "submit" name = "signUp">Sign Up</button>
              </div>
              <script src = "../Controller/ApINumbers.js"></script>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html