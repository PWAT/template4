<?php
include ('/layout.php');

include ('includes/memberAreaHeader.php');

//server timeout time
set_time_limit(5000);
?> 
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
        <h3>Latest News</h3>
        <h4>New Website Launched</h4>
        <h5><?php echo(gmdate(DATE_RFC822) . "<br />"); ?></h5>
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
        <h1>A Video Player Page</h1>
				<iframe width="420" height="315" src="http://www.youtube.com/embed/pU7dbd5zT7c" frameborder="0" allowfullscreen></iframe>
        <br />
		<br />
		<p>The video above is a direct conversion of the 4D image files obtained from the DI3D camera using
		VirtualDub 1.9.11 to .AVI file format at the highest resolution available.</p> 
		The files were then uploaded to www.youtube.com to make the video freely available on the wider web.
		As you can see it is simply a download from youtube using their proprietary youtube player.</p>
	  </div>
<?php
include ('includes/membersFooter.php');
?>
