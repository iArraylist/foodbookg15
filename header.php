<style>
.headertop {

	height: 46px;
	width: 100%;
	min-width: 1080px;
	background-color: #FFA62F;
	border-bottom: solid;
	border-width: 2px;
	border-color: #FFDB58;
	-webkit-box-shadow:0 2px 2px -2px rgba(0, 0, 0, .52);
	padding-top: 5px;
}

.btn-primary{
	height: 27px;
	padding: 3px 8px 8px 8px;
	color: #000000;
}
</style>
<div class="headertop">
	<?php
	session_start();
	?>
	<center>
	<table height="27px">
		<tr>
			<td style="width:140px;" align="center"><?php include "searchByMenuBar.php"; ?></td>
			<td style="width:500px;" align="center"><?php include "searchByIngBar.php"; ?></td>
			<?php
			if(!isset($_SESSION['login_username'])){
				?>
				<td align="center"><?php include "login.php"; ?></td>
				<td style="width:75px;" align="center">
					<form action="register.php" method="post">
						<button class="btn btn-primary " type="submit" name="gotoRegisForm">Register</button>
					</form>
				</td>
			</tr>
		</table>
		</center>
		<?php
	} else{
		?>
		<td style="width:438px;" align="right" >
			<a href="userFood.php"><img src="images/Food-book.png"></a> </a>
			<a href="addFood.php"><img src="images/add-food.png"></a>
			<a href="logout.php"><img src="images/logout.png"></a>
		</td>
	</tr>
</table>
</center>
	
<?php
}
?>


</div>