<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Media/css/owl.carousel.css">
	<link rel="stylesheet" href="/Media/css/responsive.css">
	<link rel="stylesheet" href="/Media/css/style.css">
	<title>Đăng kí</title>

</head>

<body>
	<?php include_once "/Apps/Class/KhachHang.php";
	require_once "/Apps/Libs/Database.php";
	include_once "header.php";
	include "menu.php" ;
	include "/Apps/Class/themDk.php" ?>
	<div class="">

		<h1 style="font-weight: bold;
							text-align: center;
							border-width: 2px 73px 2px 73px;
							border-style: solid;
							padding: 15px;
								 outline: 0px;
							border-radius: 37px;">Đăng kí</h1>
		<!------------themDk.php------>

		<div class="container">
			<form action="" method="post" class="form-horizontal">
				<?php if (isset($error)) : ?>
					<?php thongbao('danger', $error) ?>
				<?php endif ?>
				<div class="col-xs-6">
					<label class="control-lable col-sm-4">Tên tài khoản</label><br>
					<input class="form-control" type="text" name="hoten" placeholder="Nhập tên..." /><br>
					<label class="control-lable col-sm-4">Mật khẩu</label><br>
					<input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu" /><br>
					<label class="control-lable col-sm-4">Xác nhận mật khẩu</label><br>
					<input class="form-control" type="password" name="nhaplaipass" placeholder="Xác nhận lại mật khẩu" /><br>
				</div>

				<div class="col-xs-6">
					<label class="control-lable col-sm-4">Thư điện tử</label><br>
					<input class="form-control" type="email" name="email" placeholder="Thư điện tử của bạn..." />
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input name="dangki" type="submit" class="btn btn-default" value="Đăng kí">
						<br>
					</div>
				</div>

			</form>
		</div>
	</div>
	<?php include "footer.php" ?>
	<script src="/Media/js/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script src="/Media/js/bootstrap.min.js"></script>

	<!-- jQuery sticky menu -->
	<script src="/Media/js/owl.carousel.min.js"></script>
	<script src="/Media/js/jquery.sticky.js"></script>

	<!-- jQuery easing -->
	<script src="/Media/js/jquery.easing.1.3.min.js"></script>

	<!-- Main Script -->
	<script src="/Media/js/main.js"></script>

	<!-- Slider -->
	<script type="text/javascript" src="/Media/js/bxslider.min.js"></script>
	<script type="text/javascript" src="/Media/js/script.slider.js"></script>

</body>

</html>