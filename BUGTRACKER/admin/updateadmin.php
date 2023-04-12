<!-- updateemployee -->
<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';


checklink();
if ($_SESSION['admin']['role'] != "1") {
    path('404.php');
}
$id = $_GET['updateId'];
$selectOneRow = "SELECT * FROM `admin` WHERE id=$id";
$Check = mysqli_query($connection, $selectOneRow);
// i represent the row
if ($Check) {
    $i = mysqli_fetch_assoc($Check);
    $adminName1 = $i['firstname'];
    $adminName2 = $i['secondname'];
    $adminAge = $i['age'];
    $adminAddress = $i['address'];
    $adminPhone = $i['phone'];
    $adminEmail = $i['email'];
    $adminPassword = $i['password'];
}
//update after we press on button of Update Data
if (isset($_POST['update'])) {
    $adminName1 = $_POST['adminName1'];
    $adminName2 = $_POST['adminName2'];
    $adminAge = $_POST['adminAge'];
    $adminAddress = $_POST['adminAddress'];
    $adminPhone = $_POST['adminPhone'];
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];
    $adminPassword = encryp($adminPassword);

    if (empty($_FILES['image']['name'])) {
        $image_name = $i['image'];
    } else {
        $image_name = time()  . $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = "../upload/$image_name";
        move_uploaded_file($tmp_name, $location);
        // $location = "/BUGTRACKER/employees/upload/$image_name";
    }

    $update = "UPDATE `admin` SET  firstname='$adminName1',secondname='$adminName2',age=$adminAge,
    address='$adminAddress',
    phone='$adminPhone',email='$adminEmail',`password`='$adminPassword',image='$image_name' WHERE id=$id";
    $CheckUpdate = mysqli_query($connection, $update);

    if ($CheckUpdate) {
        path("admin/listadmin.php");
    } else {
        die("ERROR!" . mysqli_connect_error());
    }
}
?>
<br><br><br>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="adminName1">First Name</label>
        <input type="text" class="form-control" value=<?= $adminName1 ?> id="adminName1" name="adminName1" required>
    </div>
    <div class="form-group">
        <label for="adminName2">Second Name</label>
        <input type="text" class="form-control" value=<?= $adminName2 ?> id="adminName2" name="adminName2" required>
    </div>
    <div class="form-group">
        <label for="adminAge">Admin Age</label>
        <input type="text" class="form-control" value=<?= $adminAge ?> id="adminAge" name="adminAge" required>
    </div>
    <div class="form-group">
        <label for="adminAddress">Admin Address</label>
        <input type="text" class="form-control" value=<?= $adminAddress ?> id="adminAddress" name="adminAddress" required>
    </div>

    <div class="form-group">
        <label for="adminPhone">Admin Phone</label>
        <input type="text" class="form-control" value=<?= $adminPhone ?> id="adminPhone" name="adminPhone" required>
    </div>
    <div class="form-group">
        <label for="adminEmail">Admin Email</label>
        <input type="text" class="form-control" value=<?= $adminEmail ?> id="adminEmail" name="adminEmail" required>
    </div>
    <div class="form-group">
        <label for="adminPassword">Admin Password</label>
        <input type="text" class="form-control" value=<?= $adminPassword ?> id="adminPassword" name="adminPassword" required>
    </div>
    <div class="form-group">
        <label for="">Admin Profile Photo</label>
        <input class="form-control" type="file" name="image">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update Data</button>
</form>
</table>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>