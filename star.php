<?php 


?>

<script type="tect/javascript">
function list_result(){
	$hr = new XMLHttpRequest();
	hr.onreadystatechange = function(){
		if (hr.readyState ==4 && hr.status ==200 ){
			$s = document.getElemntById('myStars');
			$x = hr.responseText;
			if($x == "0") ($s.src = ".png";)
			if($x == "1") ($s.src = ".png";)
			if($x == "2") ($s.src = ".png";)
			if($x == "3") ($s.src = ".png";)
			if($x == "4") ($s.src = ".png";)
			if($x == "5") ($s.src = ".png";)

		}
	}
}
	hr.open("GET", "getResults.php?id"<?php echo $aid; ?>",true);
	hr.send();

</script>