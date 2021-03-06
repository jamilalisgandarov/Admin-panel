<?php
include "admin/class/db.php";
$myDB = new Database("localhost","root","","news_db");
$myDB->addMain();
$array=$myDB->myArray;
if(isset($_POST['submit'])){
	$search=$_POST['search'];	
	$array=$myDB->search($search);
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Pinball Website Template</title>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="images/fav-icon.png" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
		<!-- Global CSS for the page and tiles -->
  		<link rel="stylesheet" href="css/main.css">
  		<!-- //Global CSS for the page and tiles -->
		<!--start-click-drop-down-menu-->
		<script src="js/jquery.min.js"></script>
        <!--start-dropdown-->
         <script type="text/javascript">
			var $ = jQuery.noConflict();
				$(function() {
					$('#activator').click(function(){
						$('#box').animate({'top':'0px'},500);
					});
					$('#boxclose').click(function(){
					$('#box').animate({'top':'-700px'},500);
					});
				});
				$(document).ready(function(){
				//Hide (Collapse) the toggle containers on load
				$(".toggle_container").hide(); 
				//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
				$(".trigger").click(function(){
					$(this).toggleClass("active").next().slideToggle("slow");
						return false; //Prevent the browser jump to the link anchor
				});
									
			});
		</script>
        <!--//End-dropdown-->
		<!--//End-click-drop-down-menu-->
	</head>
	<body>
		<!--start-wra-->
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="pinbal" /></a>
				</div>
				
				 <div class="box" id="box">
					 
				</div>       	  
				<div class="top-searchbar">
					<form method="post">
						<input type="text" name='search' /><input type="submit" name="submit" value="" />
					</form>
				</div>
				<div class="userinfo">
					<div class="user">
						<ul>
							<li><a href="#"><img src="images/user-pic.png" title="user-name" /><span>Ipsum</span></a></li>
						</ul>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<!--//End-header-->
		<!--start-content-->
		<div class="content">
			<div class="wrap">
			 <div id="main" role="main">
			      <ul id="tiles">
			        <?php 
			     
			        for ($i=0; $i <count($array); $i++) { 
			        	?> <li>
			        	<a href="single-page.php?id=<?=$array[$i]['id']?>"><img src="admin/uploadedImages/<?php echo $array[$i]['img']?>" width='282' height='210'></a>
			        	<div class='post-info'>
			        		<div class='post-basic-info'>
				        		<h3><a href="single-page.php?id=<?=$array[$i]['id']?>"><?php echo $array[$i]['title'];?></a></h3>
				        		<span><a href='#'><label> </label><?php echo $array[$i]['category'];?></a></span>
				        		<p><?php echo $array[$i]['short_desc'];?></p>
			        		</div>
			        		<div class='post-info-rate-share'>
			        			<div class='rateit'>
			        				<span> </span>
			        			</div>
			        			<div class='post-share'>
			        				<span> </span>
			        			</div>
			        			<div class='clear'> </div>
			        		</div>
			        	</div>
			        </li>
		   			<?php 
		   		}

			        ?>
			       
			        <!-- End of grid blocks -->
			      </ul>
			    </div>
			</div>
		</div>
		<!--//End-content-->
		<!--wookmark-scripts-->
		  <script src="js/jquery.imagesloaded.js"></script>
		  <script src="js/jquery.wookmark.js"></script>
		  <script type="text/javascript">
		    (function ($){
		      var $tiles = $('#tiles'),
		          $handler = $('li', $tiles),
		          $main = $('#main'),
		          $window = $(window),
		          $document = $(document),
		          options = {
		            autoResize: true, // This will auto-update the layout when the browser window is resized.
		            container: $main, // Optional, used for some extra CSS styling
		            offset: 20, // Optional, the distance between grid items
		            itemWidth:280 // Optional, the width of a grid item
		          };
		      /**
		       * Reinitializes the wookmark handler after all images have loaded
		       */
		      function applyLayout() {
		        $tiles.imagesLoaded(function() {
		          // Destroy the old handler
		          if ($handler.wookmarkInstance) {
		            $handler.wookmarkInstance.clear();
		          }
		
		          // Create a new layout handler.
		          $handler = $('li', $tiles);
		          $handler.wookmark(options);
		        });
		      }
		      /**
		       * When scrolled all the way to the bottom, add more tiles
		       */
		   
		
		      // Call the layout function for the first time
		      applyLayout();
		
		      // Capture scroll event.
		      $window.bind('scroll.wookmark', onScroll);
		    })(jQuery);
		  </script>
		<!--//wookmark-scripts-->
		
		<!--//End-wrap-->
	</body>
</html>

