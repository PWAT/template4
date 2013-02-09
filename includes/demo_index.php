<?php #Script 1.3 - index.php

$ptitle = 'Demo Client Side Ajax project';

include ('includes/header.php');
//server timeout time
set_time_limit(5000);
?>  
  <script src="javascripts/Three.js"></script>
  <script src="javascripts/plane.js"></script>
  <script src="javascripts/thingiview.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js"></script>
  <script>
    window.onload = function() {
      // You may want to place these lines inside an onload handler
      CFInstall.check({
        mode: "inline", // the default
        node: "prompt"
      });

      thingiurlbase = "javascripts";
      thingiview = new Thingiview("viewer");
      thingiview.setObjectColor('#C0D8F0');
      thingiview.initScene();
    }
    
    function getUrlVars() {
    	var vars = {};
    	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    		vars[key] = value;
    	});
    	return vars;
    }    
  </script>

 <div class="sidebar">
	<!-- insert your sidebar items here -->
	<h3>Log In</h3>
				 <div id="boxes">
					 <?php						 
						 include ('/boxes/member_box.php');	
						 
						 //include ('/boxes/box_admin_links.php');
						 
						 //include ('/boxes/box_main_links.php');
					 ?>
				 </div>
<h3>OBJ Files</h3>
	<ul>
		<li><a href="#" onclick="thingiview.loadOBJ('../images/Philip/Philip_003_00.obj')">render at 100%</a> </li>
		<li><a href="#" onclick="thingiview.loadOBJ('../images/Philip30/Philip_003_00.obj')">render at 30%</a> </li>
		<li><a href="#" onclick="thingiview.loadOBJ('../images/Philip40/Philip_003_00.obj')">render at 40%</a> </li>		
		<li><a href="#" onclick="thingiview.loadOBJ('../images/Philip50/Philip_003_00.obj')">render at 50%</a> </li>
		<li><a href="#" onclick="thingiview.loadOBJ('../images/walt_small.obj')">render Walt</a> </li>
	</ul>
<h3>Useful Links</h3>
	<ul>
		<li><a href="http://dev.opera.com/articles/view/an-introduction-to-webgl/">Opera webGL</a></li>
		<li><a href="https://developer.mozilla.org/en-US/docs/WebGL">Mozilla webGL</a></li>
		<li><a href="http://www.kadrmasconcepts.com/blog/2012/01/24/from-blender-to-threefab-exporting-three-js-morph-animations/">JSON export</a></li>
	</ul>
<h3>Search</h3>
	<form method="post" action="#" id="search_form">
		<p>
			<input class="search" type="text" name="search_field" value="Enter keywords....." />
			<input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
		</p>
	</form>
<br /><a href="#">Read more</a>
<h5>October 1st, 2012</h5>
<p>2011 sees the redesign of our website.<br /><a href="#">Read more</a></p>
</div> 

<div id="content">

<div id="prompt">
  <!-- if IE without GCF, prompt goes here -->
</div>
        <!-- insert the page content here --> 
	<h1>Welcome to the 3D and 4D web browser analysis site.</h1>
    <p>  The aim of this project is to investigate by protoyping then rapid implementation 
	the performance of the browser with webGL when rendering 4D image data.  WebGL is an 
	immediate mode 3D rendering API designed for the web.  It provides additional rendering context 
	and support objects for the HTML5 canvas element.</p>
    <p>  WebGL is encapsulated within the Three.js javascript API enable rendering and viewing of 3D 
	and 4D mesh models in the modern web browser using just the one standard API.</p>
	
  Rotation: <input onclick="thingiview.setRotation(true);" type="button" value="on" /> | <input onclick="thingiview.setRotation(false);" type="button" value="off" />
</p>

    <div id="viewer" style="width:100%;height:400px"></div>

<p>
  <input onclick="thingiview.setObjectMaterial('wireframe');" type="button" value="Wireframe" /> 
  <input onclick="thingiview.setObjectMaterial('solid');" type="button" value="Solid" />
</p>
<br />
<p>  This standards compliant, simple, fixed width website template is released as an 'open source' design (under a <a href="http://creativecommons.org/licenses/by/3.0">Creative Commons Attribution 3.0 Licence</a>), which means that you are free to download and use it for anything you want.</p>
<p>

</div>
</div>
<?php
include ('includes/footer.php');
?>
