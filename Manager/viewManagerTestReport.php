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
                <aside class="collapse dropdown-menu dropdown-menu-right bg-light" id="accountMenu">
                    <a href="../login.php" class="dropdown-item bg-light">Logout</a>
                </aside>
            </div>

        </div>
    </nav>


    <main class="d-flex toggled" id="wrapper">
        <!-- side bar -->
        <aside class="bg-light border-right " id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light highlight">Home</a>
                <a href="registerTestCentre.php" class="list-group-item list-group-item-action bg-light">Register Test Centre</a>
                <a href="registerTester.php" class="list-group-item list-group-item-action bg-light">Register Tester</a>
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
                <h2>Test Report &nbsp; <i class="far fa-file-alt"></i> </h2>
            </header>


            <!-- different generated test reports -->
            <section class="py-4">

                <!-- tab navigation -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="analysis-tab" data-toggle="tab" href="#analysis-test" role="tab" aria-selected="true">Analysis Test Report</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="table-tab" data-toggle="tab" href="#table-test" role="tab" aria-selected="false">Table Test Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="table-tab" data-toggle="tab" href="#tester-list" role="tab" aria-selected="false">Tester List</a>
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
                                        <time> 19/10/2020 </time>
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
                                    <time> 19/10/2020 </time>
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
                                        <time> 19/10/2020 </time>
                                    </div>
                                  </div>
                            </div>
                        </div>

                    </section>

                    <section class="tab-pane py-3 fade" id="table-test" role="tabpanel" aria-labelledby="table-tab">
                        <div class="py-5 row">
                            <div class="px-3"><label for="testKit_name col-md-3">Sort By : </label></div>
                            <div class="form-group col-md-7">
                                <select class="form-control" name="sorting" id="sortBy">
                                    <option value="CovidTestID">Covid Test ID</option>
                                    <option value="Username">Username</option>
                                    <option value="close_contact">Result</option>
                                </select>
                            </div>
                            <div class="px-3 col-md-2">
                                <button class="btn btn-primary" type="submit" name="add_TestKit" onclick="">
                                Sort
                                </button>
                            </div>

                        </div>


                        <table class="table py-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">CovidTestID</th>
                                    <th scope="col">Recipient</th>
                                    <th scope="col">Tester</th>
                                    <th scope="col">TestType</th>
                                    <th scope="col">TestDate</th>
                                    <th scope="col">Result</th>
                                    <th scope="col">ResultDate</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="testTableRow">
                                <tr>
                                <th scope="row">CT1</th>
                                <td>Matthew</td>
                                <td>Dr.Lee</td>
                                <td>Antigen</td>
                                <td>21/10/2020</td>
                                <td>Negative</td>
                                <td>22/10/2020</td>
                                <td>Completed</td>
                                </tr>
                                <tr>
                                <th scope="row">CT2</th>
                                <td>Amber</td>
                                <td>Dr.Tan</td>
                                <td>Rapid Detection</td>
                                <td>23/10/2020</td>
                                <td>-</td>
                                <td>23/10/2020</td>
                                <td>Pending</td>
                                </tr>
                                <tr>
                                <th scope="row">CT3</th>
                                <td>Jean</td>
                                <td>Dr.Han</td>
                                <td>Molecular</td>
                                <td>17/10/2020</td>
                                <td>Positive</td>
                                <td>19/10/2020</td>
                                <td>Completed</td>
                                </tr>
                            </tbody>
                          </table>
                    </section>


                    <section class="tab-pane py-3 fade" id="tester-list" role="tabpanel" aria-labelledby="table-tab">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Workplace</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">leekeathong</th>
                                <td>Dr.Lee</td>
                                <td>Tester</td>
                                <td>TC01</td>
                                </tr>
                                <tr>
                                <th scope="row">edisontan</th>
                                <td>Dr.Tan</td>
                                <td>Tester</td>
                                <td>TC01</td>
                                </tr>
                                <tr>
                                <th scope="row">wenying</th>
                                <td>Dr.Siw</td>
                                <td>Tester</td>
                                <td>TC01</td>
                                </tr>
                            </tbody>
                          </table>
                    </section>
                </div>
            </section>

        </div>



    </main>
    <footer></footer>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="../views/js_admin/viewManagerTestReport.js"></script>
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
