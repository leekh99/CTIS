<?php include "../includes/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTIS - Home</title>

    <!-- setup -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4344e99275.js" crossorigin="anonymous"></script>

    <!-- local files -->
    <link rel="shortcut icon" href="../img/ctisIcon_noBackgroundV2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <button onclick="topFunction()" id="btnTop" class="btn btn-primary shadow-lg" title="Go to top">
        <i class="fas fa-angle-up"></i>
    </button>
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
                    <!-- <a href="#" class="dropdown-item bg-light border-bottom">Review Later</a> -->
                    <a href="../login.php" class="dropdown-item bg-light">Logout</a>
                </aside>
            </div>


        </div>
    </nav>
    <main class="d-flex toggled" id="wrapper">
        <!-- side bar -->
        <aside class="bg-light border-right " id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light highlight ">Home</a>
                <a href="recordTest.php" class="list-group-item list-group-item-action bg-light">Record New Test</a>
                <a href="updateTest.php" class="list-group-item list-group-item-action bg-light">Update Test Result</a>
                <a href="viewTestReport.php" class="list-group-item list-group-item-action bg-light">Generate Test Report</a>
            </div>
        </aside>

        <div class="container">
            <header>
                <form action="" class="search shadow" method="POST">
                    <div class="input-group form-group">
                        <input type="text" class="form-control" placeholder="Search Patients with username ... ">
                        <div class="input-group-prepend">
                            <button class="form-control btn btn-primary" id="btnSearch"><i class="fas fa-search"></i>&nbsp; SEARCH</button>
                        </div>
                    </div>
                </form>
            </header>


            <section id="patient-details">
                <div class="row">
                    <section class="patient-list col-md-12 col-xs-12 flex">
                         
                    </section>

                    <!-- filter category -->
                    <!-- <aside class="d-flex filter col-md-3 hidden-xs justify-content-end">
                        <div class="card shadow h-25">
                            <h5 class="card-title">Sort by</h5>
                            <input type="text">
                            <label for="">Last Updated</label>
                            <input type="text">
                        </div>
                    </aside> -->
                </div>
            </section>

        </div>

    </main>
    <footer>
        
    </footer>

    <script>
        //Get the button

        </script>

    <script type="text/javascript" src="../views/index.js"></script>
    <?php include "../includes/authentication.php"?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>

        if(window.matchMedia('(max-width: 767px)').matches){
            $("#wrapper").toggleClass("toggled");
            $("#menu-icon").removeClass("fas fa-times");
            $("#menu-icon").addClass("fas fa-bars");
            $("#btnTop").toggleClass("invisible");
        }

        $("#menu-toggle").click(function() {
            $("#wrapper").toggleClass("toggled");
            $("#menu-icon").toggleClass("fas fa-bars");
            $("#menu-icon").toggleClass("fas fa-times");
        });

        
      </script>
</body>
</html>
