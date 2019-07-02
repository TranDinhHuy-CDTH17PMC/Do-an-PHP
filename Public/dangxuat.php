<div class="loginmodal-container">
	<h1> <?php

			if (isset($_SESSION['username']))
				echo $_SESSION['username'];
			else
				echo "" ?></h1>
	<?php
	require_once dirname(__FILE__) . "/../Apps/Class/NguoiDung.php";
	$man = new NguoiDung();
	?>

	<form method="post">
		<input type="submit" name="logout" class="login loginmodal-submit btn btn-default" value="Đăng Xuất">
		<?php if(isset($_SESSION['username'])){?>
		<a class="btn btn-default btn-block btn-lg" role="button" href="khachhang.php">Hồ sơ</a>
		<?php }?>
	</form>


	<div class="login-help">

		<?php
		if (isset($_POST['logout'])) {
			if (isset($_SESSION['username'])) {
				unset($_SESSION['username']);
				unset($_SESSION['cart']);
				header("Location: index.php");
				echo " <script>alert('Đăng xuất thành công')</script>";
			}
		}
		?>
	</div>
</div>