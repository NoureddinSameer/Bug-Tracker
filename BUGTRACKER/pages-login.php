<?php
include './general/env.php';
include './general/functions.php';
include './shared/head.php';
include './shared/header1.php';

$numRows = 0;
$passworddb1 = "";
$passworddb2 = "";
if (isset($_POST['login'])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $select = "SELECT * FROM `admin` WHERE `email` ='$email'";
  $ss1  = mysqli_query($connection, $select);
  foreach ($ss1 as $y) {
    $passworddb1 = $y['password'];
  }
  if (password_verify($password, $passworddb1)) {
    $select = "SELECT * FROM `admin` WHERE `email` ='$email' and `password` = '$passworddb1'";
    $s1  = mysqli_query($connection, $select);
    $numRows = mysqli_num_rows($s1);
    $row = mysqli_fetch_assoc($s1);
    if ($numRows == 1) {
      $_SESSION['admin'] = [
        'adminName' => $email,
        'role' => $row['role'],
        'job' => "Admin"
      ];
      $job="Admin";
      path('./welcome.php');
    }else {
      session_unset();
      session_destroy();
      echo "<br><br><div class='alert alert-danger' role='alert'>
      Error! <br>
      You have a problem communicating with the Database
      <br>OR You have entered Wrong Data </div>";
    }
  } else {
      session_unset();
      session_destroy();
      echo "<br><br><div class='alert alert-danger' role='alert'>
      Error! <br>
      You have entered Wrong Data </div>";

  }
}

?>
<br>

<form action="" method="POST" enctype="multipart/form-data">
  <main>
  <div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
        Bug Tracker
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="E-mail">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
          
					
          <div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit" name="login">
             Login</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	  
</main>
<?php
include './shared/footer.php';
include './shared/script.php';
?>