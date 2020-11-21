const elements = {
    testAccountForm : document.getElementById('test-form'),
    checkForm : document.getElementById('chkForm'),
    testForm : document.getElementById('account-form'),
    patientUsername : document.getElementById('createUsername'),
    addPatientUsername : document.getElementById('username'),
    patientType : document.getElementById('patientType'),
    switch : document.querySelector('.belowBreadCrumb'),
    allTestKit : document.getElementById('breadcrumbNav')
}


const formToggle = () =>{
    if (elements.checkForm.checked)
        elements.testAccountForm.className = "";     
    else
        elements.testAccountForm.className = "collapse";
}

if (elements.checkForm)
    elements.checkForm.checked = true;

// const checkPatientData = () => {
//     let url = window.location.href;
//     url = url.slice(url.indexOf("patient"), url.length);

//     let patient = url.split('&');
//     let type = patient[1].replace("patientType=", "");
//     patient = patient[0].replace("patientUsername=", "");

//     elements.patientUsername.value = patient;
//     elements.patientType.value = type;
// }

// checkPatientData();

if (elements.patientUsername){
    elements.patientUsername.addEventListener("keyup", event=>{
        elements.patientUsername.setCustomValidity('');
    });
}

if (elements.addPatientUsername){
    elements.addPatientUsername.addEventListener("keyup", event=>{
        elements.addPatientUsername.setCustomValidity('');
    });
}

const renderMessage = (message, success, location) => {
    const successMessage = `
    <h5 class="msg_successfull" id="msg">
        ${message} &emsp;
        <i class="fas fa-check-circle"></i>
    </h5>`;

    const errorMessage = `
    <h5 class="msg_error" id="msg">
        ${message} &emsp;
        <i class="fas fa-times-circle"></i>
    </h5>
    `;

    if (success){
        location === 'testKit' ? elements.allTestKit.insertAdjacentHTML('afterend', successMessage) : 
                                 elements.switch.insertAdjacentHTML('afterbegin', successMessage);
    } else {
        location === 'testKit' ?  elements.allTestKit.insertAdjacentHTML('afterend', errorMessage) : 
                                elements.switch.insertAdjacentHTML('afterbegin', errorMessage);
    }

    setTimeout(clearMessage, 3500);
    if (success)
        setTimeout(() => {
            window.location.href = 'http://localhost/CTIS/Tester/recordTest.php';
        }, 5500);
};

const clearMessage = () => {
    const msg = document.getElementById('msg');

    if (msg){
        msg.parentElement.removeChild(msg);
    }
};



