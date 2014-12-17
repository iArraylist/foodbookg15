<?php 
	if(isset($_POST['s_menus'])){
		$search_menu=$_POST['s_menus'];
	}else {$search_menu="";} ?>
	
		<form action="search.php" method="get">
		<input name="s_menus" class="form-control" style="width:89%;display:initial;margin-top: 0px;height: 33px;" type="text" value="<?php echo $search_menu; ?>" required>
		<input type="submit" name"btn_searchbymenu" style="width:10%" class="btn defult" value="ค้นหา" >
		</form>