<?php 
if(!isset($_SESSION))
{
    session_start();
}
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "ctisv2";

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

    $queryCentreOfficer = "INSERT INTO centreofficer(username, position)";
    $queryCentreOfficer .= " VALUES('{$username}','manager')";    
    $result = $connection->query($queryCentreOfficer);


    $connection->error;
    $connection->close();

    return $result;
}


function login($username, $password){
    global $connection;

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)){
        return $row['username'];
    }

}

function checkUsername($username){
    global $connection;
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    return $result->num_rows;
}

?>