const loginName = document.getElementById('profile-name');

const checkLogin = (username) => {
    const user = username;


    if (user)
        loginName.innerHTML = username;
}