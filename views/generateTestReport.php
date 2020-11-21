<?php 
global $connection;

$queryReturnee = "SELECT * FROM patient WHERE patientType = 'returnee'";
$returnee_result = mysqli_query($connection,$queryReturnee);

$queryQuarantine = "SELECT * FROM patient WHERE patientType = 'quarantined'";
$quarantine_result = mysqli_query($connection,$queryQuarantine);

$queryCloseContact = "SELECT * FROM patient WHERE patientType = 'close_contact'";
$closeContact_result = mysqli_query($connection,$queryCloseContact);

$queryInfected = "SELECT * FROM patient WHERE patientType = 'infected'";
$infected_result = mysqli_query($connection, $queryInfected);

$querySuspected ="SELECT * FROM patient WHERE patientType = 'suspected'";
$suspect_result = mysqli_query($connection, $querySuspected);

$queryStatus ="SELECT * FROM covidtest WHERE status = 'pending'";
$status_result = mysqli_query($connection, $queryStatus);

$queryComplete ="SELECT * FROM covidtest WHERE status = 'complete'";
$complete_result = mysqli_query($connection, $queryComplete);

?>


<script>
const elements = {
  piechart : document.getElementById('piechart'),
  linechart : document.getElementById('linechart'),
  barchart : document.getElementById('barchart')
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
       ['15/11/20', 3],
       ['16/11/20', 5],
       ['17/11/20', 10],
       ['18/11/20', 15],
       ['19/11/20', 17]
     ]);

     var patientType = new google.visualization.DataTable();
     patientType.addColumn('string', 'Topping');
     patientType.addColumn('number', 'Slices');
     patientType.addRows([
       ['Returnee', <?php echo $returnee_result->num_rows?>],
       ['Quarantined', <?php echo $quarantine_result->num_rows?>],
       ['Close_contact', <?php echo $closeContact_result->num_rows?>],
       ['Infected', <?php echo $infected_result->num_rows?>],
       ['Suspected', <?php echo $suspect_result->num_rows?>]
     ]);


     var testStatus = new google.visualization.DataTable();
     testStatus.addColumn("number",'Pending', <?php echo $status_result->num_rows?>);
     testStatus.addColumn("number",'Complete', <?php echo $complete_result->num_rows?>)
     
     var testStatus = google.visualization.arrayToDataTable([
          ['Status', 'Num of Status'],
          ['Complete',<?php echo $status_result->num_rows?>],
          ['Pending', <?php echo $complete_result->num_rows?>]
        ]);


     // Set chart options
     var options = {'title':'How Much Pizza I Ate Last Night'};
     var ptOptions = {'title':'Number of Patient Types'};
     var statusOptions = {
            'title':'Number of Covid Test status',
            colors: ['#b0120a'],
     };


     // Instantiate and draw our chart, passing in some options.
     var piechart = new google.visualization.PieChart(elements.piechart);
     var linechart = new google.charts.Line(elements.linechart);
     var barchart = new google.charts.Bar(elements.barchart);
     piechart.draw(patientType, ptOptions);
     linechart.draw(data, options);
     barchart.draw(testStatus,statusOptions);
   }
</script>

  




