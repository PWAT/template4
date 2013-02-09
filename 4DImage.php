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
  <br />	
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
	<h1>4D Image Page</h1>
	<div id="webgl" oncontextmenu="return false;">
	</div>
	<script>
		
		var stats;
		var scene;
		var camera;
		var renderer;
		var model;
		var animations;
		var kfAnimations = [ ];
		var kfAnimationsLength = 0;
		var lastTimestamp;
		var progress = 0;
		var container;
		
		var mouseX = 0, mouseY = 0;
		
		var windowHalfX = window.innerWidth / 2;
		var windowHalfY = window.innerHeight / 2;
		
		
		init();
		animate();
		
		function init() {
			
			container = document.getElementById( 'webgl' );
			var width = container.clientWidth;
			var height = container.clientHeight;
			
			camera = new THREE.PerspectiveCamera( 45, width/height, 1, 10000 );
			camera.position.z = 500;
			
			// scene
			
			scene = new THREE.Scene();
			
			var ambient = new THREE.AmbientLight( 0x101030 );
			scene.add( ambient );
			
			var directionalLight = new THREE.DirectionalLight( 0xffeedd );
			directionalLight.position.set( 0, 0, 1 ).normalize();
			scene.add( directionalLight );
			
			// model
			
			var loader = new THREE.OBJMTLLoader();
			loader.addEventListener( 'load', function ( event ) {
				
				var object = event.content;
				
				object.position.y = 50;
				scene.add( object );
				
			});
			loader.load( 'images/Philip/Philip_003_00.obj', 'images/Philip//Philip_003_00.mtl' );
			//loader.load( 'obj/Philip/philip_003_01.obj', 'obj/Philip/philip_003_01.mtl' );
			//loader.load( 'obj/Philip/philip_003_80.obj', 'obj/Philip/philip_003_80.mtl' );
		
		
			//
			// var urls = [ 
			// "obj/Philip/philip_003_00.jpeg"						
			// "obj/Philip/philip_003_01.jpeg",				
			// "obj/Philip/philip_003_80.jpeg"
			// ]; 
			// var textures=THREE.ImageUtils.loadTexture(urls);
			
			// scene.add( textures );
			
		
			if ("WebGLRenderingContext" in window)
			renderer = new THREE.WebGLRenderer();
			else
			renderer = new THREE.CanvasRenderer();
			
			renderer.setSize( width, height );
			
			container.appendChild( renderer.domElement );
			
			document.addEventListener( 'mousemove', onDocumentMouseMove, false );
			
			//
			
			window.addEventListener( 'resize', onWindowResize, false );
			
		}
		
		function onWindowResize() {
			
			windowHalfX = window.innerWidth / 2;
			windowHalfY = window.innerHeight / 2;
			
			camera.aspect = window.innerWidth / window.innerHeight;
			camera.updateProjectionMatrix();
			
			renderer.setSize( window.innerWidth, window.innerHeight );
			
		}
		
		function onDocumentMouseMove( event ) {
			
			mouseX = ( event.clientX - windowHalfX ) / 2;
			mouseY = ( event.clientY - windowHalfY ) / 2;
			
		}
		
		//
		
		function animate() {
			
			requestAnimationFrame( animate );
			render();
			
		}
		
		function render() {
			
			camera.position.x += ( mouseX - camera.position.x ) * .05;
			camera.position.y += ( - mouseY - camera.position.y ) * .05;
			
			camera.lookAt( scene.position );
			
			renderer.render( scene, camera );
			
		}
	
		
	</script>
	
</div>

<?php
include ('includes/membersFooter.php');
?>