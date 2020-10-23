const elements = {
  piechart : document.getElementById('piechart'),
  linechart : document.getElementById('linechart'),
  barchart : document.getElementById('barchart'),
  loginName : document.getElementById('profile-name')
}


   // Load the Visualization API and the corechart package.
   google.charts.load('current', {'packages':['corechart']});
   google.charts.load("current", {packages: ["bar"]});
   google.charts.load("current", {packages: ["line"]});



   // Set a callback to run when the Google Visualization API is loaded.
   google.charts.setOnLoadCallback(drawPatientChart);
   google.charts.setOnLoadCallback(drawResultChart);

   // Callback that creates and populates a data table,
   // instantiates the pie chart, passes in the data and
   // draws it.
   function drawPatientChart() {

     // Create the data table.
     var data = new google.visualization.DataTable();
     data.addColumn('string', 'PatientType');
     data.addColumn('number', 'No. of patients');
     data.addRows([
       ['Suspected', 3],
       ['Infected', 3],
       ['Quarantined', 5],
       ['Returnee', 8]
     ]);

     // Set chart options
     var options = {'title':'Percentages of Patients by Types'};

     // Instantiate and draw our chart, passing in some options.
     var piechart = new google.visualization.PieChart(elements.piechart);
     var linechart = new google.charts.Line(elements.linechart);
     var barchart = new google.charts.Bar(elements.barchart);

     barchart.draw(data,options);
     piechart.draw(data, options);
     linechart.draw(data, options);

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


  checkUser();