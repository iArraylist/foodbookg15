<?php include("confic.inc.php");?>
<!DOCTYPE html>
<head>
	<title>Top 10</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/test7.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	
<!------------------------------------------------------------>

	<div class="container">
	<div class="r-header-container">

		</div>
		<?php include "navbarV2.php" ?>
		<div class="menutype-menu-content">
			
			<?php
				$cate_type = NULL;
				if (isset($_GET['cate_type'])) {
					$cate_type = $_GET['cate_type'];
				} else {
					$cate_type = NULL;
				}
				// $cate_type = $_GET['cate_type'];
			?>


			<?php
			$dbname = "foodbookdb";
			$sql = "";
			if (!is_null($cate_type)) {
				$sql = "select * from reci_categories join reci_categories_has_recipes on reci_categories.reci_category_id = reci_categories_has_recipes.reci_category_id join recipes on reci_categories_has_recipes.recipe_id = recipes.recipe_id where reci_categories.reci_category = '$cate_type'";
			} else {
				$sql = "select * from reci_categories join reci_categories_has_recipes on reci_categories.reci_category_id = reci_categories_has_recipes.reci_category_id join recipes on reci_categories_has_recipes.recipe_id = recipes.recipe_id";

			}
			$dbquery = mysql_db_query($dbname, $sql);

			$getRecipeByCategory = NULL;
			if (!is_null($cate_type)) {
				$getRecipeByCategory = "select * from recipes_ranking where reci_category = '$cate_type' limit 10";
			
			?>
			
			<div class="menutype-menu-content-head">
				<a id="head" href="#">เมนูยอดนิยมประเภท<?php echo $cate_type; ?></a>
			</div>

			<?php
			} else {
				$getRecipeByCategory = "select * from recipes_ranking limit 10";

			?>

			<div class="menutype-menu-content-head" >
				<img src="TOP10.png" alt="">
			</div>

			<?php
				}
			$dbqueryByCategory = mysql_db_query($dbname, $getRecipeByCategory);
			while($row = mysql_fetch_array($dbqueryByCategory)){
				$fetcharray = mysql_fetch_array($dbquery); ?>
				<div class="menutype-menu-grid wow fadeInRight" data-wow-delay="0.4s">
					<div class="menutype-menu-grid-sub">
						<div class="col-md-3">
							<img src="images/food_img/<?php echo $fetcharray['picture'] ?>" class="img-responsive" alt="">
						</div>
						<div class="col-md-7">
							<div class="menutype-menu-grid-sub-title">
								<h4><a id = "title" href="showDetail.php?recipe_id=<?php echo $fetcharray['recipe_id']; ?>"><?php echo $fetcharray['recipe_name'] ;?></a>
								</h4>
									
									<h5 id="username">By <?php echo $fetcharray['member_id'] ;?></h5>
										<div class="menutype-rating">
											<kbd style="background-color:yellow;color:#000;">rating</kbd>
										</div>
									</h5>


							<div class="menutype-rating">
									
								<a href="">
									<?php 
										if($row{'average_rate'} == 5){
											echo '<img src="images/5.png" alt="">';
										}
										else if ($row{'average_rate'} >= 4.5){
											echo '<img src="images/4-5.png" alt="">';
										}
										else if ($row{'average_rate'} >= 4){
											echo '<img src="images/4.png" alt="">';
										}
										else if ($row{'average_rate'} >= 3.5){
											echo '<img src="images/3-5.png" alt="">';
										}
										else if ($row{'average_rate'} >= 3){
											echo '<img src="images/3.png" alt="">';
										}
										else if ($row{'average_rate'} >= 2.5){
											echo '<img src="images/2-5.png" alt="">';
										}
										else if ($row{'average_rate'} >= 2){
											echo '<img src="images/2.png" alt="">';
										}
										else if ($row{'average_rate'} >= 1.5){
											echo '<img src="images/1-5.png" alt="">';
										}
										else if ($row{'average_rate'} >= 1){
											echo '<img src="images/1.png" alt="">';
										}
										else if ($row{'average_rate'} >= 0.5){
											echo '<img src="images/0-5.png" alt="">';
										}
										else if ($row{'average_rate'} >= 0){
											echo '<img src="images/0.png" alt="">';
										}
									?>
								</a>
							</div>
								<?php 
									echo "<br>";
									echo "จำนวนโหวต: ". $row{'number_of_giving_rate'};
									?>

							</div>
						</div>


						<div class="col-md-2">
							<form action="showDetail.php" method="get">
								<input id="more-button" type="submit" value="อ่านต่อ" >
								<?php echo "<input type='hidden' name='recipe_id' value='".$row['recipe_id']."'>"; ?>
							</form>
						</div>


						<div class="clearfix">
						</div>

					</div>
				</div>
				<?php } ?>


		</div>
	</div>

</body>




