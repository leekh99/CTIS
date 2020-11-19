<?php include "../includes/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTIS - Update Test Result</title>

    <!-- setup -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4344e99275.js" crossorigin="anonymous"></script>

    <!-- local files -->
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
                <a href="index.php" class="list-group-item list-group-item-action bg-light">Home</a>
                <a href="recordTest.php" class="list-group-item list-group-item-action bg-light">Record New Test</a>
                <a href="#" class="list-group-item list-group-item-action bg-light highlight">Update Test Result</a>
                <a href="viewTestReport.php" class="list-group-item list-group-item-action bg-light">Generate Test Report</a>
            </div>
        </aside>

        <div class="container">
             <!-- breadcrumb navigation -->
             <header>
                <h2>Update Test Report &nbsp; <i class="fas fa-pencil-alt"></i> </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-item disabled" href="#">Update Test Result</a></li>
                    </ol>
                </nav>
            </header>


            <!-- add Tester for Test ID -->
            <section class="py-3">
                <div class="form-group">
                    <label for="covidTest_id">Covid Test ID</label>
                    <input type="text" class="form-control" name="covidTest_id" required autofocus>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary shadow" id="btnGenerate" type="submit" name="add_test" onclick="renderLoader()">Generate Test Details</button>
                </div>
            </section>

            <section id="testDetails">
                <div id="covidTestDetails-success" class="invisible">
                    <h5 class="msg_successfull">Covid Test with ID 1 found successfully &emsp;<i class="fas fa-check-circle"></i></h5>
                    <div class="card shadow">
                        <h5 class="card-header">Test ID :</h5>
                        <div class="card-body">
                            <h5 class="card-title">Test Recorded : </h5>
                            <h5 class="card-text">Results : none </h5>
                            <h5 class="card-text">Status : Pending</h5>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex flex-row justify-content">
                                <a href="includes/test_update.html" class="card-link btn btn-primary shadow">Update Test</a>
                                <a href="#" class="card-link btn btn-primary shadow" onclick="clearForm()">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="covidTestDetails-fail" class="invisible">
                    <h5 class="msg_error">Covid Test with ID 1 is not found &emsp;<i class="fas fa-times-circle"></i></h5>
                </div>
            </section>


        </div>

    </main>
    <footer></footer>

    <script type="text/javascript" src="../views/updateReport.js"></script>
    <?php include "../includes/authentication.php"?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
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
