<?php 
global $connection;

$query = "SELECT * FROM patient";
$allPatient = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($allPatient)){
    $username = $row["username"];
    $patientType = $row["patientType"];
    $symptoms = $row["symptoms"];

    $query= "SELECT *FROM covidtest WHERE recipient = $username";
    $allTests = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($allTests)){
        $testID = $row["testID"];
        $status = $row["status"];
    }
}

echo "<script>
const p1 = {
    Type: 'Patient',
    username: 'Henry',
    name : 'Yan Ming',
    password : 12311,
    patientType : 'returnee',
    symptoms : 'having a bad fever and some vomiting',
    tests : [{id: 'T1', date: '10/9/2020'}, {id: 'T3', date: '3/12/2020'}]
}

const p2 = {
    Type : 'Patient',
    username : 'Jason',
    name : 'Ming Le',
    password : '123',
    patientType : 'suspected',
    symptoms : 'loss of speech',
    tests : [{id: 'T31', date: '17/6/2020'}, {id: 'T52', date: '21/8/2020'}]
}

const p3 = {
    Type : 'Patient',
    username : 'Jackie',
    name : 'Zhen Quan',
    password : 'zq000',
    patientType : 'quarantined',
    symptoms : 'having a serious headache and sore throat',
    tests : [{id: 'T15', date: '1/2/2020'}, {id: 'T3', date: '30/3/2020'}]
}

const patients = [p1,p2,p3];

patients.forEach(element => {
    renderPatient(element, 'James');
});

</script>"
?>
