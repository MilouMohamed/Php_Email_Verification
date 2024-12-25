<?php
$titrePage = "Page Regester";
include "functions.php";
include "header.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST["create"])) {

    $erroes = "";
    $succes = "";

    if (isset($_POST["email"])  && isset($_POST["name"]) && isset($_POST["pass"])) {
      $email = $_POST["email"];
      $name =   $_POST["name"];
      $pass =  $_POST["pass"];
      $passConferm =  $_POST["passConferm"];
      // echo "<pre>";
      // print_r($_POST);
      // echo "</pre>";

      if (empty($email) ||  empty($name) ||  empty($pass)) {
        $erroes = "Input Is Empty <br> ";
      }
      if ($pass  !==   $passConferm) {
        $erroes .= " The Password Not Equels  <br> ";
      }

      $user = verefyUserEmail($email);
      if (count($user) > 0) {
        $erroes .= " This email is already registered. Please use a different email or log in to your account  ";
      }


      if (empty($erroes)) {
 


        $pass = password_hash($pass, PASSWORD_BCRYPT); 

        $codeVerf = rand(100000, 1000000000);
        setUser($name, $email, $pass, $codeVerf);

        $subject = 'Activation Account';
        $msg = 'You can active your account here  <a href="http://localhost/php_Email_Verification/check.php?code=' . $codeVerf . '"  class="btn btn-outline-danger">Active  </a>';

        $succes =  smtp_mailer($email, $subject, $msg);

        $succes .= "Please check your email <strong> $email </strong> for an activation link to complete the setup of your account ...";
      }
    }
  }
}







?>

<a href="index_.php">Home</a>
<a href="index_.php">Home</a>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="MILOU MED Logo">
                  <h4 class="mt-1 mb-5 pb-1">Create New Account</h4>
                </div>

                <form id="myForm" method="post">
                  <p>Please create your account</p>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="form2Example11" name="email" value="test0022b@gmail.com" class="form-control"
                      placeholder="Phone number or email address" />
                    <label class="form-label" for="form2Example11">Email</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" value="name 1" id="form2Example22" name="name" class="form-control" />
                    <label class="form-label" for="form2Example22">Username</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" value="0000" id="form2Example24" name="pass" class="form-control" />
                    <label class="form-label" for="form2Example24">Password</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-2">
                    <input type="password" value="00000" id="form2Example23" name="passConferm" class="form-control" />
                    <label class="form-label" for="form2Example23">Conferm Password</label>
                  </div>
                  <div class="  text-center  pt-0 mt-0 mb-2 pb-1">
                    <?php
                    if (!empty($succes)) {
                      echo   ' <p class="fs-6 mb-0 me-2  bg-sdanger text-success"  >' . $succes . ' </p>';
                    }
                    if (!empty($erroes)) {
                      echo   ' <p class="fs-6 mb-0 me-2  bg-sinfo text-danger"  >' . $erroes . ' </p>';
                    }

                    ?>
                    <p class="fs-6 mb-0 me-2  bg-ganger text-danger" id="error_msg"> </p>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit" name="create" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Create test</button>
                    <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                  </div>


                </form>

                <div class="d-flex align-items-center justify-content-center pt-0 mt-0 mb-2 pb-1">
                  <p class="mb-0 me-2">You have an account ?</p>
                  <a href="login.php" type="button" class="btn btn-outline-danger">Login </a>
                </div>


              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include_once "footer.php";
?>