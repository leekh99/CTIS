const elements = {
    promptTestCentre : document.querySelector(".prompt"),
    testCentreDetails : document.querySelector(".testCenterDetails")
}


const renderLoader = () =>{
    elements.promptTestCentre.innerHTML = '';
    const loader = `
        <div class = "loader">
            <img src="../img/loading.gif" alt="loading">
        </div>
    `;
    elements.promptTestCentre.insertAdjacentHTML('afterbegin',loader);
    setTimeout(clearLoader, 2500);
};

const clearLoader = () => {
    const loader = document.querySelector('.loader');
    if (loader){
        loader.parentElement.removeChild(loader);
    }
    register();
};


const register = () => {
    elements.testCentreDetails.className = "testCenterDetails";
}