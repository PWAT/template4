<?php
include ('/layout.php');

include ('includes/memberAreaHeader.php');
	
$ptitle = 'Demo project';
$page_header = 'JSON Loader Page';
	
//server timeout time
set_time_limit(5000);
	
?>

<div class="sidebar">
<h3>Log In</h3>
<div id="boxes">

<?php
	
	include ('/boxes/member_box.php');	
						 
	//include ('/boxes/box_admin_links.php');
						 
	//include ('/boxes/box_main_links.php');
?>
</div>
<!-- insert your sidebar items here -->
<h3>Image Files</h3>
<h5><?php echo(gmdate(DATE_RFC822) . "<br />"); ?></h5>
<p>To upload .obj files please save them as .txt file types then upload.</p>
<?php #Script2.0 - uploadimage.php
		//Check if the form has been submitted
		if(isset($_POST['submitted'])) {
		
		//Check for uploaded file
		if(isset($_FILES['upload'])) {
		
		//Validate the type as jpeg or png
		$allowed = array('image/pjpeg', 'image/jpeg', 'image/JPG'. 'image/PNG', 'image/png', 'text/plain', 'Object File/obj');
		
		if(in_array($_FILES['upload']['type'], $allowed)) {
		
		//Move the file over
		
		if(move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/{$_FILES['upload']['name']}")) {
			
			echo "<p><em>The file has been uploaded!</em></p>";
			
			}//End of move If
			
				}
					} //End of isset files upload If
				
				//Check for error
				
				if($_FILES['upload']['error'] > 0) {
				
					echo '<br /><br /><p class="error">Please upload a JPEG or PNG image.  The files could not be uploaded because:<strong>';
					
					//Print a message based on the error
					
					switch($_FILES['upload']['error']) {
					
					case 1:
						print 'The max file exceeds the upload max files size setting in php.ini.';
						break;
					case 2:
						print 'The file exceeds the max file size setting in the html form.';
						break;
					case 3:
						print 'The file was only partially uploaded.';
						break;
					case 4: 
						print 'No file was uploaded.';
						break;
					case 5:
						print 'No tmp folder was available.';
						break;
					case 6:
						print 'Unable to write to disc.';
						break;
					case 7:
						print 'File upload stopped';
						break;
					default:
						print 'A system error occurred.';
						break;
									}//end of switch

							print '</strong></p>';
							
							}//End of error If
							
							//Delete the file if it still exists:
							if(file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
							
								unlink($_FILES['upload']['tmp_name']);
								}
			}//End of submitted conditional
?>
<form enctype="multipart/form-data" action="jsonLoader.php" method="post">

<input type="hidden" name="MAX_FILE_SIZE" value="524288" />

<fieldset><legend>Select a JPEG or PNG image of size 512Kb or smaller to be uploaded</legend>

<p><b>File:</b> <input type="file" name="upload" /></p>

</fieldset>

<div align="center"><input type="submit" name="submit" value="UPLOAD" /></div>
<input type="hidden" name="submitted" value="TRUE" />

</form>	

<h3>Latest News</h3>
<h4>New Website Launched</h4>
<h5><?php echo(gmdate(DATE_RFC822) . "<br />"); ?></h5>
<p>3D and 4D viewer website.<br /><a href="#">Read more</a></p>
<p></p>
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
</div>
<div id="content">
<!-- insert the page content here -->
<center><h1>Loading a Model in Three.js JSON Format</h1></center>
<div id="container" style="width:70%; height:70%; position:absolute;"></div>
<div id="prompt" style="width:95%; height:6%; bottom:30px; text-align:center; position:absolute;">
Click the mouse to manipulate the model: Left = rotate, Right = Pan
</div>				
</div>
</div>
<?php
	include ('includes/footer.php');
?>
