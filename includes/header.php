<?php
include_once ('/classes/clsMetaContent.php');

$meta = new Meta;
$meta->company_name = "My Company";
$meta->description = "This is my first PHP enabled website.";
$meta->keywords2 = "PHP, MySQL, Web Development";
$meta->sitename = "My PHP Site";
$meta->slogan = "Be patient, I'm learning!";
$meta->generator = "PHP";
$ptitle = "";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>

<title><?php echo $meta->metadata($ptitle); ?></title>

<link rel="stylesheet" type="text/css" href="style/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<div id="main">
	<div id="header">
		<div id="logo">
			<div id="logo_text">
				<!-- class="logo_colour", allows you to change the colour of the text -->
				<h1><a href="index.html">3D and 4D Web Browser<span class="logo_colour">Analysis</span></a></h1>
				<h2>using 3D and 4D model viewing applications.</h2>
			</div>
		</div>
		<div id="menubar">
			<ul class="arrowunderline">	
			</ul>
		</div>
	</div>
<div id="content_header"></div>
<div id="site_content"><!--Start of page specific content-->
<!--Script 1.1 - header.html-->