<?php
if(!isset($_SESSION))
{
    session_start();
}

include_once("db.php");
if(isset($_POST['registerTC']) && ($_POST['testCentre_name']!="")){

  $testcentreCheck = "select * from testcentre WHERE testcentre.centreName='".$_POST['testCentre_name']."'";
  $testCentreCheckRow = mysqli_num_rows(mysqli_query($con,$testcentreCheck));

  if ($testCentreCheckRow>0){
    echo '<script>alert("That Test Centre already exists!")</script>';
  }
  else{
    $testCentreInsertSql="INSERT INTO `testcentre` (`centreName`) VALUES ('".$_POST['testCentre_name']."')";
    mysqli_query($con,$testCentreInsertSql);
    $_SESSION['message']="New Test Centre Added!";
  }
}
 ?>
