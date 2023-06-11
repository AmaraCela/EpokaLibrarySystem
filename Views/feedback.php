<?php
if(!isset($_SESSION['email']))
{
  header("Location:./login.php");
  exit();
}?>
<!DOCTYPE html>
<html>
    <head>
        <title>Feedback</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../assets/css/feedbackStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Mukta&family=Open+Sans&family=Overpass&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/9cfc78147e.js" crossorigin="anonymous"></script>
        <script defer src="../Controller/feedback.js"></script>
    </head>

    <body>
        <div class = "container py-5">
            <div class = "row d-flex justify-content-center align-items-center">
              <div class = "col-xs-5 col-md-7 col-lg-7 d-flex align-items-center">
                <div class = " card card-body  p-4 p-lg-7 text-black">
                <form name="feedback" action="" method="post" onsubmit="return false">
                    <div class = "d-flex align-items-center mb-3 pb-1">
                        <img src="../assets/images/epokaLogo.png" alt="epoka Logo" style="max-height: 50px;max-width: 50px;">
                        <span class="h1 mb-0" >EPOKA Library System</span>
                    </div>   

                    <h5 class="mb-3 pb-3">Write your feedback.</h5>
                    <div class = "form-outline mb-4">
                    <label class = "formLabel" name = "feedbackLabel">Message: </label>
                    <!-- <input name = "name" class="form-control form-control-lg"> -->  
                    <textarea class = "message" id="message" name="message" rows="8" style="margin-top:20px; margin-right: 10px;"></textarea>
                    </div>
                    <div class = "pt-1 mb-4">
                        <button class = "btn btn-default btn-dark btn-lg btn-block" type = "submit" name = "submit" id="submit">Submit</button>
                    </div>
                </form>
                </div>

            </div>
        </div>
        </div>
    </body>
</html>