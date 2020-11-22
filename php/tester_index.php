<?php 
global $connection;

$query = "SELECT * FROM patient";
$allPatient = mysqli_query($connection, $query);

if ($allPatient->num_rows == 0){
    echo "<h2 class='text-muted text-center'>No Patient added yet</h2>";
}else {
    while($row = mysqli_fetch_assoc($allPatient)){
        $username = $row["username"];
        $patientType = $row["patientType"];
        $symptoms = $row["symptoms"];
    
        $query= "SELECT *FROM covidtest WHERE recipient = '$username'";
        $allTests = mysqli_query($connection, $query);
        
        $queryFindTester = "SELECT tester FROM covidtest WHERE recipient = '$username' AND status = 'pending'";
        $findTester = mysqli_query($connection, $queryFindTester);
        $result = mysqli_fetch_assoc($findTester);
    
        if (isset($result['tester']))
            $tester = $result['tester'];
        else {
            $tester = "Anonymous";
        }
    
        $render = "
        <div class='card shadow'>
            <h5 class='card-header'><span class='font-weight-bold'>Username :</span>  $username</h5>
            <div class='card-body'>
                <p class='card-title'><span class='font-weight-bold'>Patient-type:</span> $patientType </p>
                <p class='card-text'><span class='font-weight-bold'>Symptoms:</span></p>
                <blockquote class='px-2'>
                    <p>$symptoms</p>
                    <footer class='blockquote-footer'>Updated recently by '$tester'</footer>
                </blockquote>
                </div>
                <ul class='list-group border-top list-group-flush'>
                <li class='list-group-item'><span class='font-weight-bold'>Covid Test Taken:</span> 
                <p class='py-3'>";
    
        if ($allTests->num_rows === 0){
            $render .= "<span class='text-muted font-weight-bold'> -- NO TEST TAKEN --</span";
        }
    
        while ($row = mysqli_fetch_assoc($allTests)){
            $testID = $row["testID"];
            $status = $row["status"];
    
            if ($status === 'pending'){
                $render .= "
                <span class='text-danger font-weight-bold'>CT$testID</span>&nbsp;: $status <i class='far fa-clock'></i> &emsp; &emsp;";
            }
            else {
                $render .= "
                <span class='text-info font-weight-bold'>CT$testID</span>&nbsp;: $status <i class='far fa-clock'></i> &emsp; &emsp;";
            }
        }
    
        $render .= "
                </p>
                </li>
                </ul>
                <div class='card-footer'>
                <div class='d-flex flex-row justify-content'>
                    <a href='recordTest.php?patientUsername=$username' class='card-link btn btn-primary shadow'>
                        Record New Test
                    </a>
                    <a href='updateTest.php' class='card-link btn btn-primary shadow'>Update Test Result</a>
                </div>
            </div>
        </div>";
    
        echo $render;
    
    }
}


?>
