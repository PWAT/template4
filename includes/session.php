<?php
session_start();
session_name('MyPHPSite');
header("Cache-control: private"); // Fix for IE;

function login_check(){
    if($_SESSION['login'] != TRUE){
      myheader("Login Required!");
      include ('/html/forms/login_form.html');
      footer();
      exit();
    }
}

function admin_check(){
    if(!isset($_SESSION['admin_access'])){
      myheader("Access Denied!");
       echo "<center>This area is restricted".
            " for website administrators!";
      footer();
      exit();
    }
  }
//}
?>