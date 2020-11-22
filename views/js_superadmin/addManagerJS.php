<script>
    const elements = {
        loginName : document.getElementById('profile-name'),
        addManagerSection : document.getElementById('addManagerForm')
    }


    const renderMessage = (success, username, message) => {
        
        const renderSuccess = 
            `<h5 class="msg_successfull" id="msg">Manager with username 
                <span class="text-dark">${username}</span> is addded successfully &emsp;
                <i class="fas fa-check-circle"></i>
            </h5>`;


        const renderFailure = 
                `<h5 class="msg_error" id="msg">Failed to add Manager with username 
                    <span class="text-dark">${username}</span> &emsp;
                    <i class="fas fa-times-circle"></i>
                </h5>`;

        const temp = `<h5 class="msg_error" id="msg">${message} &emsp;
                    <i class="fas fa-times-circle"></i>
                </h5>`;

        if (message != ''){
            elements.addManagerSection.insertAdjacentHTML('afterbegin',temp);
        } else {
            if (success)
                elements.addManagerSection.insertAdjacentHTML('afterbegin',renderSuccess);
            else 
                elements.addManagerSection.insertAdjacentHTML('afterbegin',renderFailure);
        }
        

        setTimeout(clearMessage, 3500);
    };

    const clearMessage = () => {
        const msg = document.getElementById('msg');

        if (msg){
            msg.parentElement.removeChild(msg);
        }
        window.location = window.location.href;
    };



    // const checkUser = () =>{
    //     localStorage.clear();
    //     if (localStorage.length === 0){
    //         let url = window.location.href;
    //         url = url.slice(url.indexOf("user"), url.length);

    //         let user = url.split('&');
    //         let check = user[1].replace("check=", "");
    //         user = user[0].replace("user=", "");

    //         localStorage.setItem('loginUser', JSON.stringify({user,check}));

    //         if (user)
    //             elements.loginName.innerHTML = user;
    //     }

    //     const user = JSON.parse(localStorage.getItem('loginUser'));
    //     if (user)
    //         elements.loginName.innerHTML = user.user;
    // }
        
        
    // checkUser();
</script>

<?php 
if (isset($_POST['add_test'])){
    $username = $_POST['manager_username'];

    if (checkUsername($username)>0){
        echo "
        <script> 
            renderMessage(false, '$username', 'Duplicate username ! Please try another username !');
        </script>";
    } else {
        $result = addManager();
    

        if ($result == 1)
            $result = 'true';
        else 
            $result = 'false';
    
    
        echo "
        <script> 
            renderMessage($result, '$username', '');
            
        </script>";
    }
}
?>


