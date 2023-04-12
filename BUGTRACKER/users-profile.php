<?php
include './general/env.php';
include './general/functions.php';
include './shared/head.php';
include './shared/header1.php';

checklink();
if (isset($_SESSION['admin'])) {
  /****** */
  $user = $_SESSION['admin']['job'];
  $email = $_SESSION['admin']['adminName'];
  $readAll1 = "SELECT * FROM `admin` WHERE email='$email'";
  $iC1 = mysqli_query($connection, $readAll1);
  if ($iC1) {
    foreach ($iC1 as $row1) {
    
      $name1 = $row1['firstname'];
      $name2 = $row1['secondname'];
      $image = $row1['image'];
      $phone = $row1['phone'];
      $address = $row1['address'];
      $user = "Admin";
      $db = 'admin';
      $country = $row1['country'];
      $twitter = $row1['twitter'];
      $facebook  = $row1['facebook'];
      $instagram   = $row1['instagram'];
      $linkedin    = $row1['linkedin'];
    }
  }
}
//changepassword
if (isset($_POST['changepassword'])) {
  $currentPassword = $_POST['currentPassword'];
  $newpassword = $_POST['newpassword'];
  $renewpassword = $_POST['renewpassword'];

  $select = "SELECT * FROM `$db` WHERE `email` ='$email'";
  $ss  = mysqli_query($connection, $select);
  foreach ($ss as $y) {
    $id = $y['id'];
    $passworddb1 = $y['password'];
  }
  if (password_verify($currentPassword, $passworddb1)) {
    if($newpassword == $renewpassword){
      $newpassword = encryp($renewpassword);
      $update = "UPDATE `$db` SET  `password`='$newpassword' WHERE id=$id";
      $CheckUpdate = mysqli_query($connection, $update);
      print_r($CheckUpdate);
      if ($CheckUpdate){
        echo '<br><br><br><br>';
        test($CheckUpdate, "update");
      } else {
        echo '<br><br><br><br>';
        die("ERROR!" . mysqli_connect_error());
      }
    }else{
      echo "<br><br><div class='alert alert-danger' role='alert'>
      Error! <br>
      invalid data!<br>
      </div>";   
    }
  }else{
    echo "<br><br><div class='alert alert-danger' role='alert'>
    Error! <br>
    invalid data!<br>
    </div>"; 
  }
}
//editprofile
if (isset($_POST['editprofile'])) {
  $name1 = $_POST['firstname'];
  $name2 = $_POST['secondname'];
  $country = $_POST['country'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email1 = $_POST['email'];
  $twitter = $_POST['twitter'];
  $facebook = $_POST['facebook'];
  $instagram = $_POST['instagram'];
  $linkedin = $_POST['linkedin'];

  $select1 = "SELECT * FROM `$db` WHERE `email` ='$email'";
  $ss1  = mysqli_query($connection, $select1);
  foreach ($ss1 as $y) {
    $id = $y['id'];
  }
  $update1 = "UPDATE `$db` SET firstname='$name1',secondname='$name2',
    country='$country',address='$address',phone='$phone',email='$email1',twitter='$twitter'
    ,facebook='$facebook',instagram='$instagram',linkedin='$linkedin'  WHERE id=$id";
  $CheckUpdate1 = mysqli_query($connection, $update1);
  print_r($CheckUpdate1);
  if ($CheckUpdate1) {
    echo '<br><br><br><br>';
    test($CheckUpdate1, "update");
    session_unset();
    session_destroy();
    path("pages-login.php");
  } else {
    echo '<br><br><br><br>';
    die("ERROR!" . mysqli_connect_error());
  }
}


?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./welcome.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div>
  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="<?= './upload/' . $image ?>" alt="Profile" class="rounded-circle">
            <h2><?= $name1 ?></h2>
            <h3><?= $user ?></h3>
            <div class="social-links mt-2">
              <a href="<?= $twitter ?>" class="twitter"><i class="fa-brands fa-twitter"></i></a>
              <a href="<?= $facebook ?>" class="facebook"><i class="fa-brands fa-facebook"></i></a>
              <a href="<?= $instagram ?>" class="instagram"><i class="fa-brands fa-instagram"></i></a>
              <a href="<?= $linkedin ?>" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>


              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= $name1 . ' ' . $name2 ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Company</div>
                  <div class="col-lg-9 col-md-8">Company System</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Title Job</div>
                  <div class="col-lg-9 col-md-8"><?= $user ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8"><?= $country ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8"><?= $address ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8"><?= $phone ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= $email ?></div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="<?= './upload/' . $image ?>" alt="Profile">
                      <div class="pt-2">
                        <a href="" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="firstname" type="text" class="form-control" id="firstname" value="<?= $name1 ?>">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="secondname" class="col-md-4 col-lg-3 col-form-label">Second Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="secondname" type="text" class="form-control" id="secondname" value="<?= $name2 ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="country" value="<?= $country ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="address" value="<?= $address ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="phone" value="<?= $phone ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="<?= $email ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="twitter" type="text" class="form-control" id="twitter" value="">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="facebook" type="text" class="form-control" id="facebook" value="<?= $facebook ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="instagram" type="text" class="form-control" id="instagram" value="<?= $instagram ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="linkedin" type="text" class="form-control" id="linkedin" value="<?= $linkedin ?>">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" name="editprofile" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>


              <div class="tab-pane fade pt-3" id="profile-change-password">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newpassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newpassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewpassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewpassword">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="changepassword">Change Password</button>
                  </div>
                </form>


              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->



<?php
include './shared/footer.php';
include './shared/script.php';
?>