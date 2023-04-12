<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/head.php';
include '../shared/header2.php';



checklink();
if ($_SESSION['admin']['role'] != "1") {
  path('404.php');
}
if (isset($_POST['insert'])) {
  
  $name1 = $_POST["firstname"];
  $name2 = $_POST["secondname"];
  $age = $_POST["age"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  
  $password = $_POST["password"];
  // $password = encryp($password);

  $image_name = time() . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "../upload/$image_name";
  move_uploaded_file($tmp_name, $location);
  // $location = "../employees/upload/$image_name";
  $role = $_POST["role"];
  // $roledata="INSERT INTO `roles` values(null,'$role')";
  // mysqli_query($connection, $roledata);

  $insert = "INSERT INTO `admin` (id,firstname,secondname,age,address,phone,email,password,image,role)
  values(null,'$name1','$name2',$age,'$address','$phone','$email','$password','$image_name',$role)";
  $insertEmployeeCheck =  mysqli_query($connection, $insert);
  test($insertEmployeeCheck, "insert");

  // session_unset();
  // session_destroy();
  path('admin/listadmin.php');
}

?>

<br>
<form action="" method="POST" enctype="multipart/form-data">
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Bug Tracker</span>
              </a>
            </div>

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  <p class="text-center small">Enter your personal details to create account</p>
                </div>

                
                  <div class="col-12">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" placeholder="Enter your First Name" name="firstname" class="form-control" id="firstname" required>
                  
                  </div>
                  <div class="col-12">
                    <label for="secondname" class="form-label">Second Name</label>
                    <input type="text" placeholder="Enter your Second Name" name="secondname" class="form-control" id="secondname" required>
                  
                  </div>
                  <div class="col-12">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" placeholder="Enter your Age" name="age" class="form-control" id="age" required>
                  
                  </div>
                  <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" placeholder="Enter your Address" name="address" class="form-control" id="address" required>
                  
                  </div>

                  <div class="col-12">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" placeholder="Enter your Phone Number" name="phone" class="form-control" id="phone" required>
                  
                  </div>

                  <div class="col-12">
                    <label for="email" class="form-label">E-mail</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" placeholder="Enter your E-mail" name="email" class="form-control" id="email" required>
                    
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" placeholder="Enter your Password" name="password" class="form-control" id="password" required>
                    
                  </div>
                  <div class="col-12">
                    <label for="image" class="form-label">Profile Photo</label>
                    <input type="file"  name="image" class="form-control" id="image" required>
                    
                  </div>
                  <div class="col-12">
                    <label for="role" class="form-label">Role</label>                    
                    <select name="role" id="role" class="form-control">
                      <option value="1">All Access</option>
                      <option value="2">Semi Access</option>
                    </select>
                    
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                      <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="">terms and conditions</a></label>
                      
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="insert" type="submit">Create Account</button>
                  </div>                  
                
              </div>
            </div>

            <div class="credits">
              Designed by <a href="https://www.linkedin.com/in/noureddin-sameer-45760a236/">Noureddin Sameer</a>
            </div>

          </div>
        </div>
      </div>
    
  
    </section>
  </div>
</main><!-- End #main -->
</form>
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>