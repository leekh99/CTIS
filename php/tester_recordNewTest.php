<?php 
global $connection;

if (isset($_POST['create_add_test'])){

    $tkID = str_replace("TK","",$_POST['testKitID']);
    $patientUsername = $_POST['patient_username'];    
    $patientName = $_POST['patient_name'];
    $patientPassword = $_POST['patient_password'];
    $patientType = $_POST['patient_type'];
    $symptoms = $_POST['patient_symptom'];

    if (checkUsername($patientUsername)){
        echo "
        <script>
        elements.checkForm.click();
        elements.testForm.className = 'collapse show';
        elements.patientUsername.setCustomValidity('Duplicate username ! Please try input another username.');
        renderMessage('Duplicate username ! Please try input another username', false, '');
        elements.patientUsername.value = '';
        </script>
        ";        
    } else {
        // USER TABLE
        $queryUser = "INSERT INTO user(username,name,password) ";
        $queryUser .= "VALUES('{$patientUsername}', '{$patientName}', '{$patientPassword}')";

        $addUser = mysqli_query($connection,$queryUser);
        
        // PATIENT TABLE
        $queryPatient = "INSERT INTO patient(username,patientType,symptoms) ";
        $queryPatient .= "VALUES('{$patientUsername}', '{$patientType}', '$symptoms')";

        $addPatient = mysqli_query($connection,$queryPatient);
        
        // TESTKIT TABLE
        $queryTestKit = "UPDATE testkit SET availableStock = availableStock-1 ";
        $queryTestKit .= "WHERE kitID = {$tkID}";

        $updateTestKit = mysqli_query($connection, $queryTestKit);

        // COVID TEST TABLE
        $username = $_SESSION['username'];
        $centreID = $_SESSION['centreID'];
        $queryCovidTest = "INSERT INTO covidtest(testDate,status,recipient,tester, kitID, centreID) ";
        $queryCovidTest .= "VALUES(now(), 'pending', '{$patientUsername}', '{$username}', $tkID, $centreID)";
        $addCovidTest = mysqli_query($connection, $queryCovidTest);
        
        if ($addUser && $addPatient && $updateTestKit && $addCovidTest){
            echo "
            <script>
                window.location.href = 'http://localhost/CTIS/Tester/recordTest.php?source=success';
            </script>";    
        } else {
            echo "
            <script>
                window.location.href = 'http://localhost/CTIS/Tester/recordTest.php?source=fail';
            </script>";    
        }
    }    
}

if (isset($_GET['source'])){
    if ($_GET['source'] === 'success'){
        echo "
        <script>
            renderMessage('Successfully recorded a new test !', true, 'testKit');
        </script>"; 
    } else if ($_GET['source'] === 'fail'){
        echo "
        <script>
            renderMessage('Sorry, failed to record a new test !', false, 'testKit');
        </script>";
    }
}

if (isset($_POST['add_test'])){
    $tkID = str_replace("TK","",$_POST['testKitID']);
    $patientUsername = $_POST['patient_username'];    
    $patientType = $_POST['patient_type'];
    $symptoms = $_POST['patient_symptom'];

    if (!checkPatient($patientUsername)){
        echo "
        <script>
        elements.addPatientUsername.setCustomValidity('Please try input another username ');
        renderMessage(`Cannot find patient in databse. Please try again !`, false, '');
        elements.addPatientUsername.value = '';
        </script>
        ";        
    } else {
        // PATIENT TABLE
        $queryPatient = "UPDATE patient SET ";
        $queryPatient .= "patientType = '{$patientType}', ";
        $queryPatient .= "symptoms = '{$symptoms}' ";
        $queryPatient .= "WHERE username = '{$patientUsername}'";

        $updatePatient = mysqli_query($connection,$queryPatient);


        // TESTKIT TABLE
        $queryTestKit = "UPDATE testkit SET availableStock = availableStock-1 ";
        $queryTestKit .= "WHERE kitID = {$tkID}";
 
        $updateTestKit = mysqli_query($connection, $queryTestKit);


        // COVID TEST TABLE
        $username = $_SESSION['username'];
        $centreID = $_SESSION['centreID'];
        $queryCovidTest = "INSERT INTO covidtest(testDate,status,recipient,tester, kitID, centreID) ";
        $queryCovidTest .= "VALUES(now(), 'pending', '{$patientUsername}', '{$username}', $tkID, $centreID)";
        $addCovidTest = mysqli_query($connection, $queryCovidTest);

        if ($updatePatient && $updateTestKit && $addCovidTest){
            echo "
            <script>
                window.location.href = 'http://localhost/CTIS/Tester/recordTest.php?source=success';
            </script>";    
        } else {
            echo "
            <script>
                window.location.href = 'http://localhost/CTIS/Tester/recordTest.php?source=fail';
            </script>";    
        }
    }

}







?>