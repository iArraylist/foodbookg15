
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	<script src="js/bootstrap-tagsinput-angular.js"></script>
	<script src="js/bootstrap-typeahead.js"></script>

	<title>Bootstrap tutorials by Siam HTML</title>
</head>
<body>

	<?php 

	$search_menu=""; ?>
	
		<form action="search.php" method="POST">
		
		<input name="s_menus" type="text" value="<?php echo $search_menu; ?>">
		<input type="submit" name"btn_searchbymenu" >
		</form>


	


</body>
</html>
