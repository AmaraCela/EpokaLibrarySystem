<?php
$title = "Profile";
$individualStyle = '../assets/css/profile.css';
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
  <!-- <link rel = "stylesheet" href="../assets/css/profile.css"> -->
  </head>
  <body>
  <div class = "container d-flex justify-content-between align-items-center mb-3">
    
    <div class = "left" id = "content">
    <?php
        $sqli_var = mysqli_query($db, "SELECT * FROM `student` WHERE `Email`= '$_SESSION[email]'");
        $row = mysqli_fetch_assoc($sqli_var);
        ?>
      
        <form action = "" method = "post" enctype = "multipart/form-data" id="form_id" class="form_class">
          <input type = "file" name = "my_image" class="imgUp" id = file>
          <div class="prof">
          <label for="file" class="file-style" id="label">
            <?php
            if ($row['Pic']!=""){
              echo "<img src='data:image/jpeg;base64,".base64_encode($row['Pic'])."'
              class = 'img2 img-circle profile-img''>";
            } else {
              echo"<img class = 'img1' src = '../assets/images/upload-to-cloud.png'>";
            }
            ?>
          </label>
          <input type = "submit" name = "submit" value = "upload" id = "submit" class="imgUp">
          </div>
          <!-- <div class="prof2">
          <?php
            echo "<img src='data:image/jpeg;base64,".base64_encode($row['Pic'])."'
            class = 'img2 img-circle profile-img''>";
            ?>
          </div>-->
          <div class="hello">
            <?php
            echo "<h5 style = 'margin-top:5%'>$_SESSION[login_user_name] $_SESSION[login_user_surname]</h5>";
            echo "<h6 style = 'font-weight: 100'>$_SESSION[email]</h6>";
            ?>
          </div>
        </form>
        <?php
            $status = $statusMsg = '';
            if (isset($_POST["submit"])) {
                $status = 'error';
                if (!empty($_FILES["my_image"]["name"])) {
                    // Get file info
                    $fileName = basename($_FILES["my_image"]["name"]);
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                    
                    // Allow certain file formats
                    $allowTypes = array('jpg','png','jpeg','gif');
                    if (in_array($fileType, $allowTypes)) {
                        $image = $_FILES['my_image']['tmp_name'];
                        $imgContent = addslashes(file_get_contents($image));
                    
                        // Insert image content into database
                        $insert = $db->query("UPDATE `student` SET `Pic` =  '$imgContent'
                        WHERE `Email`='$_SESSION[email]'");
                        
                        if($insert){
                          $count = 0;
                            $status = 'success';
                            $statusMsg = "File uploaded successfully.";
                            ?>
                            <div class="imageAfter" style="position:relative">
                            <?php
                            echo "<img src='data:image/jpeg;base64,".base64_encode($row['Pic'])."'
                            class = 'img2 img-circle profile-img' height=200 width=100 style='display:none'>";
                            $count = 1;
                            ?>
                            </div>
                            <?php
                        } else {
                            $statusMsg = "File upload failed, please try again.";
                        }
                    } else {
                        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                        echo $statusMsg;
                    }
                } else {
                    $statusMsg = 'Please select an image file to upload.';
                    echo $statusMsg;
                }
            }
        ?>
    </div>

    <div class = "table">
      <h4 class = "PSetting">Profile Settings</h4>
        <h6 class="welcome">Welcome, <?php echo $row['Name']," ",
        $row['Surname']?></h6>
        <button class = "btn btn-black btn-default" name = "Edit" id="Edit1" style="display:none" >Edit</button>
        <div style = "overflow-x:auto; margin-top: 7%;">
        <table class="table table-responsive" id="myTable">
        <?php
          echo "<table class = 'table table-bordered'>";
          echo "<tr class = 'PS'>";
            echo "<td colspan='4' class = 'ps'>";
              echo "<label style = 'text-align:center'>Personal Information</label>";
            echo "</td>";
          echo "</tr>";

            echo "<tr class = 'cel'>";
              echo "<td>";
                echo "First Name: ";
              echo "</td>";

              
              echo "<td class='data'> $row[Name] ";
              echo "</td>";
              echo "<td>";
              echo"<button id = '$_SESSION[id]' class = 'edit btn-black btn-default' name = 'Edit' >
              <i class='fa-regular fa-pen-to-square'></i></button>";
              echo "</td>";
              echo "<td>";
              echo"<button id = '$_SESSION[id]' class = 'save btn-black btn-default' name = 'Save' >
              <i class='fa-regular fa-floppy-disk'></i></button>";
              echo "</td>";
            echo "</tr>";

            echo "<tr class = 'cel'>";
              echo "<td>";
                echo "Last Name: ";
              echo "</td>";

              echo "<td class = 'data'>";
                echo $row['Surname'];
              echo "</td>";
              echo "<td>";
              echo"<button id = '$_SESSION[id]' class = 'edit btn-black btn-default' name = 'Edit' >
              <i class='fa-regular fa-pen-to-square'></i></button>";
              echo "</td>";
              echo "<td>";
              echo"<button id = '$_SESSION[id]' class = 'save btn-black btn-default' name = 'Save' >
              <i class='fa-regular fa-floppy-disk'></i></button>";
              echo "</td>";
            echo "</tr>";

            echo "<tr class = 'cel'>";
              echo "<td>";
                echo "Email: ";
              echo "</td>";

              echo "<td class = 'data'>";
                echo $row['Email'];
              echo "</td>";
              echo "<td>";
              echo"<button id = 'edit' class = 'edit btn-black btn-default' name = 'Edit' disabled>
              <i class='fa-regular fa-pen-to-square'></i></button>";
              echo "</td>";
              echo "<td>";
              echo"<button id = 'save' class = 'save btn-black btn-default' name = 'Save' disabled>
              <i class='fa-regular fa-floppy-disk'></i></button>";
              echo "</td>";
            echo "</tr>";

            echo "<tr class = 'cel'>";
              echo "<td>";
                echo "Phone Number: ";
              echo "</td>";

              echo "<td class = 'data'>";
                echo $row['PhoneNumber'];
              echo "</td>";
              echo "<td>";
              echo"<button id = 'edit' class = 'edit btn-black btn-default' name = 'Edit' >
              <i class='fa-regular fa-pen-to-square'></i></button>";
              echo "</td>";
              echo "<td>";
              echo"<button id = 'save' class = 'save btn-black btn-default' name = 'Save' >
              <i class='fa-regular fa-floppy-disk'></i></button>";
              echo "</td>";
            echo "</tr>";

            echo "<tr class = 'cel'>";
              echo "<td>";
                echo "Password: ";
              echo "</td>";

              echo "<td class = 'data'>";
                echo $row['Password'];
              echo "</td>";
              echo "<td>";
              echo"<button id = 'edit' class = 'edit btn-black btn-default' name = 'Edit' >
              <i class='fa-regular fa-pen-to-square'></i></button>";
              echo "</td>";
              echo "<td>";
              echo"<button id = 'save' class = 'save btn-black btn-default' name = 'save' >
              <i class='fa-regular fa-floppy-disk'></i></button>";
              echo "</td>";
            echo "</tr>";
          echo "</table>";
        ?>
      </table>
        </div>
    </div>
  </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
      $(document).on('click', '.edit', function() {
        // document.getElementById("name").disabled=false;
        $(this).parent().siblings('td.data').each(function() {
          var content = $(this).html();
          var std = $(this).html('<input value="' + content + '" />');
          console.log(std);
        });
        $(this).siblings('.save').show();
      });
      $(document).on('click', '.save', function() {
        $('input').each(function() {
          var content = $(this).val();
          $(this).html(content);
          $(this).contents().unwrap();
        });  
        $(this).siblings('.edit').show();
        
      });
      $('.add').click(function() {
        $(this).parents('table').append('<tr><td class="data"></td><td class="data"></td><td class="data"></td><td><button class="save">Save</button><button class="edit">Edit</button> <button class="delete">Delete</button></td></tr>');  
      });
      $(document).on('click', '.save', function() {
  var row = $(this).parents('tr');
  var Name = row.find('input[name="Name"]').val();
  
  // Make an AJAX call to update the database
  $.ajax({
    url: '../Model/save-to-database.php',
    method: 'POST',
    data: {/*id: id, */Name: Name/*, Surname:Surname, PhoneNumber:PhoneNumber, Password:Password*/},
    success: function(response) {
      console.log(response); // Log the response from the server
    },
    error: function(xhr, status, error) {
      console.error(xhr.responseText); // Log any errors to the console
    }
  });
  
  row.find('.data.Name').html(Name);
});


// Get the table element
const table = document.getElementById('myTable');

// Create an array to store the table data
const data = [];

// Loop through each row in the table
for (let i = 1; i <= table.rows.length; i++) {
  // Get the cells for the current row
  const cells = table.rows[i].cells;

  // Create an object to store the cell data
  const rowData = {
    name: cells[0].innerText,
    surname: cells[1].innerText,
    email: cells[2].innerText,
    phone: cells[3].innerText,
    password: cells[4].innerText
  };

  // Add the row data object to the data array
  data.push(rowData);
}

// Convert the data array to a JSON string
const jsonData = JSON.stringify(data);

// Create a new XMLHttpRequest object
const xhr = new XMLHttpRequest();

// Set the request URL and method
xhr.open('POST', '../Model/save-to-database.php',true);

// Set the request headers
xhr.setRequestHeader('Content-Type', 'application/json');

// Set a callback function for when the request completes
xhr.onreadystatechange = function() {
  if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
    // Handle the response from the server
    console.log(xhr.responseText);
  }
};

// Send the JSON data as the request body
xhr.send(jsonData);

    </script>
<?php include 'footer.html'?>
  </body>
</html>
