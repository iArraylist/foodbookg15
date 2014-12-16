
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
		width: 610px;
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
		
		<ul id="Steps" class="handles list">
			<li id="li_step_1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
				<div id="div_step_1" >
					<label>Step: Title</label>
					<input type="text" class="form-control" placeholder="Enter title" name="title_step_1">
					<label>Picture</label><br>
					<img id="uploadPreview_1" />
					<input style="margin-bottom:20px" id="uploadImage_1" type="file" name="imgStep_1" onchange="PreviewImage('uploadImage_1','uploadPreview_1');" />
					<label>How to</label>
					<textarea style="max-width: 578px;" class="form-control" rows="5" placeholder="Enter description" name="howto_step_1"></textarea>
				</div>
			</li>
		</ul>

		<script>
		var i = 2;
		function addSteps() {

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

			var labelPicture = document
			.createElement("label");
			labelPicture.innerHTML = "Picture";

			var br = document.createElement("br");

			var img = document
			.createElement("img");
			img.setAttribute('id', 'uploadPreview_' + i);

			var upimg = document
			.createElement("input");
			upimg.setAttribute('style','margin-bottom:20px');
			upimg.setAttribute('id', 'uploadImage_' + i);
			upimg.setAttribute('type', 'file');
			upimg.setAttribute('name', 'imgStep_' + i);
			upimg.setAttribute('onchange', 'PreviewImage(\'uploadImage_' + i +'\',\'uploadPreview_'+ i +'\');')

			var labelHowTo = document
			.createElement("label");
			labelHowTo.innerHTML = "How to";

			var howto = document
			.createElement("textarea");
			howto.setAttribute('style', 'max-width: 578px;');
			howto.setAttribute('placeholder',
				'Enter description');
			howto.setAttribute('class',
				'form-control');
			howto.setAttribute('name', 'howto_step_' + i);
			howto.setAttribute('rows', '5');

			var div = document
			.createElement("div")
			div.setAttribute('id', 'div_step_' + i);
			div.appendChild(labelTitle);
			div.appendChild(newStep);
			div.appendChild(labelPicture);
			div.appendChild(br);
			div.appendChild(img);
			div.appendChild(upimg);
			div.appendChild(labelHowTo);
			div.appendChild(howto);


			var span = document
			.createElement("span");
			span.setAttribute('class', 'ui-icon ui-icon-arrowthick-2-n-s');

			var li = document
			.createElement("li");
			li.setAttribute('id', 'li_step_' + i);
			li.setAttribute('draggable', true);
			li.appendChild(span);
			li.appendChild(div);


			//var textnode = document.createTextNode("");
			//newItem.appendChild(textnode);



			var steps = document
			.getElementById("Steps");
			steps.appendChild(li);
			i = i + 1;

			$('.handles').sortable('refresh');
			console.log("test");

		}



		function PreviewImage(upimgID,imgID) {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById(upimgID).files[0]);
			oFReader.onload = function (oFREvent) {
				document.getElementById(imgID).src = oFREvent.target.result;
				document.getElementById(imgID).setAttribute('style', 'height:150px;margin-bottom:5px;')
			};
		};

		</script>





		<button type="button" class="btn btn-defult" style="margin-bottom: 2px;" onclick="addSteps()">Add</button>
		<button type="button" class="btn btn-defult" style="margin-bottom: 2px;" onclick="getOrderli()">Get</button>

		

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
			});

		});



		</script>
	</form>
</body>
</html>

