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

session_start();

if($_GET['favorite']==1){
	mysql_query("INSERT INTO favorites(member_id,recipe_id) VALUES ('$_SESSION[login_id]','$_GET[id]')");
}
else{
	mysql_query("DELETE FROM favorites WHERE member_id='$_SESSION[login_id]' AND recipe_id='$_GET[id]'");
}




?>