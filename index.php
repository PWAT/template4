<?php
// include the layout file
include ('/layout.php');

// Use the myheader function from layout.php
//myheader("Welcome to my website");

// Include the welcome html page.
//include $_SERVER['DOCUMENT_ROOT'].'/template4/html/index_page.html';

include ('/includes/demo_index.php');

// Include membership sign up
//include $_SERVER['DOCUMENT_ROOT'].'/template3/html/forms/membership_signup.html';

// Use the footer function from layout.php
footer();
?>