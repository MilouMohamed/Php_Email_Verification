<?php
$titrePage = "Page Index";
include_once "header.php";
?>
<div class="container mt-5 ">

    </h1>

    <br>


    <div class="btn-group" role="group" aria-label="Button group"> 
        <a href="login.php" class="btn btn-primary m-2">Login</a> <br>
        <a href="registration.php" class="btn btn-primary  m-2">regestre</a>
        <a href="dashboard.php" class="btn btn-primary  m-2">dashboard </a>
    </div>

    <?php
    echo  "<h1> Is Index Page  </h1>";
    echo "<br>";

    include "functions.php";


    echo "<pre>";
    print_r(getUsersWhere());
    echo "</pre>";
    ?>
</div>

<?php
include_once "footer.php";
?>