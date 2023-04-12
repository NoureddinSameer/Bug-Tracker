<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';


checklink();
if ($_SESSION['admin']['role'] != "1") {
  path('404.php');
}
//Delete
if (isset($_GET['removeId'])) {
  $id = $_GET['removeId'];
  $selectOne = "SELECT * FROM `admin` where id =$id";
  $ss = mysqli_query($connection, $selectOne);
  $row = mysqli_fetch_assoc($ss);
  $image =   $row['image'];

  unlink("$image");
  $delete = "DELETE FROM `admin` WHERE id =$id ";
  mysqli_query($connection, $delete);
  
  path('admin/listadmin.php');
}
// if ($_SESSION['admin']['role'] != "0") {
//   path('404.php');
// }
?>
<h1 class="text-center"> list of Admins</h1>
<table class="table table-dark">

  <?php
  $readAll = "SELECT * FROM `admin`";
  $iC = mysqli_query($connection, $readAll); ?>
  <table class="table table-dark">
    <tr>
      <th scope="col">#ID</th>
      <!-- <th scope="col">#Admin Picture</th> -->
      <th scope="col">Admin Name</th>
      <th scope="col">Admin Age</th>
      <th scope="col">Admin Address</th>
      <th scope="col">Admin Phone</th>
      <th scope="col">Admin Email</th>
      <th scope="col">Admin Password</th>
      <th scope="col">Admin Picture</th>
      <th scope="col">Action</th>

    </tr>
    <?php
    foreach ($iC as $i) { ?>

<tr>
      <th scope="col"><?= $i['id'] ?></th>
      <th scope="col"><?= $i['firstname'].' '.$i['secondname'] ?></th>
      <th scope="col"><?= $i['age'] ?></th>
      <th scope="col"><?= $i['address'] ?></th>
      <th scope="col"><?= $i['phone'] ?></th>
      <th scope="col"><?= $i['email'] ?></th>
      <th scope="col"><?= $i['password'] ?></th>
      <th scope="col">
        <image src="<?= '../upload/'.$i['image']  ?>" style="height:90px;width:90px" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="https://scontent.fcai19-7.fna.fbcdn.net/v/t39.30808-1/307965251_110457838485709_2986188179606266249_n.jpg?stp=c0.0.40.40a_cp0_dst-jpg_p40x40&amp;_nc_cat=107&amp;ccb=1-7&amp;_nc_sid=7206a8&amp;_nc_ohc=DCVFjAECpuQAX908lJ0&amp;_nc_ht=scontent.fcai19-7.fna&amp;oh=00_AT-AY8BhnWXld9mtBr1RJR36vY8ft3Gdt2ekmJE1_V0H4Q&amp;oe=633394D0"></image>
      </th>
      <td>
        <button class="btn btn-primary "><a href="updateadmin.php?updateId=<?= $i['id'] ?>" class="text-light btn-a"><i class="fa-solid fa-pen-to-square"></i></a></button>
        <div><br></div>
        <button class="btn btn-danger "><a href="../admin/listadmin.php?removeId=<?= $i['id'] ?>" class="text-light btn-a"><i class="fa-solid fa-trash-can"></i></a></button>
      </td>
      </tr>
    <?php  } ?>
  </table>
  <?php
include '../shared/footer.php';
include '../shared/script.php';
?>