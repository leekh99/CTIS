const elements= {
    topBtn : document.getElementById("btnTop"),
    search : document.getElementById('btnSearch'),
    renderPatientList : document.querySelector('.patient-list'),
    loginName : document.getElementById('profile-name')
}

        
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = () => {scrollFunction()};

const scrollFunction = () => {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    elements.topBtn.style.display = "block";
  } else {
    elements.topBtn.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
const topFunction = () => {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// Patient List features
// -----------------------------------------

// dummy data


const getInput = () => {elements.search.value};
const clearInput = () => {elements.search.value = ''};

const ClearResults = () => {
    elements.renderPatientList.innerHTML = '';
}

const renderTest =test => {
    return  `<span class="text-info font-weight-bold"> ${test.id}</span>&nbsp; ${test.status} <i class="far fa-clock"></i> &emsp; &emsp;`;
}

const renderPatient = (patient) => {
    const markup = `
    <div class="card shadow">
        <h5 class="card-header"><span class="font-weight-bold">Username :</span>  ${patient.username} 
            <!-- <span class="float-right"><i class="far fa-star" onclick=""></i></span> -->
        </h5>
        <div class="card-body">
        <p class="card-title"><span class="font-weight-bold">Patient-type:</span> ${patient.patientType} </p>
        <p class="card-text"><span class="font-weight-bold">Symptoms:</span></p>
        <blockquote class="px-2">
            <p>${patient.symptoms}</p>
            <footer class="blockquote-footer">${patient.tester}</footer>
        </blockquote>
        </div>
        <ul class="list-group border-top list-group-flush">
        <li class="list-group-item"><span class="font-weight-bold">Covid Test Taken:</span> 
                <p class="py-3">
                    ${patient.tests.map(el => renderTest(el)).join('')}
                </p>

        </li>
        </ul>
        <div class="card-footer">
            <div class="d-flex flex-row justify-content">
                <a href="recordTest.php?patientUsername=${patient.username}" class="card-link btn btn-primary shadow">
                    Record New Test
                </a>
                <a href="updateTest.php" class="card-link btn btn-primary shadow">Update Test Result</a>
            </div>
        </div>
    </div>`;
    

    elements.renderPatientList.insertAdjacentHTML('beforeend', markup);
}

const renderResults = (patient) => {
    
}

const patients = [];




// const checkUser = () =>{
//     localStorage.clear();
//     if (localStorage.length === 0){
//         let url = window.location.href;
//         url = url.slice(url.indexOf("user"), url.length);

//         let user = url.split('&');
//         let check = user[1].replace("check=", "");
//         user = user[0].replace("user=", "");

//         localStorage.setItem('loginUser', JSON.stringify({user,check}));

//         if (user)
//             elements.loginName.innerHTML = user;
//     }
    
//     const user = JSON.parse(localStorage.getItem('loginUser'));
//     if (user)
//         elements.loginName.innerHTML = user.user;
// }



// checkUser();


