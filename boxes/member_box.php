
<?php
if (isset($_SESSION['login']) && ($_SESSION['login'] == true)){
   // show logout hyperlinks
	echo '- Welcome '.$_SESSION['first_name'].'!<br />';
	echo '<br />';
	echo '- <a href="http://dunluce.infc.ulst.ac.uk/d10tw/COM570/template4/jsonLoader.php">Member\'s Area</a><br />';
	echo '<br />';
	echo '- <a href="http://dunluce.infc.ulst.ac.uk/d10tw/COM570/template4/logout.php">Logout</a>';
	} else {
	// show login form
		echo '<a href="http://dunluce.infc.ulst.ac.uk/d10tw/COM570/template4/login.php">Member Login</a><br />';
		echo '<br />'; 
		echo '<a href="http://dunluce.infc.ulst.ac.uk/d10tw/COM570/template4/lostpw.php">Lost Password?</a><br />';
		echo '<br />';
		echo '<a href="http://dunluce.infc.ulst.ac.uk/d10tw/COM570/template4/join.php">Membership Sign Up</a>';
}
?>
  
 
