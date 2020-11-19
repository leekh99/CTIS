

    const elements = {
        checkRememberUser: document.getElementById('rememberUser'),
        btnLogin: document.querySelector('.btn-primary'),
        username : document.getElementById('username'),
        password : document.getElementById('password')
    }

    const checkRememberUser = () => {
        if(elements.checkRememberUser.checked && elements.username.value != ''){
            persistData(elements.username.value, true);
        }else {
            elements.username.value = '';
            persistData('', false);
        }
    }


    const persistData = (param1, param2) =>{
        const storage = [param1, param2]

        localStorage.clear();
        localStorage.setItem('remem-username', JSON.stringify(storage));
    }

    const setUsername = () => {
        const username = JSON.parse(localStorage.getItem('remem-username'));
        if (username){
            elements.username.value = username[0];
            elements.checkRememberUser.checked = username[1];
        }
    }

    const login = (validate, username, position) => {
        if (validate){
            alert("Login successfully with username " + username);
            checkUserType(position);
        }   

        if(!validate)
        alert("Failed to login !");
    }

    const checkUserType = (position) => {
        // let xhttp = new XMLHttpRequest();
        console.log("redirecting ...");
        switch(position){
            case "manager":
                window.location = windowUrl(`Manager/viewManagerTestReport.php?check=` + elements.checkRememberUser.checked);
                break;

            case "tester":
                window.location = windowUrl(`Tester/index.php?&check=` + elements.checkRememberUser.checked);
                break;  

            case "superAdmin":
                window.location = windowUrl(`superAdmin/addManager.php?check=` + elements.checkRememberUser.checked);
                break;

            case "patient":
                window.location = windowUrl(`Patient/viewTestingHistory.html?check=` + elements.checkRememberUser.checked);
                break;

        }
    }

    const windowUrl = (page) => {
    let url =  window.location.href;
    url = url.slice(0, url.indexOf("login.php"));
    url += page;
    return url;
    }

    setUsername();



