<?php
include_once"confic.inc.php";
?>
<!DOCTYPE html>
<html>
<body>

	<?php
	$sql = "select * from rates where recipe_id = 0000000001 ";
	$dbname = "foodbookdb";
	$result = mysql_db_query($dbname, $sql);
	//Average
	$total=0; $count=0;
	while ($row = mysql_fetch_array($result)) {
		$total=$total+$row{'rate'};
		$count=$count+1;
 		#echo "Rate : ".$row{'rate'}.'<br>'; 
	}
	$average = $total/$count;
	//echo "Rate average : ".$average;




	$getAvgRateByRecipeId = "select * from recipes_ranking where recipe_id ='".$recipe_id."'";
	$dbname = "foodbookdb";
	$dbqueryByCategory = mysql_db_query($dbname, $getAvgRateByRecipeId);
	$num_rows = mysql_num_rows($dbqueryByCategory);
	if ($num_rows != 0) {
		$row = mysql_fetch_array($dbqueryByCategory);
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
	} else {
		echo '<img src="images/0.png" alt="">';
	}



	?>  
	<?php 
		echo "จำนวนโหวต" . '('.$row{'number_of_giving_rate'}.')';

	?>
</body>
</html>