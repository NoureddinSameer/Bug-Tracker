<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';


checklink();
if ($_SESSION['admin']['role'] != "1") {
    path('404.php');
}

$readAll = "SELECT * FROM `admin`";
$iC = mysqli_query($connection, $readAll);
echo '<br><br><br>';
foreach ($iC as $row) { ?>

    <h1 class="text-center"> Admin : <?= $row['id'] ?></h1>
    <div class="container col-md-3 mt-5">
        <div class="card black">
            <img src="<?= '../upload/' . $row['image']  ?>" class="img-card-top" alt="">

            <h6>Name : <?= $row['firstname'].' '.$row['secondname'] ?></h6>
            <h6>Age : <?= $row['age'] ?></h6>
            <h6>Address : <?= $row['address'] ?></h6>
            <h6>Phone : <?= $row['phone'] ?></h6>
            <h6>Email : <?= $row['email'] ?></h6>
            <h6>Password : <?= $row['password'] ?></h6>

        </div>
    </div>
<?php }


include '../shared/footer.php';
include '../shared/script.php';
?>