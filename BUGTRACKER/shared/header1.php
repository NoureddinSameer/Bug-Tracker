<?php
session_start();
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("location: ./pages-login.php");
}
$email;
if (isset($_SESSION['admin'])) {
    $email = $_SESSION['admin']['adminName'];
    $user = $_SESSION['admin']['job'];

    
    $readAll1 = "SELECT * FROM `admin` WHERE email='$email'";
    $iC1 = mysqli_query($connection, $readAll1);

    if ($iC1) {
      foreach ($iC1 as $row1) {
        $name = $row1['firstname'];
        $image = $row1['image'];
        $phone = $row1['phone'];
        $address = $row1['address'];
        $user = "Admin";
      }
    }
  
}
?>

<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="" class="logo d-flex align-items-center">




    <!-- <i aria-hidden="true" class="fas fa-car" title="Time to destination by car"></i> -->
    <label><i class="fas fa-biohazard fa-lg"></i></label>

      <span class="d-none d-lg-block">Bug Tracker</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>

  </div>



  <?php if (isset($_SESSION['admin'])) : ?>
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
      <span class="d-none d-md-block dropdown-toggle ps-2"><?= 'admins' ?></span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./admin/createadmin.php">
          <i class="bi bi-gear"></i>
          <span>Add admin</span>
        </a>
      </li>

      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./admin/listadmin.php">
          <i class="bi bi-gear"></i>
          <span>List All</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./admin/showadmin.php">
          <i class="bi bi-gear"></i>
          <span>Show All</span>
        </a>
      </li>
    </ul>
  <?php endif; ?>
  <!-- end admins -->

  <?php if (isset($_SESSION['admin'])) : ?>
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
      <span class="d-none d-md-block dropdown-toggle ps-2"><?= 'Bugs' ?></span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./bug/createbug.php">
          <i class="bi bi-gear"></i>
          <span>Add Bug</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./bug/listbug.php">
          <i class="bi bi-gear"></i>
          <span>List All</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="./bug/showbug.php">
          <i class="bi bi-gear"></i>
          <span>Show All</span>
        </a>
      </li>

    </ul>
  <?php endif; ?>
  <!-- end bugs -->

  

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="">
          <i class="bi bi-search"></i>
        </a>
      </li>


      <li class="nav-item dropdown pe-3">
        <?php if (isset($_SESSION['admin'])) : ?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
            <img src="<?= './upload/' . $image ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $name ?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $name ?></h6>
              <span><?= $user ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <form action="">
                <button name="logout" class="dropdown-item d-flex align-items-center" href="./pages-login.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span><i class="fa-solid fa-right-from-bracket"></i>Sign Out</span>
                </button>
              </form>
            </li>
          </ul>
        <?php endif; ?>
  </nav>
</header>