const loginName = document.getElementById('profile-name');

const checkLogin = () => {
    const user = JSON.parse(localStorage.getItem('loginUser'));


    if (user)
        loginName.innerHTML = user.user;
}

checkLogin();