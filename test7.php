<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/test7.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/docs.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php 
	include "navbar.php";
?>
<div class="menutype">
	<div class="container">
		<div class="menutype-menu-content">
			<div class="menutype-menu-content-head">
				<?php 
					$cate_type = $_GET['cate_type'];
				?>
				<a id="head" href="#">เมนู<?php echo $cate_type ;?></a>
			</div>
			<?php 
					
					$sql = "select * from reci_categories join reci_categories_has_recipes on reci_categories.reci_category_id = reci_categories_has_recipes.reci_category_id join recipes on reci_categories_has_recipes.recipe_id = recipes.recipe_id where reci_categories.reci_category = '$cate_type'";
					$dbquery = mysql_query($sql);
					$num_rows = mysql_num_rows($dbquery);
					$num_count = 0;
					while ($num_count < $num_rows){
						$fetcharray = mysql_fetch_array($dbquery);
						$num_count = $num_count+1; ?>
				<div class="menutype-menu-grid">
					<div class="menutype-menu-grid-sub">
						<div class="col-md-3">
							<img src="test2.jpg " class="img-responsive" alt="">
						</div>
						<div class="col-md-7">
							<div class="menutype-menu-grid-sub-title">
								<h4>
									<a id = "title" href=""><?php echo $fetcharray['recipe_name'] ;?></a>
								</h4>
								<h5 id="username">By <?php echo $fetcharray['member_id'] ;?></h5>
								<div class="menutype-rating">
									<span>rating</span>
									<a href="">
										<img src="star1.png" alt="">
									</a>
								</div>

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
				<!-- <div class="menutype-menu-grid">
					<div class="menutype-menu-grid-sub">
						<div class="col-md-3">
							<img src="test2.jpg " class="img-responsive" alt="">
						</div>
						<div class="col-md-7">
							<div class="menutype-menu-grid-sub-title">
								<h4>
									<a id = "title" href="">ผัดกะเพราไก่ไข่ดาว</a>
								</h4>
								<h5 id="username">By Username</h5>
								<div class="menutype-rating">
									<span>rating</span>
									<a href="">
										<img src="star1.png" alt="">
									</a>
								</div>

							</div>
						</div>
						<div class="col-md-2">
							<input id="more-button" type="button" value="อ่านต่อ" >
						</div>
	
						<div class="clearfix">
						</div>
					</div>
				</div> -->
			
		</div>
	</div>
</div>
	
</body>
</html>