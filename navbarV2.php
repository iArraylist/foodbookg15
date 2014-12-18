<?php
session_start();
include "confic.inc.php";
?>
<div class="menu-bar">
	<nav>
		<ul>
			<li>
				<a href="HomePage.php">หน้าหลัก</a>
			</li>
			<li>
				|
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">เมนูอาหาร<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<?php 
					$sql = "select * from reci_categories";
					$dbquery = mysql_query($sql);
					$num_rows = mysql_num_rows($dbquery);
					$count = 0;
					while($count<$num_rows){
						$fetcharray = mysql_fetch_array($dbquery);
						$count = $count+1;
						?>
						<li><a id="r-menu-drop" href="categoryType.php?cate_type=<?php echo $fetcharray['reci_category'] ?>"><?php echo $fetcharray['reci_category']; ?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li>
					|
				</li>
					<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">เมนูยอดนิยม<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a id="r-menu-drop" href="showRanking.php">ทุกประเภท</a></li>

					<?php 
					$sql = "select * from reci_categories";
					$dbquery = mysql_query($sql);
					$num_rows = mysql_num_rows($dbquery);
					$count = 0;
					while($count<$num_rows){
						$fetcharray = mysql_fetch_array($dbquery);
						$count = $count+1;
						?>
						<li><a id="r-menu-drop" href="showRanking.php?cate_type=<?php echo $fetcharray['reci_category'] ?>"><?php echo $fetcharray['reci_category']; ?></a></li>
						<?php } ?>
					</ul>
				</li>
				<!-- <li>
					|
				</li> -->
					<li>
						|
					</li>
					<li><?php if(!isset($_SESSION['login_id'])){
						?>
						<a href="register.php">ล็อคอิน/ลงทะเบียน</a><?php } ?>
						<?php if(isset($_SESSION['login_id'])){
							if($_SESSION['login_id']!=1){
						?>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['login_username'];?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a id="r-menu-drop" href="addFood.php">เพิ่มเมนูอาหาร</a></li>
							<li><a id="r-menu-drop" href="favFood.php">เมนูโปรดของฉัน</a></li>
							<li><a id="r-menu-drop" href="userFood.php">เมนูของฉัน</a></li>
							<li><a id="r-menu-drop" href="logout.php">ออกจากระบบ</a></li>
						</ul></li><?php }else { ?>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_SESSION['login_username'];?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a id="r-menu-drop" href="addFood.php">เพิ่มเมนูอาหาร</a></li>
							<li><a id="r-menu-drop" href="">เจัดการเมนูทั้งหมด</a></li>
							<li><a id="r-menu-drop" href="manageIng.php">เจัดการวัตถุดิบ</a></li>
							<li><a id="r-menu-drop" href="manageMenuCate.php">จัดการประเภทอาหาร</a></li>
							<li><a id="r-menu-drop" href="manageUser.php">จัดการผู้ใช้</a></li>
							<li><a id="r-menu-drop" href="favFood.php">เมนูโปรดยอดยินม</a></li>
							<li><a id="r-menu-drop" href="userFood.php">เมนูของฉัน</a></li>
							<li><a id="r-menu-drop" href="logout.php">ออกจากระบบ</a></li>
						</ul></li>
						<?php }
						}?>
					</li>
				</ul>
			</nav>
		</div>