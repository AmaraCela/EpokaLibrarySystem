<?php
session_start();
include "../Model/Connection.php";

$status = $statusMsg = '';
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
                echo $statusMsg;
                echo "<h1>done</h1>";
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
