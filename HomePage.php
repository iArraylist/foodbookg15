<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/test12.css">
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
<div class="container">
	<div class="main-logo wow bounceIn animated">
		<p>
		<img src="LOGO_01.png" alt="">
		</p>
	</div>
	<!-- <a id="login" href=""></a>
	<a id="regis" href=""></a> -->

	<p>
		<img class="login" src="LOGIN_ORI.png" alt="">
	</p>
	

	<?php
	include "confic.inc.php";
	include "navbarV2.php";
	?>
	<section id="r-search">
			<div class="content">
				<h2>Search Here</h2>
				<h5>you can type the ingredient that you have in box below.</h5>
			</div>
			<form action="" method="">
				<input type="text" class="form-control" placeholder="Type Your Ingredient">
			</form>
	</section>

	<div class="test"></div>
	<div class="test2">
		<img class="step1 wow fadeInLeft animated" data-wow-delay="0.4s" src="STEP_1.png" alt="">
		<img class="step2 wow fadeInRight animated" data-wow-delay="0.6s" src="STEP_2.png" alt="">
		<img class="step3 wow fadeInLeft animated" data-wow-delay="0.8s" src="STEP_3.png" alt="">
	</div>
	<div class="test"></div>
	<!---------------------------------------------------------------->
	
	<div class="r-rec">
		<img src="REC_01.png" alt="">
	</div>

	<div class="col-md-4">
				<div class="offer">
					<div class="offer-img">
						<img src="test2.jpg" class="img-responsive" alt="">
					</div>
					<div class="offer-text">
						<h4>Olister Combo pack lorem</h4>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
						<input type="button" value="More">
						<span></span>
					</div>
					<div class="clearfix"></div>
				</div>
	</div>
	<div class="col-md-4">
				<div class="offer">
					<div class="offer-img">
						<img src="test2.jpg" class="img-responsive" alt="">
					</div>
					<div class="offer-text">
						<h4>Olister Combo pack lorem</h4>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
						<input type="button" value="More">
						<span></span>
					</div>
					<div class="clearfix"></div>
				</div>
	</div>
	<div class="col-md-4">
				<div class="offer">
					<div class="offer-img">
						<img src="test2.jpg" class="img-responsive" alt="">
					</div>
					<div class="offer-text">
						<h4>Olister Combo pack lorem</h4>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </p>
						<input type="button" value="More">
						<span></span>
					</div>
					<div class="clearfix"></div>
				</div>
	</div>
	<!------------------------------------------------------------>

</div>	

	
</body>
</html>