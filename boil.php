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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="r-header-container">
	
</div>

<div class="r-menu">
	<div class="container">
	<nav>
		<ul>
			<li>
				<a href="#">หน้าหลัก</a>
			</li>
			<li>
				|
			</li>

			<li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">เมนูอาหาร<span class="caret"></span></a>
          		<ul class="dropdown-menu" role="menu">
            		<li><a id="r-menu-drop" href="#">เมนูอาหารต้ม</a></li>
            		<li><a id="r-menu-drop" href="#">เมนูอาหารผัด</a></li>
            		<li><a id="r-menu-drop" href="#">เมนูอาหารแกง</a></li>
            		<li><a id="r-menu-drop" href="#">เมนูอาหารทอด</a></li>
            		<li><a id="r-menu-drop" href="#">หอมอร่อยในพริบตา</a></li>
          		</ul>
        	</li>
			<li>
				|
			</li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">อาหารที่ได้รับความนิยม<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a id="r-menu-drop" href="showRanking.php">ทุกประเภท</a></li>
					<li><a id="r-menu-drop" href="stirFried.php">ประเภทผัด</a></li>
            		<li><a id="r-menu-drop" href="boil.php">ประเภทต้ม</a></li>
            		<li><a id="r-menu-drop" href="fry.php">ประเภททอด</a></li>
            		<li><a id="r-menu-drop" href="steam.php">ประเภทนึ่ง</a></li>
            		<li><a id="r-menu-drop" href="grill.php">ประเภทปิ้ง/ย่าง</a>
            		</li>
            		</ul>

			</li>
			<li>
				|
			</li>
			<li>
				<a href="#">ติดต่อเรา</a>
			</li>
		</ul>
		</nav>
	</div>
</div>
<!------------------------------------------------------------>
<div class="menutype">
<div class="container">
<div class="menutype-menu-content">
	<div class="menutype-menu-content-head">
		<a id="head" href="#">เมนูอาหารประเภทต้ม</a>
	</div>

<?php
	
$getRecipeByCategory = "select * from recipes_ranking where reci_category_id = '2'limit 10";
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
						echo '<img src="images/5.png" alt="">';
					}
					else if ($row{'average_rate'} >= 4){
						echo '<img src="images/4.png" alt="">';
					}
					else if ($row{'average_rate'} >= 3.5){
						echo '<img src="images/5.png" alt="">';
					}
					else if ($row{'average_rate'} >= 3){
						echo '<img src="images/3.png" alt="">';
					}
					else if ($row{'average_rate'} >= 2.5){
						echo '<img src="images/5.png" alt="">';
					}
					else if ($row{'average_rate'} >= 2){
						echo '<img src="images/2.png" alt="">';
					}
					else if ($row{'average_rate'} >= 1.5){
						echo '<img src="images/5.png" alt="">';
					}
					else if ($row{'average_rate'} >= 1){
						echo '<img src="images/1.png" alt="">';
					}
					else if ($row{'average_rate'} >= 0.5){
						echo '<img src="images/5.png" alt="">';
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
			<input id="more-button" type="button" value="อ่านต่อ" >
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

