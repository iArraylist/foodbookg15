<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/test6.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/docs.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<link href="css/animate.css" rel='stylesheet' type='text/css' />
	<script>
		new WOW().init();
	</script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
	</script>
</head>
<body>
<?php 
	include "navbar.php";
?>
<div class="r-menupage">
	<div class="container">
		<div class="r-menupage-1 wow fadeInRight animated" style="visibility: visible; -webkit-animation: fadeInRight 1s;">
			<a href="#">เมนูอาหารทอด</a><br>
			<!-- <i class="fa fa-caret-down fa-5x"></i> -->
		</div>
		<div class="r-menupage-2 wow fadeInLeft animated" style="visibility: visible; -webkit-animation: fadeInLeft 0.6s;">
		
		<div class="r-menupage-menu-sub" >
			<a href="">
				<img src="test2.jpg" class="img-responsive">
			</a>
			<div class="r-menupage-text">
				<h4><a href="">menu name</a></h4>
				<h5><a href="">by user</a></h5>
				<h6>rate</h6>
			</div>
		</div>
		
		<div class="r-menupage-menu-sub">
			<a href="">
				<img src="test2.jpg" class="img-responsive">
			</a>
			<div class="r-menupage-text">
				<h4><a href="">menu name</a></h4>
				<h5><a href="">by user</a></h5>
				<h6>rate</h6>
			</div>
			
		</div>

		<div class="r-menupage-menu-sub nth ">
			<a href="">
				<img src="test2.jpg" class="img-responsive">
			</a>
			<div class="r-menupage-text">
				<h4><a href="">menu name</a></h4>
				<h5><a href="">by user</a></h5>
				<h6>rate</h6>
			</div>	
		</div>
	</div>
	<!--------------------------------------------------> 
	</div>
</div>
	
</body>
</html>