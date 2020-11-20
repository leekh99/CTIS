<!-- breadcrumb navigation -->
<header>
    <h2>Record Test &nbsp; <i class="fas fa-vial"></i> </h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-item disabled" href="#">Select Test Kit</a></li>
        </ol>
    </nav>
</header>

<section class="py-5">
    <h3>Please select a test kit to record a test :</h3> <br>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">KitID</th>
                <th scope="col">Kit Name</th>
                <th scope="col">Available Stock</th>
                <th scope="col">Select Test Kit</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $username = $_SESSION['username'];


                    $query = "SELECT workplaceID FROM centreofficer WHERE username = '$username'";

                    $selectCentreID = mysqli_query($connection, $query);
                    $result = mysqli_fetch_assoc($selectCentreID);

                    $centreID = $result['workplaceID'];
                    
                    $query = "SELECT * FROM testkit WHERE testCentreID = $centreID";
                    $selectTestKit = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($selectTestKit)){
                        $kitID = $row['kitID'];
                        $kitName = $row['testName'];
                        $availableStock = $row['availableStock'];

                        echo "<tr>";
                        echo " <th scope='row'>TK{$kitID}</th>";
                        echo " <td>$kitName</td>";
                        echo " <td>$availableStock</td>";
                        if (isset($_GET['patientUsername'])){
                            $patient = $_GET['patientUsername'];
                            echo " <td><a href='recordTest.php?source=create_test&tkID={$kitID}&pUsername=$patient'>Select</a></td>";
                        } else {
                            echo " <td><a href='recordTest.php?source=create_test&tkID={$kitID}'>Select</a></td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>