<!-- updateemployee -->
<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';



                
checklink();
$id = $_GET['updateId'];
$selectOneRow = "SELECT * FROM `bugs` WHERE id=$id";
$Check = mysqli_query($connection, $selectOneRow);
// i represent the row
if ($Check) {
    $i = mysqli_fetch_assoc($Check);
    $firstname = $i['firstname'];
    $secondname = $i['secondname'];
    $title = $i['title'];
    $description = $i['description'];
    $datestarted = $i['datestarted'];
    $deadline = $i['deadline'];
    $done = $i['done'];
    $email = $i['email'];
    $priority = $i['priority'];
}
//update after we press on button of Update Data
if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $secondname = $_POST['secondname'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $datestarted = $_POST['datestarted'];
    $deadline = $_POST['deadline'];
    $done = $_POST['done'];
    $email = $_POST['email'];
    $priority = $_POST['priority'];
    

    if (empty($_FILES['image']['name'])) {
        $image_name = $i['image'];
    } else {
        $image_name = time()  . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "../upload/$image_name";
        move_uploaded_file($tmp_name, $location);
        // $location = "/ODC7/employees/upload/$image_name";
    }


    $update = "UPDATE `bugs` SET  firstname='$firstname',secondname='$secondname',title='$title',
    description='$description',datestarted='$datestarted',deadline='$deadline',
    done='$done',email='$email',image='$image_name',`priority`='$priority' WHERE id=$id";
    $CheckUpdate = mysqli_query($connection, $update);

    if ($CheckUpdate) {
        path("bug/listbug.php");
        
    } else {
        die("ERROR!" . mysqli_connect_error());
    }
}

?>
<br><br><br>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" value=<?= $firstname ?> id="firstname" name="firstname" required>
    </div>
    <div class="form-group">
        <label for="secondname">Second Name</label>
        <input type="text" class="form-control" value=<?= $secondname ?> id="secondname" name="secondname" required>
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" value=<?= $title ?> id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" value=<?= $description ?> id="description" name="description" required>
    </div>
    <div class="form-group">
        <label for="datestarted">Date & Time</label>
        <input type="text" class="form-control" value=<?= $datestarted ?> id="datestarted" name="datestarted" required>
    </div>
    <div class="form-group">
        <label for="deadline">Deadline</label>
        <input type="text" class="form-control" value=<?= $deadline ?> id="deadline" name="deadline" required>
    </div>
    <div class="form-group">
        <label for="done">Done?</label>
        <input type="text" class="form-control" value=<?= $done ?> id="done" name="done" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" value=<?= $email ?> id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="">Enter a Screenshot Of The Bug</label>
        <input class="form-control" type="file" name="image">
    </div>
    <div class="form-group">
        <label for="priority">Priority</label>
        <input type="text" class="form-control" value=<?= $priority ?> id="priority" name="priority" required>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
</form>
</table>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>