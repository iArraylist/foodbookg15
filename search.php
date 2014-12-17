<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/footer.css">
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
<body>
	<div class="container">
		<div class="r-header-container">

		</div>
		<?php 
		include "navbarV2.php";
		?>

		<?php

		$recipes=array();

		if(!isset($_GET['s_menus'])){
			$s_ingrediants=explode(",", $_GET['s_ingrediants']);

	//$cat01=array();
	//$cat02=array();
	//$cat03=array();
			$ingrediants=array();



			for ($count=0;$count<count($s_ingrediants);$count++) {

				$ing=$s_ingrediants[$count];
				$result=mysql_query("SELECT * FROM ingrediants WHERE ing_name='$ing'");
				$resultData=mysql_fetch_array($result);
				$ingrediants[]=$resultData['ing_id'];

		/*
		if($resultData['ing_category_id']==0000000001){
			$cat01[]=$resultData['ing_id'];
		} elseif ($resultData['ing_category_id']==0000000002) {
			$cat02[]=$resultData['ing_id'];
		} elseif ($resultData['ing_category_id']==0000000003) {
			$cat03[]=$resultData['ing_id'];
		}
		*/

		$ing_id=$resultData['ing_id'];
		$result=mysql_query("SELECT * FROM reci_has_ing WHERE ing_id='$ing_id'");

		$rows=mysql_num_rows($result);
		if($rows!=0){
			while ($resultData=mysql_fetch_array($result)) {
				$recipe_id=$resultData['recipe_id'];
				if(!(in_array_recursive($recipe_id, $recipes))){
					$recipes[]=array($resultData['recipe_id'],1);
					
				} else{
					$key=searchForId($recipe_id, $recipes);
					$recipes[$key][1]++;
					

				}		
			}	
		} else{
			if(($key=array_search($ing_id, $ingrediants)) !== false) {
				unset($ingrediants[$key]);
			} 
		}
		/* else {
			if(($key = array_search($ing_id, $cat01)) !== false) {
				unset($cat01[$key]);
			} elseif (($key = array_search($ing_id, $cat02)) !== false) {
				unset($cat02[$key]);
			} elseif (($key = array_search($ing_id, $cat03)) !== false) {
				unset($cat03[$key]);
			}
		} */
	}

	
	usort($recipes, 'sortByOrder');
}
else {

	$s_menus=explode(" ", $_GET['s_menus']);
	for ($count=0;$count<count($s_menus);$count++) {
		$word=$s_menus[$count];
		$result=mysql_query("SELECT * FROM recipes WHERE recipe_name LIKE '%".$word."%'");

		$rows=mysql_num_rows($result);
		if($rows!=0){
			while ($resultData=mysql_fetch_array($result)) {
				$recipe_id=$resultData['recipe_id'];
				if(!(in_array_recursive($recipe_id, $recipes))){
					$recipes[]=array($resultData['recipe_id'],1);
					
				} else{
					$key=searchForId($recipe_id, $recipes);
					$recipes[$key][1]++;
					

				}		
			}	
		} 



	}
}

?>


<div class="menutype-menu-content">
	<?php
	foreach ($recipes as $value) {
		$recipe_id=$value[0];
		$result=mysql_query("SELECT * FROM recipes join members on members.member_id=recipes.member_id WHERE recipe_id='$recipe_id'");
		while ($resultData=mysql_fetch_array($result)){
			?>
			<div class="menutype-menu-grid wow fadeInRight" data-wow-delay="0.4s">
				<div class="menutype-menu-grid-sub">
					<div class="col-md-3">
						<img src="images/food_img/<?php echo $resultData['picture'] ;?>" class="img-responsive" alt="">
					</div>
					<div class="col-md-7">
						<div class="menutype-menu-grid-sub-title">
							<h4>
								<a id = "title" href="showDetail.php?recipe_id=<?php echo $recipe_id; ?>"><?php echo $resultData['recipe_name'] ; ?></a>
							</h4>
							<h5 id="username">By <?php echo $resultData['username'] ;?></h5>
							<div class="menutype-rating">
								<span>rating</span>
								<a href="#">
									<img src="star1.png" alt="">
								</a>
							</div>
							<h5>Tag 
								<?php 
								$result = mysql_query("select * from reci_has_ing join ingrediants on reci_has_ing.ing_id = ingrediants.ing_id where reci_has_ing.recipe_id = '$resultData[recipe_id]'");
								while($resultData = mysql_fetch_array($result)){ ?>
								<kbd><?php echo $resultData['ing_name']; ?></kbd><?php
							}?>
						</h5>

					</div>
				</div>
				<div class="col-md-2">
					<form action="showDetail.php" method="get">
						<input id="more-button" type="hidden" name= "recipe_id" value="<?php echo $recipe_id; ?>" >
						<input id="more-button" type="submit" value="อ่านต่อ" >
					</form>
				</div>
				
				<div class="clearfix">
				</div>
			</div>
		</div>

		<?php	}} ?>
	</div>







	<?php
	

		// function in_array_recur($needle, $haystack, $strict = false) {
		// 	foreach ($haystack as $item) {
		// 		if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_recur($needle, $item, $strict))) {
		// 			return true;
		// 		}
		// 	}

		// 	return false;
		// }

	function in_array_recursive($recipe_id,$recipes){
		foreach ($recipes as $key => $value) {
			if($value[0] === $recipe_id){
				return true;
			}
		}
		return false;
	}



	function searchForId($id, $array) {
		foreach ($array as $key => $val) {
			if ($val[0] === $id) {
				return $key;
			}
		}
		return null;
	}

	function sortByOrder($a, $b) {
		return $b[1] - $a[1];
	}

	?>


	<?php 
	include "footer.html";
	?>

</div>

</body>
</html>