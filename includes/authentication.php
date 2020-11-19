<script>
    const loginName = document.getElementById('profile-name');

    const checkLogin = (username) => {
        const user = username;


        if (user)
            loginName.innerHTML = username;
    }
</script>


<?php 

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    echo "
    <script>
        checkLogin('$username');
    </script>";
}
 ?>