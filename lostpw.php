<?php
include ('/layout.php');
@require_once "mail.php";
include ('includes/header.php');
$newpass = '';
if (empty($_REQUEST['req'])) {
    
    include ('/html/forms/lostpw_form.html');
  
   }
   else{
       
switch($_REQUEST['req']){
	case "recover":
		 myheader("Reset Password");
		 $sql = mysql_query("SELECT * FROM members WHERE
						email_address = '{$_POST['email_address']}'");
		 if(mysql_num_rows($sql) == 1){
				while($row = mysql_fetch_assoc($sql)){
					 $alphanum = "abchefghjkmnpqrstuvwxyz0123456789";
					 for($i=0; $i <= 10; $i++) {
										$num = rand() % 33;
										$tmp = substr($alphanum, $num, 1);
									    $newpass = $newpass .$tmp;
					 }
					 $update = mysql_query("UPDATE members
										SET password = '".md5($newpass)."'
										WHERE id='{$row['id']}'");
					 stripslashes(extract($row));
				}
				if(!$update){
					 echo '<p align="center">Password Could '.
								'not be reset! Sorry!</p>';
				 } else {
					 echo '<p align="center">Password Reset! '.
								'Please check your email for your new'.
								'password.</p>';
							 
				include ('html/forms/login_form.html');
					
				 
				 $from = "Student Admin";
				 $to = $email_address;
				 $subject = "New Password For My PHP Site";
				 $body = "Dear $first_name,\n\n".
						"You have requested a new ".
						"password for My PHP Site. ".
						"Below is your new login ".
						"informaiton:\n\n".
						"=====================\n".
						"Username: $username\n".
						"New Password: $newpass\n".
						"=====================\n\n";
						 "You may login at any time ".
						 "at http://dunluce.infc.ulst.ac.uk/d10tw/COM570/template4/login.php'\n\n".
						 "Thank You!\n".
						 "My PHP Site Administrator";
				 
				 $host = "ssl://martello.infc.ulst.ac.uk";
				 $port = "465";
				 $username = "projectmail";
				 $password = "Fx6yzq49";
				 
				 $headers = array ('From' => $from,
				   'To' => $to,
				   'Subject' => $subject);
				 $smtp = @Mail::factory('smtp',
				   array ('host' => $host,
					 'port' => $port,
					 'auth' => true,
					 'username' => $username,
					 'password' => $password));
				 
				 $mail = @$smtp->send($to, $headers, $body);
				 
				 if (@PEAR::isError($mail)) {
				   echo("<p>" . $mail->getMessage() . "</p>");
				  } else {
				   echo("<p>Message successfully sent!</p>");
				  }													 
														
				}
		 } else {
				echo '<p align="center">We could not find '.
						 'any matches for that email address! '.
						 'Please try again!</p>';
		 }
		 footer();
	break;

	default:		 
		 include ('/html/forms/lostpw_form.html');		
	break;
	
	}
}	
?>