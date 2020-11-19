<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if(isset($_SESSION['errormessage'])&&$_SESSION['errormessage']!=""){
  echo("<div class='alert alert-danger alert-dismissible fade show m-0' role='alert'>".
  $_SESSION['errormessage']."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>");
  $_SESSION['errormessage']="";
}
?>