<?php

$hostname="localhost";
$username="root";
$password="root";
$dbname="foodbookdb";
$conn=mysql_connect($hostname,$username,$password);
if($conn){
	mysql_select_db($dbname);
	mysql_query("SET NAMES UTF8");
}else{
	echo "connect fail.";
}

?>

<?php

$result=mysql_query("SELECT * FROM reci_categories");
$rows=mysql_num_rows($result);
$row=0;
while ($resultData=mysql_fetch_array($result)) {
	echo "\"";
	echo $resultData['reci_category'];
	echo "\"";
	$row++;
	if($row<$rows){
		echo ",";
	}
}




?>