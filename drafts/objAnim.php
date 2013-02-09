<?php #Script 1.3 - index.php

$ptitle = 'Demo project';
$page_header = 'Obj Anim Page';

include ('includes/header.php');
?>
<div class="sidebar">
	<!-- insert your sidebar items here -->
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

		<div id="webgl" oncontextmenu="return false;">
		</div>
		
		<!--Three.js base with code added-->
		
		<script>

			var container, stats;

			var camera, scene, renderer;

			var mouseX = 0, mouseY = 0;

			var windowHalfX = window.innerWidth / 2;
			var windowHalfY = window.innerHeight / 2;
						
			init();
			animate();
			
			function init() {

				container = document.getElementById( 'webgl' );
				var width = container.clientWidth;
				var height = container.clientHeight;

				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 10000 );
				camera.position.z = 500;

				// scene

				scene = new THREE.Scene();

				var ambient = new THREE.AmbientLight( 0x101030 );
				scene.add( ambient );

				var directionalLight = new THREE.DirectionalLight( 0xffeedd );
				directionalLight.position.set( 0, 0, 1 ).normalize();
				scene.add( directionalLight );

				// texture

				var texture = new THREE.Texture();

				var loader = new THREE.ImageLoader();
				
				loader.addEventListener( 'load', function ( event ) {

					texture.image = event.content;
					texture.needsUpdate = true;

				} );
					
				// model
				loader.load( 'images/Philip/philip_003_00.jpg' );
				
				setTimeout(function() {
					renderer.deallocateTexture( 'images/Philip/Philip_003_00.jpg' );					
				},5000);
				
				setTimeout(function() {
					loader.load( 'images/Philip/Philip_003_20.jpg' );
				}, 15000);
				
				setTimeout(function() {
					renderer.deallocateTexture( 'images/Philip/Philip_003_20.jpg' );				
				}, 20000);
				
				setTimeout(function() {
					loader.load( 'images/Philip/Philip_003_50.jpg' );
				}, 22000);
				
				setTimeout(function() {
					renderer.deallocateTexture( 'images/Philip/Philip_003_50.jpg' );				
				}, 25000);
				
				setTimeout(function() {
					loader.load( 'images/Philip/Philip_003_80.jpg' );
				}, 30000);
				
				setTimeout(function() {
					renderer.deallocateTexture( 'images/Philip/Philip_003_80.jpg' );					
				}, 35000);
				
				setTimeout(function() {
					loader.load( 'images/Philip/Philip_003_99.jpg' );
				}, 40000);
				
								
				setTimeout(function() {
					renderer.deallocateTexture( 'images/Philip/Philip_003_80.jpg' );					
				},45000);
				
				var loader = new THREE.OBJLoader();
				loader.addEventListener( 'load', function ( event ) {
					
					var object = event.content;

					for ( var i = 0, l = object.children.length; i < l; i ++ ) {

						object.children[ i ].material.map = texture;

					}

						object.position.y = 50;
						
						scene.add( object );
						
						//Remove all objects to end animation
					  setTimeout(function() {
						  scene.remove( object );
					  },50000);	
											
						});
					
				
					//Works but all on top of each other so setTimeOuts
				loader.load( 'images/Philip/philip_003_00.obj' );
				
				setTimeout(function() {
					renderer.deallocateObject( 'images/Philip/Philip_003_00.obj' );					
				},5000);
				
				setTimeout(function() {
					loader.load( 'images/Philip/Philip_003_20.obj' );
				},15000);
				
				setTimeout(function() {
					renderer.deallocateObject( 'images/Philip/Philip_003_20.obj' );					
				},20000);
				
				setTimeout(function() {
					loader.load( 'images/Philip/Philip_003_50.obj' );
				},22000);
				
				setTimeout(function() {
					renderer.deallocateObject( 'images/Philip/Philip_003_50.obj' );					
				},25000);
				
				setTimeout(function() {
					loader.load( 'images/Philip/Philip_003_80.obj' );
				},30000);
				
				setTimeout(function() {
					renderer.deallocateObject( 'images/Philip/Philip_003_80.obj' );					
				},35000);
								
				setTimeout(function() {
					loader.load( 'images/Philip/Philip_003_99.obj' );
				},40000);
				
				setTimeout(function() {
					renderer.deallocateObject( 'images/Philip/Philip_003_80.obj' );					
				},45000);

				if ("WebGLRenderingContext" in window)
					renderer = new THREE.WebGLRenderer();
					else
					renderer = new THREE.CanvasRenderer();
					
					renderer.setSize( width, height );
					
					container.appendChild( renderer.domElement );
					
					document.addEventListener( 'mousemove', onDocumentMouseMove, false );
				
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

			//  RequestAnimationFrame Shim from 
			//  http://www.kadrmasconcepts.com/blog/2012/05/20/save-battery-life-with-cancelanimationframe/

				// Fire off our RAF loop
				// Store our frame id
				var frame;	
			
				function animate() {					
					frame = requestAnimationFrame( animate );
				    render()					
				}
				
				var stop = function() {
				    cancelAnimationFrame( frame );
				}
				
				var rewind = function() {
					alert("frame1: "+frame);
						if ( frame > 0 ) {
						frame -= frame; 
						alert("frame2: "+frame);
						requestAnimationFrame( animate );
						}
						else {
							frame = 12;
							requestAnimationFrame( animate );
							}
				}
					

				function render() {
					if (initialTime == null ) {
					initialTime = currentTime;
					}
										
					camera.position.x += ( mouseX - camera.position.x ) * .1;
					camera.position.y += ( - mouseY - camera.position.y ) * .1;

					camera.lookAt( scene.position );

					renderer.render( scene, camera );
					
				}								

	
		</script>
		
		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<span class="btn-navheader">4D image data Demo</span>
					<a href="#" class="btn pause btn-navbar" style="display: block;" onclick="rewind()">Rrwd</a>
					<a href="#" class="btn start btn-navbar" style="display: block;" onclick="forward()">Ffwd</a>
					<a href="objAnim.php" class="btn reset btn-navbar" style="display: block;" >Reset</a>
					<a href="#" class="btn pause btn-navbar" style="display: block;" onclick="stop()">Pause</a>
					<a href="#" class="btn start btn-navbar" style="display: block;" onclick="animate()">Start</a>
				</div>
			</div>
		</div>
	
	</div>

<?php
include ('includes/footer.php');
?>