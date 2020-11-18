const elements = {
    testAccountForm : document.getElementById('test-form'),
    checkForm : document.getElementById('chkForm'),
    patientUsername : document.getElementById('focusDefaultUsername'),
    patientType : document.getElementById('patientType')
}


const formToggle = () =>{
    if (elements.checkForm.checked)
        elements.testAccountForm.className = "";     
    else
        elements.testAccountForm.className = "collapse";
}

elements.checkForm.checked = true;

const checkPatientData = () => {
    let url = window.location.href;
    url = url.slice(url.indexOf("patient"), url.length);

    let patient = url.split('&');
    let type = patient[1].replace("patientType=", "");
    patient = patient[0].replace("patientUsername=", "");

    elements.patientUsername.value = patient;
    elements.patientType.value = type;
}

checkPatientData();