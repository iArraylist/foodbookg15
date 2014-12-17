<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">\
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/categoryType.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
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
		<div class="r-header-container">

		</div>

		<?php 
		include "navbarV2.php";
		?>

		
		<div class="menutype-menu-content">
			<?php 
			$sql = "select * from favorites join recipes on favorites.recipe_id=recipes.recipe_id join members on recipes.member_id=members.member_id where recipes.member_id = '$_SESSION[login_id]'";
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


		<?php 
		include "footer.html";
		?>
	</div>
</body>
</html>
