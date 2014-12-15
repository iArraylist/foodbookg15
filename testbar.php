
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


	
		<form action="search.php" method="POST">
		<input type="text" id="inputingrediants" data-role="tagsinput" name="s_ingrediants" >
		<input type="submit" >
		</form>


	<script>
	var ingrediants=[<?php include 'queryIngrediants.php' ?>];
	$('#inputingrediants').tagsinput({
		typeahead: {
			source:ingrediants
		},
		freeInput: false
	});

	</script>


</body>
</html>
