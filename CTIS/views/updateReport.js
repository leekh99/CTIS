const elements = {
    btnGenerate : document.getElementById('btnGenerate'),
    testDetails : document.getElementById('testDetails'),
    testSuccess : document.getElementById('covidTestDetails-success'),
    testError : document.getElementById('covidTestDetails-fail')
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
    setTimeout(clearLoader, 2500);
};

const clearLoader = () => {
    const loader = document.querySelector('.loader');
    if (loader){
        loader.parentElement.removeChild(loader);
    }
   updateResults(true);
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




