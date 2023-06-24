<?php
$title = "Profile";
include '../Model/connection.php';
require_once "./navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://kit.fontawesome.com/9cfc78147e.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Mukta&family=Open+Sans&family=Overpass&display=swap"
        rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/profile.css">
</head>
<body>
<div class="container d-flex justify-content-between align-items-center mb-3">

  <div class="left" id="content">
    <?php
    $sqli_var = mysqli_query($db, "SELECT * FROM `student` WHERE `Email`= '$_SESSION[email]'");
    $row = mysqli_fetch_assoc($sqli_var);
    ?>

    <form action="./profile.php" method="post" enctype="multipart/form-data" id="form_id" class="form_class">
      <input type="file" name="my_image" class="imgUp" id="file">
      <div class="prof">
        <label for="file" class="file-style" id="label">
          <?php
          if ($row['Pic'] != "") {
            echo "<img src='data:image/jpeg;base64," . base64_encode($row['Pic']) . "'
              class='img2 img-circle profile-img'>";
          } else {
            echo "<img class='img1' src='../assets/images/upload-to-cloud.png'>";
          }
          ?>
        </label>
        <input type="submit" name="submit" value="Upload" id="submit" class="imgUp">
      </div>
      <div class="hello">
        <?php $status = $statusMsg = '';
// echo "<h1>HEYYYYYYYYYYYYYYYYYYYYYYYYYYYYY</h1>";
if (isset($_POST["submit"])) {
    $status = 'error';
    if (!empty($_FILES["my_image"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["my_image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['my_image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Update image content in the database
            $update = mysqli_query($db, "UPDATE `student` SET `Pic` = '$imgContent' WHERE `Email` = '$_SESSION[email]'");

            if ($update) {
                $status = 'success';
                $statusMsg = "Profile photo updated successfully.";
                ?>
                <script>window.location="./profile.php"</script>
                <?php
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, and GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
}
echo $statusMsg;
?>
        <h5 style="margin-top: 5%"><?php echo $_SESSION['login_user_name'] . " " . $_SESSION['login_user_surname']; ?></h5>
        <h6 style="font-weight: 100"><?php echo $_SESSION['email']; ?></h6>
      </div>
    </form>
  </div>

  <div class="table">
    <h4 class="PSetting">Profile Settings</h4>
    <h6 class="welcome">Welcome, <?php echo $row['Name'] . " " . $row['Surname']; ?></h6>
    <button class="btn btn-black btn-default" name="Edit" id="Edit1" style="display:none">Edit</button>
    <div style="overflow-x:auto; margin-top: 7%;">
      <table class="table table-responsive" id="myTable">
        <?php
        echo "<table class='table table-bordered'>";
        echo "<tr class='PS'>";
        echo "<td colspan='4' class='ps'>";
        echo "<label style='text-align:center'>Personal Information</label>";
        echo "</td>";
        echo "</tr>";

        echo "<tr class='cel'>";
        echo "<td>";
        echo "First Name: ";
        echo "</td>";

        echo "<td class='data name' id='name'> $row[Name] ";
        echo "</td>";

        echo "</tr>";

        echo "<tr class='cel'>";
        echo "<td>";
        echo "Last Name: ";
        echo "</td>";

        echo "<td class='data'>";
        echo $row['Surname'];
        echo "</td>";
        echo "</tr>";

        echo "<tr class='cel'>";
        echo "<td>";
        echo "Email: ";
        echo "</td>";

        echo "<td class='data'>";
        echo $row['Email'];
        echo "</td>";
        echo "</tr>";

        echo "<tr class='cel'>";
        echo "<td>";
        echo "Phone Number: ";
        echo "</td>";

        echo "<td class='data'>";
        echo $row['PhoneNumber'];
        echo "</td>";
        echo "</tr>";

        echo "<tr class='cel'>";
        echo "<td>";
        echo "Password: ";
        echo "</td>";

        echo "<td class='data'>";
        echo $row['Password'];
        echo "</td>";

        echo "</tr>";
        echo "</table>";
        ?>
        <button class="btn btn-primary" id="edit">
          <a href="../Controller/updateData.php?did=<?php echo $row['id']; ?>" class="btn btn-primary" id="edit">
            Edit
          </a>
        </button>
      </table>
    </div>
  </div>
</div>


<script>

  function validate ()
  {
    var photo = document.getElementById("file").value;
    var req = new XMLHttpRequest();

    return false;
  }

  // $(document).ready(function () {
  //   // Intercept the form submission
  //   $('#form_id').submit(function (event) {
  //     event.preventDefault(); // Prevent default form submit

  //     // Create a FormData object
  //     var formData = new FormData(this);

  //     // Perform AJAX request
  //     $.ajax({
  //       url: '../Controller/upload.php', // Set your PHP file path or endpoint
  //       type: 'POST',
  //       data: formData,
  //       processData: false,
  //       contentType: false,
  //       success: function (response) {
  //         // Handle success response
  //         console.log("heyyyyyyyyyyyyyyyyyy");
  //         // Update the profile photo dynamically (assuming response contains updated photo data)
  //         $('.img2.profile-img').attr('src', response);
  //       },
  //       error: function (xhr, status, error) {
  //         // Handle error response
  //         console.log(xhr.responseText);
  //       }
  //     });
  //   });
  // });
</script>
<?php include 'footer.html' ?>
</body>
</html>
