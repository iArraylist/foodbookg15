
	<style type="text/css">

	.bootstrap-tagsinput {
		width: 405px;
		margin-bottom: 0px;
	}

	.bootstrap-tagsinput input {
		width: 23em !important;
	}

	</style>



		<form action="search.php" method="POST">
		<input type="text" id="inputingrediants" data-role="tagsinput" name="s_ingrediants" >
		<input type="submit" class="btn defult" value="Search" >
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

