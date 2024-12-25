<?php
$titrePage = "Page Signup";
include "functions.php";
include "header.php";

if (isset($_GET['code'])) {

  $code = filter_var($_GET['code'], FILTER_SANITIZE_NUMBER_INT);
  
  activeUserWithCode($code); 

} 
echo '<div class ="  mx-auto my-auto d-flex justify-content-center   align-items-center">
<div class=" mt-5 alert alert-success">
<p>Your Account Is Active clik  <a href="login.php" class="text-info">here for login</a></p>
</div></div>  ' ;
exit;