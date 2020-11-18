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

    checkUser();