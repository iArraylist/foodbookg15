<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta charset="UTF-8">
	<title></title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/HomePage.css">
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

	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
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
	<div class="search-search">
		
	
		<div role="tabpanel" style="margin-right:20px;margin-left:20px;">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a id="bying" href="#ByIng" aria-controls="home" role="tab" data-toggle="tab">ค้นหาจากวัตถุดิบ</a></li>
				<li role="presentation"><a id="bymenu" href="#ByMenu" aria-controls="profile" role="tab" data-toggle="tab">ค้นหาจากชื่อเมนูอาหาร</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="ByIng" style="padding: 15px;">
					<?php include "searchByIngBar.php"; ?>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="ByMenu" style="padding: 15px;">
					<?php include "searchByMenuBar.php"; ?>
				</div>
			</div>

		</div>
	</div>
	</section>
	

	<div class="test"></div>
	<div class="test2">
		<img class="step1 wow fadeInLeft animated" data-wow-delay="0.4s" src="STEP_1.png" alt="">
		<img class="step2 wow fadeInRight animated" data-wow-delay="0.6s" src="STEP_2.png" alt="">
		<img class="step3 wow fadeInLeft animated" data-wow-delay="0.8s" src="STEP_3.png" alt="">
	</div>
	<div class="test"></div>
	<!---------------------------------------------------------------->
	<?php #query from database

		$sql = "select * from recipes where recipe_id = '0000000083' ";
		$dbname = "foodbookdb";
		mysql_query("SET NAMES UTF8"); //show thai 
		$dbquery = mysql_db_query($dbname, $sql);
		$faterrayrecipe = mysql_fetch_array($dbquery);

		$sql1 = "select * from recipes where recipe_id = '0000000103' ";
		$dbquery1 = mysql_db_query($dbname, $sql1);
		$faterrayrecipe1 = mysql_fetch_array($dbquery1);

		$sql2 = "select * from recipes where recipe_id = '0000000097' ";
		$dbquery2 = mysql_db_query($dbname, $sql2);
		$faterrayrecipe2 = mysql_fetch_array($dbquery2);
	?>
	<div class="r-rec">
		<img src="REC_01.png" alt="">
	</div>
	<div class="row">
	<div class="col-md-4">
		<div class="offer">
			<div class="offer-img">
				<img src="nn001.jpg" class="img-responsive" alt="">
			</div>
			<div class="offer-text">
				<h4><?php echo " " . $faterrayrecipe['recipe_name']; ?></h4>
				<p><?php echo " " . $faterrayrecipe['descripShort']; ?></p>
				<a href="showDetail.php?recipe_id=<?php echo $faterrayrecipe['recipe_id'];?>"><input type="button" value="More"></a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="offer">
			<div class="offer-img">
				<img src="nn002.jpg" class="img-responsive" alt="">
			</div>
			<div class="offer-text">
				<h4><?php echo " " . $faterrayrecipe1['recipe_name']; ?></h4>
				<p><?php echo " " . $faterrayrecipe1['descripShort']; ?></p>
				<a href="showDetail.php?recipe_id=<?php echo $faterrayrecipe1['recipe_id'];?>"><input type="button" value="More"></a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="offer">
			<div class="offer-img">
				<img src="nn003.jpg" class="img-responsive" alt="">
			</div>
			<div class="offer-text">
				<h4><?php echo " " . $faterrayrecipe2['recipe_name']; ?></h4>
				<p><?php echo " " . $faterrayrecipe2['descripShort']; ?></p>
				<a href="showDetail.php?recipe_id=<?php echo $faterrayrecipe2['recipe_id'];?>"><input type="button" value="More"></a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	</div>
	<!------------------------------------------------------------>
	<?php 
		include "footer.html";
	?>

</div>	


</body>
</html>