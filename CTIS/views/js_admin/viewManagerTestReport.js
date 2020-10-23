const elements = {
    piechart : document.getElementById('piechart'),
    linechart : document.getElementById('linechart'),
    barchart : document.getElementById('barchart'),
    loginName : document.getElementById('profile-name'),
    sort : document.getElementById('sortBy'),
    testTableRow : document.getElementById('testTableRow')
  }
  
  
     // Load the Visualization API and the corechart package.
     google.charts.load('current', {'packages':['corechart']});
     google.charts.load("current", {packages: ["bar"]});
     google.charts.load("current", {packages: ["line"]});
  
  
  
     // Set a callback to run when the Google Visualization API is loaded.
     google.charts.setOnLoadCallback(drawChart);
  
     // Callback that creates and populates a data table,
     // instantiates the pie chart, passes in the data and
     // draws it.
     function drawChart() {
  
       // Create the data table.
       var data = new google.visualization.DataTable();
       data.addColumn('string', 'Topping');
       data.addColumn('number', 'Slices');
       data.addRows([
         ['Mushrooms', 3],
         ['Onions', 1],
         ['Olives', 1],
         ['Zucchini', 1],
         ['Pepperoni', 2]
       ]);
  
       // Set chart options
       var options = {'title':'How Much Pizza I Ate Last Night'};
  
       // Instantiate and draw our chart, passing in some options.
       var piechart = new google.visualization.PieChart(elements.piechart);
       var linechart = new google.charts.Line(elements.linechart);
       var barchart = new google.charts.Bar(elements.barchart);
       piechart.draw(data, options);
       linechart.draw(data, options);
       barchart.draw(data,options);
     }

const checkUser = () =>{
    localStorage.clear();
    if (localStorage.length === 0){
        let url = window.location.href;
        url = url.slice(url.indexOf("user"), url.length);

        let user = url.split('&');
        let check = user[1].replace("check=", "");
        user = user[0].replace("user=", "");

        localStorage.setItem('loginUser', JSON.stringify({user,check}));

        if (user)
            elements.loginName.innerHTML = user;
    }

    const user = JSON.parse(localStorage.getItem('loginUser'));
    if (user)
        elements.loginName.innerHTML = user.user;
}

// const covidTest1 = {
//   covidTestID : "CT1",
//   recipient : "Matthew",
//   tester : "Dr.Lee",
//   testType : "Antigen",
//   testDate : "21/20/2020",
//   result : "Negative",
//   resultDate : "22/10/2020",
//   status : "Completed"
// }

// const covidTest2 = {
//   covidTestID : "CT12",
//   recipient : "Amber",
//   tester : "Dr.Tan",
//   testType : "Rapid Detection",
//   testDate : "23/10/2020",
//   result : "-",
//   resultDate : "23/10/2020",
//   status : "Pending"
// }

// const covidTest3 = {
//   covidTestID : "CT3",
//   recipient : "Jean",
//   tester : "Dr.Han",
//   testType : "Molecular",
//   testDate : "17/10/2020",
//   result : "Positive",
//   resultDate : "19/10/2020",
//   status : "Completed"
// }

// const data = [covidTest1,covidTest2,covidTest3];


// const compareByCovidTestID = (lhs,rhs) => {
//   const idLhs = lhs.slice(2, lhs.length);
//   const idRhs = rhs.slice(2, rhs.length);

//   if (idLhs < idRhs)
//     return -1;
//   else if (idLhs > idRhs)
//     return 1;
//   else 
//     return 0;
// }

// const renderRowTable = (testData) => {
//   const markup = `
//   <tr>
//     <th scope="row">${testData.covidTestID}</th>
//     <td>${testData.recipient}</td>
//     <td>${testData.tester}</td>
//     <td>${testData.testType}</td>
//     <td>${testData.testDate}</td>
//     <td>${testData.result}</td>
//     <td>${testData.resultDate}</td>
//     <td>${testData.status}</td>
//   </tr>
//   `;

//   elements.tester.insertAdjacentHTML('beforeend', markup);
// }

// const sorting = () => {
//   console.log("sorting ...");
//   console.log(elements.sort.value);
//     if (elements.sort.value === "CovidTestID"){
   
//       data.sort(compareByCovidTestID());
//       data.forEach(element => {
//         renderRowTable(element);
//       });
//     }
// }
    
checkUser();