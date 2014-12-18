
<?php session_start(); ?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">\
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/HomePage.css">
	<link rel="stylesheet" type="text/css" href="css/categoryType.css">
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
	<div class="row">
		<div class="col-md-4">
			<div class="r-header-container">
			</div>
		</div>
		<div class="col-md-8">
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
	</div>
	
	
	<?php 
	include "navbarV2.php";
	?>
	<div class="menutype-menu-content">
		<div class="menutype-menu-content-head wow bounceIn animated" style="visibility: visible; -webkit-animation: bounceIn 0.4s;">
			<?php 
					$cate_type = $_GET['cate_type'];
				?>
				<img src="<?php echo $cate_type ?>.png" alt="">
				<!-- <a id="head" href="#">เมนู<?php echo $cate_type ;?></a> -->
		</div>
		<?php 
					
					$sql = "select * from reci_categories join reci_categories_has_recipes on reci_categories.reci_category_id = reci_categories_has_recipes.reci_category_id join recipes on reci_categories_has_recipes.recipe_id = recipes.recipe_id join members on recipes.member_id = members.member_id where reci_categories.reci_category = '$cate_type'";
					$dbquery = mysql_query($sql);
					$num_rows = mysql_num_rows($dbquery);
					$num_count = 0;
					while ($num_count < $num_rows){
						$fetcharray = mysql_fetch_array($dbquery);
						$num_count = $num_count+1; ?>
				<div class="menutype-menu-grid wow fadeInRight" data-wow-delay="0.4s">
					<div class="menutype-menu-grid-sub">
						<div class="col-md-3">
							<img src="images/food_img/<?php echo $fetcharray['picture'] ?>" class="img-responsive" alt="">
						</div>
						<div class="col-md-7">
							<div class="menutype-menu-grid-sub-title">
								<h4>
									<a id = "title" href="showDetail.php?recipe_id=<?php echo $fetcharray['recipe_id']; ?>"><?php echo $fetcharray['recipe_name'] ;?></a>
								</h4>
				
								<h5 id="username">By <?php echo $fetcharray['username'] ;?></h5>
								<div class="menutype-rating">
									<kbd style="background-color:yellow;color:#000;">rating</kbd>
									<?php 
									$getAvgRateByRecipeId = "select * from recipes_ranking where recipe_id ='$fetcharray[recipe_id]'";
									$dbname = "foodbookdb";
									$dbqueryByCategory = mysql_db_query($dbname, $getAvgRateByRecipeId);
									$row = mysql_fetch_array($dbqueryByCategory);

									if($row{'average_rate'}==0){
										echo "ยังไม่มีการโหวต";

									}
									else{
										echo round($row{'average_rate'},1);
									}

									?>
								</div>
								<h5>Tag 
								<?php 
								$result = mysql_query("select * from reci_has_ing join ingrediants on reci_has_ing.ing_id = ingrediants.ing_id where reci_has_ing.recipe_id = '$fetcharray[recipe_id]'");
								while($resultData = mysql_fetch_array($result)){ ?>
									 <kbd><?php echo $resultData['ing_name']; ?></kbd><?php
								}?>
								</h5>

							</div>
						</div>
						<div class="col-md-2">
							<form action="showDetail.php" method="get">
							<input id="more-button" type="hidden" name= "recipe_id" value="<?php echo $fetcharray['recipe_id']; ?>" >
							<input id="more-button" type="submit" value="อ่านต่อ" >
							</form>
						</div>
	
						<div class="clearfix">
						</div>
					</div>
				</div>

					<?php	} ?>
	</div>



	<!---------------------------------------------------->
	<?php 
		include "footer.html";
	?>
</div>


	
</body>
</html>