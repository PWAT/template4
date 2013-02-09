<?php
include ('/layout.php');

include ('includes/header.php');

if (empty($_REQUEST['req'])) {

    myheader("Logout");
      echo '<p align="center">Are You Sure '.
           'you want to logout?</p>'.
           '<p align="center">'.
           '<a href="http://dunluce.infc.ulst.ac.uk/d10tw/COM570/template4/logout.php?req=logout">Yes</a>'.
           ' | <a href="javascript:history.back()">No</a>'.
           '</p>';
    footer();
   }
   else{
   
switch($_REQUEST['req']){
   case "logout":
      session_destroy();
      header("Location: logout.php?req=loggedout");
   break;
  
   case "loggedout":
      myheader("Logout");
      echo '<p align="center">You are now logged out!</p>';
	  echo '<p align="center"><a href="http://dunluce.infc.ulst.ac.uk/d10tw/COM570/template4/index.php">Return to the Home Screen</a></p><br />';
      footer();
   break;
  
   default:
      myheader("Logout");
      echo '<p align="center">Are You Sure '.
           'you want to logout?</p>'.
           '<p align="center">'.
           '<a href="http://dunluce.infc.ulst.ac.uk/d10tw/COM570/template4/logout.php?req=logout">Yes</a>'.
           ' | <a href="javascript:history.back()">No</a>'.
           '</p>';
      footer();
   break;
	}
}

?>