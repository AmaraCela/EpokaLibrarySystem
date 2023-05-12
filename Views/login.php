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
  <link rel = "stylesheet" href = "../assets/css/login.css">
  <script src="https://kit.fontawesome.com/9cfc78147e.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
  crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Mukta&family=Open+Sans&family=Overpass&display=swap"
  rel="stylesheet">

  <title>Login Page</title>
</head>
<body>
  <section>
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col col-xl-10">
          <div class="card" style="border: 1px solid; padding: 10px; --bs-card-border-radius: none">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="../assets/images/loginImg.png"
                  alt="login form" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form name = "LoginPage" action = "" method = "post">
  
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0">EPOKA Library System</span>
                    </div>
  
                    <h5 class="mb-3 pb-3" >Sign into your account</h5>
                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example17" name = "email"
                      class="form-control form-control-lg" style="border-radius:0"/>
                      <label class="formReq form-label" for="form2Example17">Email address</label>
                    </div>
  
                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" name = "password"
                      class="form-control form-control-lg" style="border-radius:0" />
                      <label class="formReq form-label" for="form2Example27">Password</label>
                      <br>
                      <?php include '../Controller/validateDataLogin.php'?>
                    </div>
  
                    <div class="pt-1 mb-4">
                      <button class="btn btn-default btn-dark btn-lg btn-block"
                      name = "loginBtn" type="submit">Login</button>
                    </div>
  
                    <!--<a class="small text-muted" href="#!">Forgot password?</a>-->
                    <p class="formReq mb-5 pb-lg-2">Don't have an account? <a href= "signup.php"
                        style="color: #2062c5;; font-family: Mukta;">Register here</a></p>
                    <a href="#!" class="link small text-muted">Terms of use.</a>
                    <a href="#!" class="link small text-muted">Privacy policy</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</body>
</html>