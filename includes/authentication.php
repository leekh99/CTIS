<?php 

session_start();

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "
    <script>
        checkLogin('$username');
    </script>";
}


 ?>