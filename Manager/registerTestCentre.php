<?php
include_once("../includes/db.php");
include_once('../alert.php');
global $connection;
if(isset($_POST['registerTC']) && ($_POST['testCentre_name']!="")){

  $testcentreCheck = "select * from testcentre WHERE testcentre.centreName='".$_POST['testCentre_name']."'";
  $testCentreCheckRow = mysqli_num_rows(mysqli_query($connection,$testcentreCheck));

  if ($testCentreCheckRow>0){
    echo '<script>alert("That Test Centre already exists!")</script>';
  }
  else{
    $testCentreInsertSql="INSERT INTO `testcentre` (`centreName`) VALUES ('".$_POST['testCentre_name']."')";
    echo $testCentreInsertSql;
    mysqli_query($connection,$testCentreInsertSql);
    $_SESSION['message']="New Test Centre Added!";
    //echo "<script>location.href= 'http://localhost/CTIS/Manager/viewManagerTestReport.php' </script>";
    header('location:viewManagerTestReport.php');
  }
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTIS - Register Test Centre</title>

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
                    <a href="../login.php" class="dropdown-item bg-light">Logout</a>
                </aside>
            </div>


        </div>
    </nav>
    <main class="d-flex toggled" id="wrapper">
        <aside class="bg-light border-right " id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="viewManagerTestReport.php" class="list-group-item list-group-item-action bg-light">Home</a>
                <a href="#" class="list-group-item list-group-item-action bg-light highlight">Register Test Centre</a>
                <a href="registerTester.php" class="list-group-item list-group-item-action bg-light">Register Tester Account</a>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#manageTestKit" class="list-group-item list-group-item-action bg-light" id="navTestKit">
                        Manage Test Kit Stock &emsp;<i class="fas fa-angle-down" id="navArrow"></i>
                    </a>
                    <ul id="manageTestKit" class="collapse list-group">
                        <li>
                            <a href="viewAllTestKit.php" class="list-group-item list-group-item-action bg-light ">&emsp; View All Test Kit</a>
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
                <h2>Register Test Centre &nbsp;  <i class="far fa-hospital"></i></h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="viewManagerTestReport.html">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-item disabled" href="#">Register Test Centre</a></li>
                    </ol>
                </nav>
            </header>

            <section class="py-3">
              <form action="" enctype="multipart/form-data" method="post">
                <div class="prompt">
                    <div class="form-group">
                        <label for="testCentre_name">Test Centre's Name</label>
                        <input type="text" class="form-control" name="testCentre_name" required autofocus>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="registerTC" method="post">Register Test Centre</button>
                    </div>
                </div>
              </form>
            </section>

            <!-- display test centre details only when manager already registerd a test centre
            <section class="testCenterDetails invisible">
                <h5 class="msg_successfull">Covid Test with ID 1 found successfully &emsp;<i class="fas fa-check-circle"></i></h5>
                <div class="card shadow">
                    <h5 class="card-header">Test ID :</h5>
                    <div class="card-body">
                        <h5 class="card-title">Test Recorded : </h5>
                        <h5 class="card-text">Results : none </h5>
                        <h5 class="card-text">Status : Pending</h5>
                    </div>
                </div>

                <p class="py-5"><span class="font-weight-bold" >*NOTE</span> : 1 manager can only register 1 Test Centre </p>
            </section>
          -->

        </div>

    </main>
    <footer></footer>


    <script type="text/javascript" src="../views/js_admin/registerTestCentre.js"></script>
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
