<script>
    const loginName = document.getElementById('profile-name');

    const checkLogin = (username) => {
        const user = username;


        if (user)
            loginName.innerHTML = username;
    }
</script>


<?php
if(!isset($_SESSION))
{
    session_start();
}
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $position = $_SESSION['position'];


    // if ($position)

    echo "
    <script>
        checkLogin('$username');
    </script>";
} else {
    echo "
    <script>
    location.href =  'http://localhost/CTIS/login.php';
    </script>";
}

if (isset($_SESSION['position'])){
    $position = strtoupper($_SESSION['position']);
    $checkUrL = strtoupper($_SERVER['REQUEST_URI']);

    if (!strpos($checkUrL, $position)){
        echo "
        <script>
        location.href =  'http://localhost/CTIS/login.php';
        </script>";
    }
}
 ?>
 
