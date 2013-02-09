<?php
include ('/layout.php');

include ('includes/header.php');

$email_error = false;
$password_error = false;
$error = false;
$errors = false;
$email_address = "";

if (empty($_REQUEST['req'])) {
    
    include ('/html/forms/membership_signup.html');
  
   }
   else{
   
switch($_REQUEST['req']){
	case "process":
	   myheader("Become a Member: Step 2");

	   // Validate all required fields were posted
	   if(!$_POST['first_name'] ||
		  !$_POST['last_name'] ||
		  !$_POST['email_address'] ||
		  !$_POST['email_address2'] ||
		  !$_POST['username'] ||
		  !$_POST['password'] ||
		  !$_POST['password2'] ||
		  !$_POST['bio']){
			
			 $errors .= "<strong>Form Input Errors:".
						"</strong>\n\n";
			 $error = true;
			
			 if(!$_POST['first_name']){
				$errors .= "Missing First Name\n";
			 }
			
			 if(!$_POST['last_name']){
				$errors .= "Missing Last Name\n";
			 }
		   
			 if(!$_POST['email_address']){
				$errors .= "Missing Email Address\n";
				$email_error = true;
			 }
			
			 if(!$_POST['email_address2']){
				$errors .= "Missing Email ".
						   "Address Verification\n";
				$email_error = true;
			 }
			
			 if(!$_POST['username']){
				$errors .= "Missing Username\n";
			 }
			
			 if(!$_POST['password']){
				$errors .= "Missing Password\n";
				$password_error = true;
			 }
			
			 if(!$_POST['password2']){
				$errors .= "Missing Password Verification\n";
				$password_error = true;
			 }
			
			 if(!$_POST['bio']){
				$errors .= "Missing Information About Yourself\n";
			 }
	   }
	  
	   // If both emails were posted, validate they match.
	   if($email_error == false){
			 if($_POST['email_address'] !=
					  $_POST['email_address2']){
				$error = true;
				$errors .= "Email addresses do not match!\n\n";
				$email_error = true;
			 }
	   }
	  
	   // If both passwords were posted, validate they match.
	   if($password_error == false){
			 if($_POST['password'] != $_POST['password2']){
				$error = true;
				$errors .= "Passwords do not match!\n\n";
				$password_error = true;
			 }
	   }
	 
	   // Verify if username already exists.
	   $ucount = mysql_result(mysql_query("SELECT COUNT(*)
					  AS ucount FROM members
					  WHERE username =
					  '{$_POST['username']}'"),0);

	   // If username exists, generate error and message.  
	   if($ucount > 0){
		  $error = true;
		  $errors .= "Username already exists, ".
					 "please choose another.\n\n";
	   }
	  
	   if($email_error == false){
		  // Verify if email address has been used already.
		  $ecount = mysql_result(mysql_query("SELECT COUNT(*)
						 AS ecount FROM members
						 WHERE email_address =
						 '{$_POST['email_address']}'"),0);
		
		  // If username exists, generate error and message.  
		  if($ecount > 0){
			 $error = true;
			 $errors .= "This email address has already ".
						"been used ".
						"please choose another.\n\n";
		  }
	   }
	  
	   // If $error is TRUE, then include the singup form
	   // and display the errors we found.
	  
	   if($error == true){
		  $errors = nl2br($errors);
		  include ('/html/forms/membership_signup.html');
		  footer();
		  exit();
	   }
	  
	   // All checks have passed, insert user in database
	   $sql = @mysql_query("INSERT INTO members (first_name,
						 last_name, email_address, signup_date,
						 bio, username, password)
						 VALUES ('$_POST[first_name]',
								 '$_POST[last_name]',
								 '$_POST[email_address]', 
								 now(),
								 '$_POST[bio]',
								 '$_POST[username]',
								 '".md5($_POST['password'])."'
								 )");
															 
	   if(!$sql){
		  echo "Error inserting your information into MySQL: ".mysql_error();
		  footer();
		  exit();
				}
						
	   $userid = mysql_insert_id();
	   $verify_url = "http://dunluce.infc.ulst.ac.uk/d10tw/COM570/".
					"/template4/join.php?req=verify&id=$userid&vcode=".
					 md5($_POST['first_name']);
	  
	   $mailer = new Email; 
		  
	   // Email user
	   $from = "Student Admin";
	   $to = $email_address;
	   $subject = "New Password For My PHP Site";
	   $body = "Dear $_POST[first_name],\n".
		  "Thanks for joining our website! We".
		  " welcome you and look forward to".
		  " your participation.\n\n".
		  "Below you will find the ".
		  "information required to ".
		  "Login to our website!\n\n".
		  "First, you will need to verify".
		  " your email address ".
		  "by clicking on this ".
		  "hyperlink:\n$verify_url\nand ".
		  "following the directions in your ".
		  " web browser.\n\n".
		  "=====================\n".
		  "Username: $_POST[username]\n".
		  "Password: $_POST[password]\n".
		  "UserID: $userid\n".
		  "Email Address: ".
		  "$_POST[email_address]\n".
		  "=====================\n\n".
		  "Thank you,\n".
		  "My PHP Site Administrator\n";
						   
		 $host = "ssl://martello.infc.ulst.ac.uk";
		 $port = "465";
		 $username = "projectmail";
		 $password = "Fx6yzq49";
		 
		 $headers = array ('From' => $from,
		   'To' => $to,
		   'Subject' => $subject);
		 $smtp = Mail::factory('smtp',
		   array ('host' => $host,
			 'port' => $port,
			 'auth' => true,
			 'username' => $username,
			 'password' => $password));
		 
		 $mail = $smtp->send($to, $headers, $body);
		 
		 $mailer->SendMail();
		 
		 if (PEAR::isError($mail)) {
		   echo("<p>" . $mail->getMessage() . "</p>");
		  } else {
		   echo("<p>Message successfully sent!</p>");
		  }   
					  
	   // Email Admin
	   $from = "Student Admin";
	   $to = "teague-p1@email.ulster.ac.uk";
	   $subject = "New Password For My PHP Site";
	   $body = "Hi,\n\n".
		  "A new member has just signed up ".
		  "at My PHP Site! Here's their ".
		  " information:\n\n".
		  "=====================\n".
		  "First Name: $_POST[first_name]\n".
		  "Last Name: $_POST[last_name]\n".
		  "Email Address: ".
		  "$_POST[email_address]\n".
		  "UserID: $userid\n".
		  "=====================\n\n".
		  "Thank you,\n".
		  "My PHP Site Administrator\n";
		   
		  
		 $host = "ssl://martello.infc.ulst.ac.uk";
		 $port = "465";
		 $username = "projectmail";
		 $password = "Fx6yzq49";
		 
		 $headers = array ('From' => $from,
		   'To' => $to,
		   'Subject' => $subject);
		 $smtp = Mail::factory('smtp',
		   array ('host' => $host,
			 'port' => $port,
			 'auth' => true,
			 'username' => $username,
			 'password' => $password));
		 
		 $mail = $smtp->send($to, $headers, $body);
		 
		 $mailer->SendMail();
		 
		 if (PEAR::isError($mail)) {
		   echo("<p>" . $mail->getMessage() . "</p>");
		  } else {
		   echo("<p align=\"center\">Message successfully sent!</p>");
		  }		   
	   
	   // Display Success Message
	   echo '<p align="center"><font size="4" '.
			'face="Verdana, Arial, Helvetica, sans-serif">'.
			'<strong>Your Signup Was Successful!'.
			'</strong></font></p>'.
			'<p align="center"><font size="4" '.
			'face="Verdana, Arial, Helvetica, sans-serif">'.
			'Please check your email for instructions.'.
			'</font></p>';
	   // That's it! Done!
	break;

	case "verify":
	   myheader("Verify Information");
	  
	   // Perform MysQL Query:
	   $sql = mysql_result(mysql_query("SELECT COUNT(*)
						   AS vcount FROM members WHERE
						   id='{$_GET['id']}' AND
						   md5(first_name) = '{$_GET['vcode']}'
						   "),0);
	 
	   if($sql == 1){
		  $update = mysql_query("UPDATE members SET
								verified='1' WHERE
								id='{$_GET['id']}'");
		  if(!$update){
			 echo "Error with MySQL Query: ".mysql_error();
		  } else {
			 echo '<p align="center"><font size="4" '.
			 'face="Verdana, Arial, Helvetica, sans-serif">'.
			 '<strong>You Have Been Verified!'.
			 '</strong></font></p>';
			 include ('/html/forms/login_form.html');
		  }
	   } else {
		  echo "Sorry, Could not be verified!";
	   }
	   footer();
	break;

   default:
      myheader("Become a Member!");
      include ('/html/forms/membership_signup.html');
      footer();
   break;
	}
}
?>