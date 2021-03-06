<?php

include "../includes/db.php";
global $connection;

if(!isset($_SESSION))
{
    session_start();
}
$errormsg="";
$officerResult = mysqli_query($connection,"SELECT * from user, centreofficer WHERE user.username=centreofficer.username;");

if(isset($_POST['register_tester']) && ($_POST['tester_username']!="") && ($_POST['tester_password']!="") && ($_POST['tester_CrmPassword']!="")){
  $officerUsernameCheck = "select * from user,centreofficer WHERE user.username='".$_POST['tester_username']."'  AND password='".$_POST['tester_password']."'AND user.username=centreofficer.username;";
  $officerUsernameCheckRow = mysqli_num_rows(mysqli_query($connection,$officerUsernameCheck));



  if ($officerUsernameCheckRow>0){
    echo '<script>alert("That Username already exists!")</script>';
  } else {
    $userInsertSql="INSERT INTO `user` (`username`, `password`, `name`) VALUES ('".$_POST['tester_username']."', '".$_POST['tester_password']."', '".$_POST['tester_name']."');";
    mysqli_query($connection,$userInsertSql);
    $centreofficerInsertSql="INSERT INTO `centreofficer` (`username`, `position`, `workplace`) VALUES ('".$_POST['tester_username']."', 'Tester', '".$_SESSION['centreID']."');";
    mysqli_query($connection,$userInsertSql);
    mysqli_query($connection,$centreofficerInsertSql);
    $_SESSION['message']="New User and Tester accounts created successfully!.";
  }
} 
//alert message
include_once("../alert.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTIS - Register Tester</title>

    <!-- setup -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4344e99275.js" crossorigin="anonymous"></script>

    <!-- local files  -->
    <link rel="shortcut icon" href="../img/ctisIcon_noBackgroundV2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav id="container page-content-wrapper">
        <div class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary shadow" id="menu-toggle">
              <i class="fas fa-bars" id="menu-icon"></i>
            </button>
            <div class="mx-auto">
                <img src="../img/ctisLogo_bigger_transparent.png" alt="CTIS-logo">
            </div>

            <div class="dropdown">
                <button class="d-flex btn" data-toggle="dropdown" data-target="#accountMenu">
                    <i class="fas fa-user-circle"></i>
                    <span class="justify-content-center bg-light" id="profile-name">&nbsp; Login</span>
                </button>
                 <!-- account menu -->
                <aside class="collapse dropdown-menu dropdown-menu-right bg-light" id="accountMenu" >
                    <a href="../login.html" class="dropdown-item bg-light">Logout</a>
                </aside>
            </div>


        </div>
    </nav>
    <main class="d-flex toggled" id="wrapper">
        <!-- side bar -->
        <aside class="bg-light border-right " id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="viewManagerTestReport.php" class="list-group-item list-group-item-action bg-light">Home</a>
                <a href="registerTestCentre.php" class="list-group-item list-group-item-action bg-light">Register Test Centre</a>
                <a href="#" class="list-group-item list-group-item-action bg-light highlight">Register Tester Account</a>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#manageTestKit" class="list-group-item list-group-item-action bg-light" id="navTestKit">
                        Manage Test Kit Stock &emsp;<i class="fas fa-angle-down" id="navArrow"></i>
                    </a>
                    <ul id="manageTestKit" class="collapse list-group">
                        <li>
                            <a href="viewAllTestKit.php" class="list-group-item list-group-item-action bg-light">&emsp; View All Test Kit</a>
                        </li>
                        <li>
                            <a href="addTestKit.php" class="list-group-item list-group-item-action bg-light">&emsp; Add Test Kit</a>
                        </li>
                    </ul>
                </li>
            </div>
        </aside>

        <div class="container">
             <!-- breadcrumb navigation -->
             <header>
                <h2>Register Tester Account &nbsp; <i class="fas fa-users"></i></h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="viewManagerTestReport.html">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-item disabled" href="#">Register Tester Account</a></li>
                    </ol>
                </nav>
            </header>

            <section class="py-4">
                <form action="" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                      <label for="tester_username">Tester's Username</label>
                      <input type="text" class="form-control" name="tester_username" required autofocus>
                  </div>

                  <div class="form-group">
                      <label for="tester_name">Tester's Name</label>
                      <input type="text" class="form-control"  name="tester_name" required>
                  </div>

                  <div class="form-group">
                      <label for="tester_password">Tester's Password</label>
                      <input type="text" class="form-control"  name="tester_password" required minlength="3">
                  </div>

                  <div class="form-group">
                    <label for="tester_CrmPassword">Confirm Password</label>
                    <input type="text" class="form-control" name="tester_CrmPassword" required minlength="3">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="register_tester">Register Tester</button>
                </div>
              </form>
            </section>
      </div>






            </section>
        </div>

    </main>
    <footer></footer>


    <?php include "../includes/authentication.php"?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $("#navTestKit").click(function(){
            $("#navArrow").toggleClass("fas fa-angle-down");
            $("#navArrow").toggleClass("fas fa-angle-up");
        });

        if(window.matchMedia('(max-width: 767px)').matches){
            $("#wrapper").toggleClass("toggled");
            $("#menu-icon").removeClass("fas fa-times");
            $("#menu-icon").addClass("fas fa-bars");
        }


        $("#menu-toggle").click(function() {
            $("#wrapper").toggleClass("toggled");
            $("#menu-icon").toggleClass("fas fa-bars");
            $("#menu-icon").toggleClass("fas fa-times");

        });
      </script>
</body>
</html>
