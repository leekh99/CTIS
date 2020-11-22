<?php 
global $connection;
$username = $_SESSION['username'];

$queryComplete = "SELECT * FROM covidtest WHERE recipient = '$username' AND status = 'complete'";
$complete_result = mysqli_query($connection,$queryComplete);

$queryPending ="SELECT * FROM covidtest WHERE recipient = '$username' AND status = 'pending'";
$pending_result = mysqli_query($connection, $queryPending);

$queryNegative ="SELECT * FROM covidtest WHERE recipient = '$username' AND result = 'negative'";
$negative_result = mysqli_query($connection, $queryNegative);

$queryPositive ="SELECT * FROM covidtest WHERE recipient = '$username' AND result = 'positive'";
$positive_result = mysqli_query($connection, $queryPositive);



?>

<script>
const elements = {
    piechart : document.getElementById('piechart'),
    barchart : document.getElementById('barchart'),
    loginName : document.getElementById('profile-name')
  }
  
  
     // Load the Visualization API and the corechart package.
     google.charts.load('current', {'packages':['corechart']});
     google.charts.load("current", {packages: ["bar"]});
  
  
  
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
         ['Complete', <?php echo $complete_result->num_rows?>],
         ['Pending', <?php echo $pending_result->num_rows?>]
       ]);


       var result = new google.visualization.DataTable();
       result.addColumn('string', 'Topping');
       result.addColumn('number', 'Status');
       result.addRows([
         ['Negative', <?php echo $negative_result->num_rows?>],
         ['Positive', <?php echo $positive_result->num_rows?>]
       ]);


  
       // Set chart options
       var options = {'title':'Test Results recorded'};
       var optionStatus = {'title':'Latest status being updated'};
  
       // Instantiate and draw our chart, passing in some options.
       var piechart = new google.visualization.PieChart(elements.piechart);
       var barchart = new google.charts.Bar(elements.barchart);
       piechart.draw(data, optionStatus);
       barchart.draw(result,options);
     }


    //  const checkUser = () =>{
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
</script>