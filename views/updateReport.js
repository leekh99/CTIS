const elements = {
    btnGenerate : document.getElementById('btnGenerate'),
    testDetails : document.getElementById('testDetails'),
    testSuccess : document.getElementById('covidTestDetails-success'),
    testError : document.getElementById('covidTestDetails-fail'),
    generateForm : document.getElementById('generateForm'),
    inputTestID : document.getElementById('inputTestID'),
    displayInputMessage : document.getElementById('displayMessage')
}


const renderLoader = () =>{
    elements.testError.className = "invisible";
    elements.testSuccess.className = "invisible";
    const loader = `
        <div class = "loader">
            <img src="../img/loading.gif" alt="loading">
        </div>
    `;
    elements.testDetails.insertAdjacentHTML('afterbegin',loader);
    elements.btnGenerate.disabled = true;
    elements.btnGenerate.style.pointerEvents = "none";
};

const clearLoader = (success) => {

    const loader = document.querySelector('.loader');
    setTimeout(() => {
        if (loader){
            loader.parentElement.removeChild(loader);
        }
        updateResults(success);
    }, 2000);
};

const updateResults = (valid) => {
    elements.btnGenerate.disabled = false;
    elements.btnGenerate.style.pointerEvents = "";
    if (valid){
        elements.testSuccess.className = "";
    }
    else {
        elements.testError.className = "visible";
        elements.testSuccess.className = "collapse";
    }
}

const clearForm = () =>{
    elements.testSuccess.className = "collapse"
}


const renderMessage = (message, success) => {
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

    if (success)
        elements.generateForm.insertAdjacentHTML('afterbegin', successMessage);
    else 
        elements.generateForm.insertAdjacentHTML('afterbegin', errorMessage);


    setTimeout(clearMessage, 3500);
    if (success)
        setTimeout(() => {
            window.location.href = 'http://localhost/CTIS/Tester/updateTest.php';
        }, 3500);
};

const clearMessage = () => {
    const msg = document.getElementById('msg');

    if (msg){
        msg.parentElement.removeChild(msg);
    }
};

elements.inputTestID.addEventListener("keyup", event=>{
    const input = elements.inputTestID.value;
    ///^\d+$/
    if (input.match(/(CT){1}\d+$/)){
        elements.btnGenerate.disabled = false;
        elements.inputTestID.setCustomValidity('');
        elements.displayInputMessage.innerHTML = "";

    }
    else {
        elements.btnGenerate.disabled = true;
        elements.inputTestID.setCustomValidity('Please enter a valid test ID');
        elements.displayInputMessage.innerHTML = "Please enter a valid test ID such as CT1 or CT32";
    }
        
});








