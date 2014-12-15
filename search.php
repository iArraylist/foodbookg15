


<html lang="en">
<head>
	<title>Foodbook</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/soponCss.css" rel="stylesheet">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body>

	<?php
	include "confic.inc.php";
	include_once"header.php";
	?>
	<?php

	$recipes=array();

	if(!isset($_POST['s_menus'])){
	$s_ingrediants=explode(",", $_POST['s_ingrediants']);

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
		
$s_menus=explode(" ", $_POST['s_menus']);
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


	<div class="container">
		<h1 id="r-foodheader">Food</h1>
		<table class="table table-bordered table-hover">
			<tr id="r-texttable">

				<td class="col-md-1">Food Picture</td>
				<td class="col-xs-6 col-sm-3">Food Name</td>
				<td class="col-xs-6 col-sm-3">Food Desc</td>
			</tr>
			<?php
			foreach ($recipes as $value) {
				$recipe_id=$value[0];
				$result=mysql_query("SELECT * FROM recipes WHERE recipe_id='$recipe_id'");
				while ($resultData=mysql_fetch_array($result)){
					?>
					<tr class="r-row">
						<td ><img class="r-img" src="images/food_img/<?php echo $resultData['picture'] ;?>"></td>
						<td ><a href="showDetail.php?recipe_id=<?php echo $resultData['recipe_id'];?>"><?php echo $resultData['recipe_name'] ; ?> </a></td>
						<td ><?php echo $resultData['descripShort'] ; ?> </td>
					</tr>
					<?php
				}}
				?>
				
			</table>
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

	</body>
	</html>