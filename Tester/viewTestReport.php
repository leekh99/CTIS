<?php include "../includes/db.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTIS - Generate Test Report</title>

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
                <a href="index.php" class="list-group-item list-group-item-action bg-light">Home</a>
                <a href="recordTest.php" class="list-group-item list-group-item-action bg-light">Record New Test</a>
                <a href="updateTest.php" class="list-group-item list-group-item-action bg-light">Update Test Result</a>
                <a href="#" class="list-group-item list-group-item-action bg-light highlight">Generate Test Report</a>
                <a href="allPatient.php" class="list-group-item list-group-item-action bg-light">Display Patient Details</a>
            </div>
        </aside>

        <div class="container">
            <!-- breadcrumb navigation -->
            <header>
                <h2>Test Report &nbsp; <i class="far fa-file-alt"></i> </h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-item disabled" href="#">Generate Test Report</a></li>
                    </ol>
                </nav>
            </header>


            <!-- different generated test reports -->
            <section class="py-4">

                <!-- tab navigation -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="analysis-tab" data-toggle="tab" href="#analysis-test" role="tab" aria-selected="true">Analysis Test Report</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="table-tab" data-toggle="tab" href="#table-test" role="tab" aria-selected="false">Table Test Report</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- analysis test report -->
                    <section class="analysis tab-pane show active" id="analysis-test" role="tabpanel" aria-labelledby="analysis-tab">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 py-3">
                                <div class="card shadow ">
                                    <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Patient Type</h5>
                                      <p class="card-text">
                                        <div id="piechart" class="p-3"></div>
                                      </p>
                                    </div>
                                    <div class="card-footer"><i class="far fa-clock"></i> Last updated :
                                        <time> <?php echo date("d/m/y") ?>  </time>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-md-6 col-xs-12 py-3">
                              <div class="card shadow ">
                                <div class="card-body">
                                  <h5 class="card-title font-weight-bold">Test Status</h5>
                                  <p class="card-text">
                                      <div id="barchart" class="p-3"></div>
                                  </p>
                                </div>
                                <div class="card-footer"><i class="far fa-clock"></i> Last updated :
                                    <time> <?php echo date("d/m/y") ?>  </time>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                      <h5 class="card-title font-weight-bold">Test Recorded on a Daily Basis</h5>
                                      <p class="card-text">
                                          <div id="linechart" class="p-3"></div>
                                      </p>
                                    </div>
                                    <div class="card-footer"><i class="far fa-clock"></i> Last updated :
                                        <time> <?php echo date("d/m/y") ?>  </time>
                                    </div>
                                  </div>
                            </div>
                        </div>

                    </section>


                    <section class="tab-pane py-3 fade" id="table-test" role="tabpanel" aria-labelledby="table-tab">
                        <div class="table-responsive">
                            <table class="table">
                                <?php 
                                     global $connection;
                                     $centreID = $_SESSION['centreID'];
                                     $tester = $_SESSION['username'];
 
 
                                     $query = "SELECT * FROM covidtest WHERE centreID = $centreID";
                                     $selectCentreID = mysqli_query($connection, $query);

                                     if ($selectCentreID->num_rows == 0){
                                        echo "<h2 class='text-muted text-center'>No Test Has been Taken Yet</h2>";
                                     } else {
                                ?>
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">TestID</th>
                                    <th scope="col">Test Taken (Date)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Result</th>
                                    <th scope="col">Result Date</th>
                                    <th scope="col">Recipient</th>
                                    <th scope="col">Tester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                   

                                    while($row = mysqli_fetch_assoc($selectCentreID)){
                                        $testID = $row['testID'];
                                        $testDate = $row['testDate'];
                                        $status = $row['status'];
                                        $result = $row['result'];
                                        $resultDate = $row['resultDate'];
                                        $recipient = $row['recipient'];
                                        $tester = $row['tester'];
                                        

                                        echo "<tr>";
                                        echo " <th scope='row'>CT{$testID}</th>";
                                        echo " <td>$testDate</td>";
                                        echo " <td>$status</td>";
                                        if ($result === null)
                                            echo " <td>-</td>";
                                        else 
                                            echo " <td>$result</td>";

                                        if ($resultDate === null)
                                            echo " <td>-</td>";
                                        else
                                            echo " <td>$resultDate</td>";
                                        echo " <td>$recipient</td>";
                                        echo " <td>$tester</td>";
                                        echo "</tr>";
                                    }
                                ?>
                                </tbody>
                        <?php } ?>
                            </table>
                        </div>
                    </section>
                </div>
            </section>

        </div>



    </main>
    <footer></footer>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php include "../views/generateTestReport.php" ?>
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
