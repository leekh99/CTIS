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


const tempData = [
    {
        Type : "CentreOfficer",
        username : "Marry",
        name : "Grande",
        password : "qwe",
        position : "Manager"
    },
    {
        Type : "CentreOfficer",
        username : "James",
        name : "Lee Xin Jing",
        password : "qwe",
        position : "Tester"
    },
    {
        Type : "Patient",
        username : "Jason",
        name : "Ming Le",
        password : "qwe",
        patientType : "suspected",
        symptoms : "loss of speech"
    }
]

const login = () => {
    tempData.forEach(element => {
        const data = element;
        if (data.username === elements.username.value && data.password === elements.password.value){
            alert("Login successfully with username " + data.username);
            checkUserType(data);
        }
    });
    
}

const checkUserType = (user) => {
    // let xhttp = new XMLHttpRequest();
    console.log("redirecting ...");
    if (user.Type === "CentreOfficer"){
        switch(user.position){
            case "Manager":
                // xhttp.open("GET", windowUrl("Manager/viewManagerTestReport.html"), true);
                // xhttp.send();
                window.location = windowUrl(`Manager/viewManagerTestReport.html?user=${user.username}&check=` + elements.checkRememberUser.checked);
                break;

            case "Tester":
                window.location = windowUrl(`Tester/index.html?user=${user.username}&check=` + elements.checkRememberUser.checked);
                break;
        }
    } else if (user.Type === "Patient"){
        window.location = windowUrl(`Patient/viewTestingHistory.html?user=${user.username}&check=` + elements.checkRememberUser.checked);
    }
}

const windowUrl = (page) => {
   let url =  window.location.href;
   url = url.slice(0, url.indexOf("login.html"));
   url += page;
   return url;
}

setUsername();
