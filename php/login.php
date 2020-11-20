
<?php 


if (isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = login($username, $password);

    if ($username != ""){
        $_SESSION["username"] = $username;

        global $connection;
        $query = "SELECT * FROM centreofficer WHERE username = '$username'";
        $result = mysqli_query($connection, $query);

        if ($result->num_rows > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $username = $row['username'];
                $position = $row['position'];
                $testCentre = $row['workplaceID'];

                $_SESSION['position']= $position;
                echo "<script>login(true, '$username', '$position', $testCentre);</script>";
            }
        } else {
            $query = "SELECT * FROM patient WHERE username = '$username'";
            $result = mysqli_query($connection, $query);

            if ($result->num_rows > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    $username = $row['username'];  
                    $patientType = $row['patientType'];
                    $symptoms = $row['symptoms'];
                                        
                    
                   $_SESSION['position']= 'patient';
                   echo "<script>login(true, '$username', 'patient');</script>";
                }
            }
        }
    } else {
        echo "
        <script>
            login();
            window.location= windowUrl('login.php');
        
        </script>";
        
    }
}

?>