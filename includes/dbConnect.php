<?php
  $dbServer="localhost";
  $dbUsername="d10tw";
  $dbPassword="skhfgz";
  $databaseName="d10tw_projectdb"; 
  $dbHost="";  
   
   $db=mysql_connect("$dbHost","$dbUsername","$dbPassword");
   mysql_select_db($databaseName,$db);
?>