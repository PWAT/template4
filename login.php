<?php
include ('/layout.php');
				
include ('includes/header.php');

if (empty($_REQUEST['req'])) {

   myheader("Login!");
      include ('/html/forms/login_form.html');
   footer();
   }
   else{

switch($_REQUEST['req']){
  
case "validate":
   $validate = @mysql_query("SELECT * FROM members
                 WHERE username='{$_POST['username']}'
                 AND password = md5('{$_POST['password']}')
                 AND verified='1'");
                          
   if(mysql_num_rows($validate) == 1){
      while($row = mysql_fetch_assoc($validate)){
         $_SESSION['login'] = true;
         $_SESSION['userid'] = $row['id'];
         $_SESSION['first_name'] = $row['first_name'];
         $_SESSION['last_name']  = $row['last_name'];
         $_SESSION['email_address'] = $row['email_address'];
        
         if($row['admin_access'] == 1){
            $_SESSION['admin_access'] = true;
         }
         $login_time = mysql_query("UPDATE members
                       SET last_login=now()
                       WHERE id='{$row['id']}'");
       }
       header("Location: loggedin.php");
   } else {
      myheader("Login Failed!");
      echo '<p align="center">Login Failed</p>';
      echo '<p align="center">If you have already joined '.
           'our website, you may need to validate '.
           'your email address. '.
           'Please check your email for instructions.';
	  include ('/html/forms/login_form.html');
      footer();
   }
break;

default:
   myheader("Login!");
      include ('/html/forms/login_form.html');
   footer();
break;
}
}
?>