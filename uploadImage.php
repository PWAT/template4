<?php #Script2.0 - uploadimage.php
		//Check if the form has been submitted
		if(isset($_POST['submitted'])) {
		
		//Check for uploaded file
		if(isset($_FILES['upload'])) {
		
		//Validate the type as jpeg or png
		$allowed = array('image/pjpeg', 'image/jpeg', 'image/JPG'. 'image/PNG', 'image/png', 'image/obj');
		
		if(in_array($_FILES['upload']['type'], $allowed)) {
		
		//Move the file over
		
		if(move_uploaded_file($_FILES['upload']['tmp_name'], "../uploads/{$_FILES['upload']['name']}")) {
			
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