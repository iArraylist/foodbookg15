<?php include("confic.inc.php");?>
<!DOCTYPE html>
<head>
	<title>Most Popular</title>
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


<?php include "navbarV2.php" ?>

<!------------------------------------------------------------>
<div class="menutype">
<div class="container">
<div class="menutype-menu-content">
	<div class="menutype-menu-content-head">
		<a id="head" href="#">เมนูอาหารประเภทนึ่ง</a>
	</div>

<?php
	
$getRecipeByCategory = "select * from recipes_ranking where reci_category_id = '4'limit 10";
$dbname = "foodbookdb";
$dbqueryByCategory = mysql_db_query($dbname, $getRecipeByCategory);
while($row = mysql_fetch_array($dbqueryByCategory)){
?>
	<div class="menutype-menu-grid">
	<div class="menutype-menu-grid-sub">
		<div class="col-md-3">
			<img src="data:image/jpeg;base64, <?php echo base64_encode($row['picture']);?>" class="img-responsive" alt="">

		</div>
		<div class="col-md-7">
			<div class="menutype-menu-grid-sub-title">
				<h4>
					<a id = "title" href=""><?php echo $row{'recipe_name'};?></a>
				</h4>
				<h5 id="username">
				By Username
				<br>
				<?php echo "rate: " . round($row{'average_rate'},1);
					echo "<br>";
					echo "จำนวนโหวต: ". $row{'number_of_giving_rate'};
					?>
				</h5>

				<div class="menutype-rating">
					<span>rating</span>
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
<?php
}
?>
<!-------------------------------------------------->


</div>
</div>
</div>






















<!--


== RANKING รวม == <br>



</body>
-->
<?php

// $getRecipeRankingSql = "select * from recipes_ranking limit 10";
// #$getRecipeByCategory = "select * from recipes_ranking2 where reci_category_id = $categoryName ";
// $dbname = "foodbookdb";
// $dbquery = mysql_db_query($dbname, $getRecipeRankingSql);
// $dbqueryByCategory = mysql_db_query($dbname, $getRecipeByCategory);
// #while($row = mysql_fetch_array($dbqueryByCategory)){
// while($row = mysql_fetch_array($dbquery)){
	
// 	echo "Recipe_id". " : " .$row{'recipe_id'}; 
// 	echo "<br>";
// 	echo " " .$row{'recipe_name'};
// 	echo "<br>";
// 	echo " " .$row{'reci_category'};
// 	echo "<br>";
// 	echo " ". "Rate : ". round($row{'average_rate'},2);
// 	echo "<br>";
// 	echo "จำนวนคนโหวต: " .$row{'Number_of_giving_rate'};
// 	#echo "dwedwedw" . $row{'picture'};
// 	echo "<br>"; 
// 	if (!is_null($row['picture'])) {

?>

	<!-- 	<img src="data:image/jpeg;base64, <?php echo base64_encode($row['picture']);?>" />
		<br>
		------------------------------------------------------------------------------------------------------------------------------------
		<br> -->
<?php
// 	}
// }
?>

