<?php
 require_once "Mail.php";
 
 $from = "admin@test.com, My PHP Site Administrator";
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
		// "You may login at any time ".
		// "at http://$_SERVER['localhost'].'/template3/login.php'\n\n".
		// "Thank You!\n".
		// "My PHP Site Administrator";
 
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
 
 if (@PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 ?>
