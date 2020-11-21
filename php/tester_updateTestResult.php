<?php 
global $connection;
$tester = $_SESSION['username'];

if(isset($_POST['generate_test'])){
    $testID =  str_replace("CT", "", $_POST['covidTest_id']);
    echo $testID;
    $query = "SELECT * FROM covidtest WHERE testID = $testID AND tester = '$tester'";
    $selectTest = mysqli_query($connection, $query);

    echo "
    <script> 
        elements.generateForm.addEventListener('submit', renderLoader() ); 
        clearLoader($selectTest->num_rows);    
    </script>";
} 

if (isset($_POST['updateTest'])){
    $testID = $_POST['testID'];
    $result = $_POST['testResult'];
    $status = $_POST['status'];

    if ($status === 'complete'){
        echo "
        <script> 
            renderMessage('Failed to update as status is already complete !', false);   
        </script>";
    } else {
        $query = "UPDATE covidtest SET ";
        $query .= "status = 'complete', ";
        $query .= "result = '{$result}', ";
        $query .= "resultDate = now() ";
        $query .= "WHERE testID = $testID";

        $updateTest = mysqli_query($connection, $query);

        echo "
        <script> 
            renderMessage('Updated test successfully !', true);   
        </script>";
    }
    


}


?>