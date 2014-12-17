
	<style type="text/css">

	.bootstrap-tagsinput {
		width: 89%;
		margin-bottom: 0px;
	}

	.bootstrap-tagsinput input {
		width: 23em !important;
	}

	</style>



		<form action="search.php" method="get">
		<input type="text" id="inputingrediants" data-role="tagsinput" name="s_ingrediants" required >
		<input type="submit" class="btn defult" value="ค้นหา" style="width:10%" >
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

	<script type="text/javascript"> 

	function stopRKey(evt) { 
		var evt = (evt) ? evt : ((event) ? event : null); 
		var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
		if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
	} 

	document.onkeypress = stopRKey; 

	</script>

