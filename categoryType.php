<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
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
</head>
</head>
<body>
	<div class="container">


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

			$sql = "select * from reci_categories join reci_categories_has_recipes on reci_categories.reci_category_id = reci_categories_has_recipes.reci_category_id join recipes on reci_categories_has_recipes.recipe_id = recipes.recipe_id where reci_categories.reci_category = '$cate_type'";
			$dbquery = mysql_query($sql);
			$num_rows = mysql_num_rows($dbquery);
			$num_count = 0;

			$getRecipeByCategorySQL = "select * from recipes_ranking";
			$dbname = "foodbookdb";
			$getRecipeByCategory = mysql_db_query($dbname, $getRecipeByCategorySQL);
			
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
								<a id = "title" href="#"><?php echo $fetcharray['recipe_name'] ;?></a>
							</h4>
							<h5 id="username">By <?php echo $fetcharray['member_id'] ;?></h5>
								<!-- <div class="menutype-rating">
									<span>rating</span>
									<a href="#">
										<img src="star1.png" alt="">
									</a>
								</div> -->

								<?php
								$thisRecipeAverageRate = mysql_fetch_array($getRecipeByCategory);
								?>

								<div class="menutype-rating">
									<span>rating</span>
									<a href="">
										<?php 
										if($thisRecipeAverageRate{'average_rate'} == 5){
											echo '<img src="images/5.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 4.5){
											echo '<img src="images/4-5.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 4){
											echo '<img src="images/4.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 3.5){
											echo '<img src="images/3-5.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 3){
											echo '<img src="images/3.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 2.5){
											echo '<img src="images/2-5.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 2){
											echo '<img src="images/2.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 1.5){
											echo '<img src="images/1-5.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 1){
											echo '<img src="images/1.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 0.5){
											echo '<img src="images/0-5.png" alt="">';
										}
										else if ($thisRecipeAverageRate{'average_rate'} >= 0){
											echo '<img src="images/0.png" alt="">';
										}
										?>

									</a>
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
	</div>
















	
</body>
</html>