<?php
$titrePage = "Page Dashboard";
include_once "header.php";
session_start();
if (! isset($_SESSION["user"])) {
    header("location:login.php");
    exit;
}
?>
<a href="login.php">Login</a> <br>
<a href="registration.php">regestre</a>

<?php

echo  "is iNNDESX";
echo "<br>";

include "functions.php";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";


?>
<br>
<a href="logout.php">Logout</a>



<?php
include_once "footer.php";
?>