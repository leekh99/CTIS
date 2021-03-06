<?php
if(!isset($_SESSION))
{
    session_start();
}
include_once( "../includes/db.php");
global $connection;
$testKits = "SELECT * FROM testkit tk, user u, centreofficer co WHERE tk.testCentreID = co.workplaceID AND co.username = u.username AND u.username ='".$_SESSION['username']."';";
$testKitResult = mysqli_query($connection, $testKits);
echo $connection->error;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTIS - View All Test</title>

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
        <!-- side bar -->
        <aside class="bg-light border-right " id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="viewManagerTestReport.php" class="list-group-item list-group-item-action bg-light">Home</a>
                <a href="registerTestCentre.php" class="list-group-item list-group-item-action bg-light">Register Test Centre</a>
                <a href="registerTester.php" class="list-group-item list-group-item-action bg-light">Register Tester Account</a>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#manageTestKit" class="list-group-item list-group-item-action bg-light" id="navTestKit">
                        Manage Test Kit Stock &emsp;<i class="fas fa-angle-down" id="navArrow"></i>
                    </a>
                    <ul id="manageTestKit" class="collapse list-group">
                        <li>
                            <a href="#" class="list-group-item list-group-item-action bg-light highlight">&emsp; View All Test Kit</a>
                        </li>
                        <li>
                            <a href="addTestKit.php" class="list-group-item list-group-item-action bg-light">&emsp; Add Test Kit</a>
                        </li>
                        <!--<li>
                            <a href="#" class="list-group-item list-group-item-action bg-light highlight">&emsp; Update Test Kit</a>
                        </li>-->
                    </ul>
                </li>
            </div>
        </aside>

        <div class="container">
             <!-- breadcrumb navigation -->
             <header>
                <h2><span class="font-weight-bold">All</span>  Test Kit &nbsp; <i class="fas fa-medkit"></i> </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="viewManagerTestReport.html">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-item disabled" href="#">Manage Test Kit Stock</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-item disabled" href="#">View All Test Kit</a></li>
                    </ol>
                </nav>
            </header>

            <section class="py-5">
                <table class="table">
                    <thead class="thead" style="background-color:#FFB6C1">
                        <tr>
                        <th scope="col">KitID</th>
                        <th scope="col">Kit Name</th>
                        <th scope="col">Available Stock</th>
                        <th scope="col">Test Kit Location</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $j=0;
                          while($testKitRow=mysqli_fetch_assoc($testKitResult)){
                            ?>
                        <tr>
                          <?php$j+1;?>
                          <td><strong><?php echo 'TK'.$testKitRow["kitID"]; ?></strong></td>
                          <td><strong><?php echo $testKitRow["testName"]; ?></strong></td>
                          <td><strong><?php echo $testKitRow["availableStock"]; ?></strong></td>
                          <td><strong><?php echo $testKitRow["testCentreID"]; ?></strong></td>
                          <td>
                            <!--<button type="button" class="btn btn-dark">New Test</button>-->
                            <a class="btn btn-primary" href='updateTestKit.php?testName=<?php echo $testKitRow["testName"];?>&kitID=<?php echo $testKitRow["kitID"]?>'><strong>Update Stock</strong></a>
                          </td>
                        </tr>
                        <?php
                        $j++;}
                        ?>
                    </tbody>
                  </table>
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
