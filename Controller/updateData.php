<script>$(document).on('click', '.edit', function() {
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
});</script>
<?php if(isset($_POST['saveName'])){
  $id = $_SESSION['id'];
  // $sql = "SELECT `Name` FROM `student` WHERE id=$id";
  // $res = mysqli_query($db,$sql);
  // $name = mysqli_fetch_assoc($res);

  $name = $_POST['editName'];
  $sql = "UPDATE `Name` set `Name`='$name' WHERE id=$id";
  $result = mysqli_query($db,$sql);
  if($result){
    header('location: ../Views/profile.php');
  }
} ?>
<!-- <script>
  let isName = document.getElementsByClassName('saveName');
  let isSurname = document.getElementsByClassName('saveSurname');
</script> -->