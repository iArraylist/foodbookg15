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
	echo "Rate average : ".$average;
	?>  

</body>
</html>