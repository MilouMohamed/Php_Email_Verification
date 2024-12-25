<?php
$titrePage = "Page Login";
include_once "header.php";
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
                  <h4 class="mt-1 mb-5 pb-1">Login</h4>
                </div>

                <form method="post">
                  <p>Please login to your account</p>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form2Example11" name="email" class="form-control"
                      placeholder="Email address" value="test0022a@gmail.com" />
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example22" value="0000" name="pass" class="form-control" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-2 pb-1">
                    <button onclick="click_sender()" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Login </button>
                    <!-- <a class="text-muted" href="#!">Forgot password?</a> -->
                  </div>
                   
                    <div class="alert alert-danger d-none p-2" id="error_msg">  
                    </div> 

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="registration.php" class="btn btn-outline-danger">Create New </a>
                  </div>

                </form>

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

<script src="./js/script.js"></script>

<?php
include_once "footer.php";
?>