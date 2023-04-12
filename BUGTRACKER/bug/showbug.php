<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';


      
checklink();
$readAll = "SELECT * FROM `bugs`";
$iC = mysqli_query($connection, $readAll);
foreach ($iC as $row) { ?>
    <br><br><br>
    <h1 class="text-center"> Bug id : <?= $row['id'] ?></h1>
    <div class="container col-md-3 mt-5">
        <div class="card">            
            <img src="<?= '../upload/' . $row['image']  ?>" class="img-card-top" alt="">
            <div class="card">
                <h6>Name : <?= $row['firstname'].' '.$row['secondname'] ?></h6>
                <h6>Title : <?= $row['title'] ?></h6>
                <h6>Description : <?= $row['description'] ?></h6>
                <h6>Date & Time : <?= $row['datestarted'] ?></h6>
                <h6>Deadline : <?= $row['deadline'] ?></h6>
                <h6>Done? : <?= $row['done'] ?></h6>
                <h6>Email : <?= $row['email'] ?></h6>
                <h6>Priority : <?= $row['priority'] ?></h6>

            </div>
        </div>

    </div>

<?php }
include '../shared/footer.php';
include '../shared/script.php';
?>