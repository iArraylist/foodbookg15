<?php 
	if(isset($_POST['s_menus'])){
		$search_menu=$_POST['s_menus'];
	}else {$search_menu="";} ?>
	
		<form action="search.php" method="POST">
		
		<input name="s_menus" type="text" value="<?php echo $search_menu; ?>" required>
		<input type="submit" name"btn_searchbymenu" >
		</form>