<!-- bugs -->
<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';



checklink();
if (isset($_POST['send'])) {
  $name1 = $_POST["name1"];
  $name2 = $_POST["name2"];
  $title = $_POST["title"];
  $description = $_POST["description"];
  $datestarted = $_POST["datestarted"];
  $deadline = $_POST["deadline"];
  $done = $_POST["done"];
  $email = $_POST["email"];
  $priority = $_POST["priority"];
  


  $image_name = time() . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "../upload/$image_name";
  move_uploaded_file($tmp_name, $location);
  // $location = "./upload/$image_name";
  $insert = "INSERT INTO `bugs` (id,firstname,secondname,title,description,datestarted,deadline,done,email,image,priority)values(null,'$name1','$name2','$title','$description','$datestarted'
  ,'$deadline','$done','$email','$image_name','$priority')";
  $insertEmployeeCheck =  mysqli_query($connection, $insert);
  // test($insertEmployeeCheck, "insert");
  // test($Check, "insert bug");

  // session_unset();
  // session_destroy();
  path('bug/listbug.php');
  
}



?>
<br><br>
<div class="home">
  <h1 class="text-center  pt-5">Add Bug</h1>
</div>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">First Name</label>
    <input class="form-control" placeholder="Enter your First Name" type="text" name="name1">
  </div>
  <div class="form-group">
    <label for="">Second Name</label>
    <input class="form-control" placeholder="Enter your Second Name" type="text" name="name2">
  </div>
  <div class="form-group">
    <label for="">Title</label>
    <input class="form-control" placeholder="Enter the Bug's Title" type="text" name="title">
  </div>
  <div class="form-group">
    <label for="">Description</label>
    <input class="form-control" placeholder="Enter your Description" type="text" name="description">
  </div>
  <div class="form-group">
    <label for="">Date & Time</label>
    <input class="form-control" placeholder="Enter The Date Of Start" type="datetime-local" name="datestarted">
  </div>
  <div class="form-group">
    <label for="">Deadline</label>
    <input class="form-control" placeholder="Enter The Date Of Deadline" type="datetime-local" name="deadline">
  </div>
  <div class="form-group">
    <label for="">Done?</label>
    <input class="form-control" placeholder="If The Bug is Solved Enter Yes, else Enter No" type="text" name="done">
  </div>
  <div class="form-group">
    <label for="">E-mail</label>
    <input class="form-control" placeholder="Enter your E-mail" type="text" name="email">
  </div>
  <div class="form-group">
    <label for="">Enter a Screenshot Of The Bug</label>
    <input class="form-control" type="file" name="image">
  </div>
  <div class="form-group">
    <label for="">Priority</label>
    <input class="form-control" placeholder="Enter The Priority Of Bug" type="number" name="priority">
  </div>
  
  <button name="send" class="btn btn-info"> Send </button>
</form>


<?php
include '../shared/footer.php';
include '../shared/script.php';
?>