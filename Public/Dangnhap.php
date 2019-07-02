<div class="loginmodal-container">
	<h1>ĐĂNG NHẬP</h1><br>
	<?php include_once dirname(__FILE__)."/../Apps/cookie.php";
	require_once "../Apps/Class/TaiKhoan.php";

	
	?>

	<form method="post">
		<input type="text" name="username" placeholder="Tài khoản">
		<input type="password" name="password" placeholder="Mật khẩu">
		<input type="submit" name="login" class="login loginmodal-submit" value="Đăng nhập">
	</form>
	<?php
	$tt;
	$tk = new TaiKhoan();
	if(isset($_POST['login'])){
		if(empty($_POST['username']) and empty($_POST['password'])){
		echo " <script>alert('Trống rỗng')</script>";
	}else if($tk->kiemtra_dangnhap()==true){
			$ss = $_SESSION['username'];
		
			echo " <script>alert('$tt')</script>";
		}
		else{
			unset($_SESSION['cart']);
			echo " <script>alert('Tài khoản chưa tồn tại hoặc mật khẩu sai')</script>";
			}
			
	}
	
	
	?>
	
	<div class="login-help">
		<a href="dangki.php">Đăng ký</a> - <a href="#">Quên mật khẩu?</a>
		<?php
		
		?>
</div>
</div>


