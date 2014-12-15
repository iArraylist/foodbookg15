
<html>
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
	<script src="js/jquery.sortable.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<meta http-equiv="Content-Type" content="text/html5; charset=UTF-8">
	<style>

	.connected, .sortable, .exclude, .handles {
		margin: auto;
		padding: 0;
		width: 310px;
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	.connected li, .sortable li, .exclude li, .handles li {
		list-style: none;
		border: 1px solid #CCC;
		border-radius: 5px;
		background: #F7F7F7;
		color: #D53B91;
		margin: 5px;
		padding: 10px;
		height: auto;
	}
	.handles span {
		cursor: move;
	}
	li.disabled {
		opacity: 0.5;
	}

	li.highlight {
		background: #FEE25F;
	}
	li.sortable-placeholder {
		border: 1px dashed #CCC;
		height: 30px;
		background: none;
	}
	</style>
</head>
<body>
	<?php
	include "confic.inc.php";
	?>

	<form action="" method="POST">
		
		<ul id="Steps2" class="handles list">
			<li id="li_step_1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
				<div id="div_step_1" >
					<label>Step: Title</label>
					<input type="text" class="form-control" placeholder="Enter title" name="title_step_1">
				</div>
			</li>
		</ul>

		<script>
		var i2 = 2;
		function myFunction2() {

			var labelTitle = document
			.createElement("label");
			labelTitle.innerHTML = "Step: Title";

			var newStep = document
			.createElement("input");
			newStep.setAttribute('type', 'text');
			newStep.setAttribute('placeholder',
				'Enter title');
			newStep.setAttribute('class',
				'form-control');
			newStep.setAttribute('name', 'title_step_' + i2);

			var div = document
			.createElement("div")
			div.setAttribute('id', 'div_step_' + i2);
			div.appendChild(labelTitle);
			div.appendChild(newStep)

			var span = document
			.createElement("span");
			span.setAttribute('class', 'ui-icon ui-icon-arrowthick-2-n-s');

			var li = document
			.createElement("li");
			li.setAttribute('id', 'li_step_' + i2);
			li.setAttribute('draggable', true);
			li.appendChild(span);
			li.appendChild(div);


			//var textnode = document.createTextNode("");
			//newItem.appendChild(textnode);



			var steps = document
			.getElementById("Steps2");
			steps.appendChild(li);
			i2 = i2 + 1;

			$('.handles').sortable('refresh');
			console.log("test");

		}

		</script>




		<div id="Steps" style="margin:10;">

			<div id="div_step_1" >
				<label id="test" >Step: Title</label>
				<input type="text" class="form-control" placeholder="Enter title" name="title_step_1">
			</div>

		</div>
		<button type="button" class="btn btn-defult" style="margin-bottom: 2px;" onclick="myFunction()">Add</button>
		<button type="button" class="btn btn-defult" style="margin-bottom: 2px;" onclick="myFunction2()">Add2</button>
		<button type="button" class="btn btn-defult" style="margin-bottom: 2px;" onclick="getOrderli()">Get</button>

		<script>
		var i = 2;
		function myFunction() {

			var labelTitle = document
			.createElement("label");
			labelTitle.innerHTML = "Step: Title";

			var newStep = document
			.createElement("input");
			newStep.setAttribute('type', 'text');
			newStep.setAttribute('placeholder',
				'Enter title');
			newStep.setAttribute('class',
				'form-control');
			newStep.setAttribute('name', 'title_step_' + i);

			var div = document
			.createElement("div")
			div.setAttribute('id', 'div_step_' + i);
			div.appendChild(labelTitle);
			div.appendChild(newStep)

			//var textnode = document.createTextNode("");
			//newItem.appendChild(textnode);



			var steps = document
			.getElementById("Steps");
			steps.appendChild(div);
			i = i + 1;


		}

		</script>

		<script>
		function getOrderli(){

			var liIds = $('#Steps2 li').map(function(i,n) {
				return $(n).attr('id');
			}).get().join(',');
			console.log(liIds);
		}

		</script>

		
		<script>
		
		$(function() {

			$('.handles').sortable({
				handle: 'span'
			}

		});

		});

		</script>
	</form>
</body>
</html>

