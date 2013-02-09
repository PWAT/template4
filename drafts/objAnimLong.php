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
		<div id="webgl" oncontextmenu="return false;">
		</div>
		
		<!--Three.js base with code from Three.js API added-->
		
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
				loader.load( 'images/Philip30/philip_003_00.jpg' );
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_01.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_00.jpg' );	
				}, 250);				

				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_02.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_01.jpg' );	
				}, 550);					

				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_03.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_02.jpg' );	
				}, 1050);			
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_04.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_03.jpg' );	
				}, 1550);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_05.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_04.jpg' );	
				}, 2050);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_06.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_05.jpg' );	
				}, 2550);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_07.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_06.jpg' );	
				}, 3050);			
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_08.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_07.jpg' );	
				}, 3550);	
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_09.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_08.jpg' );	
				}, 4050);
		
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_10.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_09.jpg' );	
				}, 4550);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_11.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_10.jpg' );	
				}, 5050);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_12.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_11.jpg' );	
				}, 5550);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_13.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_12.jpg' );	
				}, 6050);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_14.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_13.jpg' );
				}, 6550);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_15.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_14.jpg' );
				}, 7050);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_16.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_15.jpg' );
				}, 7550);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_17.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_16.jpg' );
				}, 8050);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_18.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_17.jpg' );
				}, 8550);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_19.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_18.jpg' );
				}, 9050);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_20.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_19.jpg' );
				}, 9550);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_21.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_20.jpg' );
				}, 10050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_22.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_21.jpg' );
				}, 15050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_23.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_22.jpg' );
				}, 20050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_24.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_23.jpg' );
				}, 25050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_25.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_24.jpg' );
				}, 30050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_26.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_25.jpg' );
				}, 35000);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_27.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_26.jpg' );
				}, 40050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_28.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_27.jpg' );
				}, 45050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_29.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_28.jpg' );
				}, 50050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_30.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_29.jpg' );
				}, 55050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_31.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_30.jpg' );
				}, 60050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_32.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_31.jpg' );
				}, 65050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_33.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_32.jpg' );
				}, 70050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_34.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_33.jpg' );
				}, 75050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_35.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_34.jpg' );
				}, 80050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_36.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_35.jpg' );
				}, 85050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_37.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_36.jpg' );
				}, 90050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_38.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_37.jpg' );
				}, 95050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_39.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_38.jpg' );
				}, 95500);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_40.jpg' );
					renderer.deallocateTexture( 'images/Philip30/Philip_003_39.jpg' );
				}, 100000);
				
				
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
					  },100000);	
											
						});
					
				
					//Works but all on top of each other so setTimeOuts
				loader.load( 'images/Philip30/philip_003_00.obj' );
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_01.obj' );
					renderer.deallocateObject( 'images/Philip30/Philip_003_00.obj' );	
				}, 250);							

				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_02.obj' );
					renderer.deallocateObject( 'images/Philip30/Philip_003_01.obj' );	
				}, 550);				

				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_03.obj' );
					renderer.deallocateObject( 'images/Philip30/Philip_003_02.obj' );	
				}, 1050);
				
				
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_04.obj' );
					renderer.deallocateObject( 'images/Philip30/Philip_003_03.obj' );	
				}, 1550);
				
				
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_05.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_04.obj' );	
				}, 2050);
				
				
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_06.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_05.obj' );	
				}, 2550);
				
			
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_07.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_06.obj' );	
				}, 3050);
				
				
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_08.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_07.obj' );	
				}, 3550);
				
				
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_09.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_08.obj' );	
				}, 4050);
				
				
								
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_10.obj' );
					renderer.deallocateObject( 'images/Philip30/Philip_003_09.obj' );
				}, 4550);
				
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_11.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_10.obj' );	
				}, 5050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_12.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_11.obj' );
				}, 5550);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_13.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_12.obj' );
				}, 6050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_14.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_13.obj' );
				}, 6550);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_15.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_14.obj' );
				}, 7050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_16.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_15.obj' );
				}, 7550);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_17.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_16.obj' );
				}, 8050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_18.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_17.obj' );
				}, 8550);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_19.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_18.obj' );
				}, 9050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_20.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_19.obj' );
				}, 9550);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_21.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_20.obj' );
				}, 10050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_22.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_21.obj' );
				}, 15050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_23.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_22.obj' );
				}, 20050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_24.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_23.obj' );
				}, 25050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_25.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_24.obj' );
				}, 30050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_26.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_25.obj' );
				}, 35050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_27.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_26.obj' );
				}, 40050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_28.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_27.obj' );
				}, 45050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_29.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_28.obj' );
				}, 50050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_30.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_29.obj' );
				}, 55050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_31.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_30.obj' );
				}, 60050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_32.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_31.obj' );
				}, 65050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_33.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_32.obj' );
				}, 70050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_34.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_33.obj' );
				}, 75050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_35.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_34.obj' );
				}, 80050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_36.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_35.obj' );
				}, 85050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_37.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_36.obj' );
				}, 90050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_38.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_37.obj' );
				}, 95050);
				setTimeout(function() {
					loader.load( 'images/Philip30/Philip_003_39.obj' );
					 renderer.deallocateObject( 'images/Philip30/Philip_003_38.obj' );
				}, 100000);
				

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
				    render();
				}
				
				function stop() {
				    cancelAnimationFrame( frame );
				}
				
				function rewind() {
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
				
					camera.position.x += ( mouseX - camera.position.x ) * .1;
					camera.position.y += ( - mouseY - camera.position.y ) * .1;

					camera.lookAt( scene.position );

					renderer.render( scene, camera );
					
				}								

	
		</script>
	
	</div>

<?php
include ('includes/footer.php');
?>