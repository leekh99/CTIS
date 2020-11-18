<?php 
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "ctis";

foreach($db as $key => $value){
    define(strtoupper($key),$value);
}


$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

function addManager(){
    $username = $_POST['manager_username'];
    $name = $_POST['manager_name'];
    $password = $_POST['manager_password'];

    $queryUser = "INSERT INTO user(username, password, name)";
    $queryUser .= " VALUES('{$username}', '{$password}', '{$name}')";

    global $connection;
    $connection->query($queryUser);

    $queryCentreOfficer = "INSERT INTO centreofficer(username, position, workplace)";
    $queryCentreOfficer .= " VALUES('{$username}','manager', 'null')";

    $connection->query($queryCentreOfficer);
    echo $connection->error;
    $connection->close();
}
?>