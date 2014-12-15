<?php include("confic.inc.php");?>
<!DOCTYPE <html>
<head>
	<title>*Top 10*</title>
</head>
<body>

== RANKING == <br>





<?php
$getRecipeRankingSql = "select * from recipes_ranking limit 10";
$dbname = "foodbookdb";
$dbquery = mysql_db_query($dbname, $getRecipeRankingSql);
while($row = mysql_fetch_array($dbquery)){
	echo "Recipe_id". " : " .$row{'recipe_id'}; 
	echo " " .$row{'recipe_name'};
	echo " ". "Rate : ". round($row{'average_rate'},2);
	#echo "dwedwedw" . $row{'picture'};
	echo "<br>"; 
	if (!is_null($row['picture'])) {

?>

		<img src="data:image/jpeg;base64, <?php echo base64_encode($row['picture']);?>" />
		<br>
<?php
	}
}
?>