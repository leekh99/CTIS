const loginName = document.getElementById('profile-name')

const checkUser = () =>{
    localStorage.clear();
    if (localStorage.length === 0){
        let url = window.location.href;
        url = url.slice(url.indexOf("user"), url.length);

        let user = url.split('&');
        let check = user[1].replace("check=", "");
        user = user[0].replace("user=", "");

        localStorage.setItem('loginUser', JSON.stringify({user,check}));

        if (user)
            elements.loginName.innerHTML = user;
    }

    const user = JSON.parse(localStorage.getItem('loginUser'));
    if (user)
        elements.loginName.innerHTML = user.user;
}
     
    
    checkUser();