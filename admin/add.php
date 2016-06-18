<?php 
session_start();

	if(!isset($_SESSION['user'])){
		header("Location:index.php");
	}else{
include "class/db.php";
$myDB = new Database("localhost","root","","news_db");
$checked;
if(isset($_POST['publish'])){
$checked=true;
}
else{
$checked=false;
}
if(isset($_POST['submit'])){
	$myDB->insert($_POST['title'],
		$_POST['short_desc'],
		$_POST['full_desc'],
		$_POST['category'],
		"this is image",
		$checked);
	header("Location:allnews.php");
}
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Admin Panel</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						
							
							<a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a>
						
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li><a href="allnews.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> All News</a></li>
			<li  class="active"><a href="add.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Add New</a></li>
			
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Add news</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<form action="" method="post" role="form">
					<div class="form-group">
						<label for="title"> Title</label>
						<input type="text" name="title" id="title" class="form-control">
					</div>
					<div class="form-group">
						<label for="short_desc"> Short description</label>
						<input type="text" name="short_desc" id="short_desc" class="form-control">
					</div>
					<div class="form-group">
						<label for="full_desc"> Full description</label>
						<textarea type="text" name="full_desc" id="full_desc" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label for="category"> Category</label>
						<input type="text" name="category" id="category" class="form-control">
					</div>
					<div class="form-group">
						<label for="image"> Image</label>
						<input type="file" name="image" id="image" class="form-control">
					</div>
					<div class="form-group">
						<label for="publish"> Publish</label>
						<input type="checkbox" name="publish" id="publish" value="">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="btn-primary btn" value="Add news">
					</div>
				</form>
			</div>		
		</div><!--/.row-->
		
		
	
								
		
			
			
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
