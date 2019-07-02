<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lý nhân viên</title>

	<link rel="stylesheet" href="../Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Media/css/owl.carousel.css">
	<link rel="stylesheet" href="../Media/css/responsive.css">
	<link rel="stylesheet" href="../Media/css/quanly-style.css">
	<link rel="stylesheet" href="../Media/css/quanly-them.css">
	<?php require_once("../Apps/Class/Nhanvien.php");?>
</head>

<body>
	<?php include_once("admin-header.php");
	include_once("admin-menu.php");
	?>
	<div class="container">
		<div class="col-sm-10" style = "background: white;">

			<hr>
			<h2>THÊM NHÂN VIÊN</h2>

			<hr>
			<h4><small>THÔNG TIN CẦN THIẾT</small></h4>
			<hr>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="control-label col-sm-2" for="hoten">Họ tên:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name = "hoten" id="hoten" placeholder="Trần Đình Huy">
					</div>
				</div>
				

				<div class="form-group">
					<label class="control-label col-sm-2" for="sdt">Số điện thoại:</label>
					<div class="col-sm-10">
						<input type="numberphone" class="form-control" name = "sdt" id="sdt" placeholder="0972...">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="ngaysinh">Ngày sinh</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" name = "ngaysinh" id="ngaysinh" placeholder="15/5/2019">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="ngaygianhap">Ngày gia nhập</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" name= "ngaygianhap" id="ngaygianhap" placeholder="21/4/1999">
					</div>
				</div>


				<div class="form-group">
					<label class="control-label col-sm-2" for="manv">Mã nhân viên:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name = "manv" id="manv" value = "nv">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="diachi">Địa chỉ</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name = "diachi" id="diachi" value="Tân Phú">
					</div>
				</div><div class="form-group">
					<label class="control-label col-sm-2" for="luong">Lương</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name = "luong" id="luong" value="1.000 ">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2">
						<div class="radio"><label class="control-label col-sm-2">Giới tính</label>
							<label class="radio-inline"><input type="radio" name="gioitinh" value = "Nữ" checked>Nữ</label>
							<label class="radio-inline"><input type="radio" name="gioitinh" value="Nam">Nam</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						
						<button type="submit" class="btn btn-success">Thêm</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php $nv = new Nhanvien();
	if($nv->kiemtra_khoitao()==true)
	$nv->them_nhanvien();?>
	<?php include_once("admin-footer.php")?>
	<script type="text/javascript" src="../Media/js/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script type="text/javascript" src="../Media/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="../Media/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../Media/js/jquery.sticky.js"></script>

	<script type="text/javascript" src="../Media/js/jquery.easing.1.3.min.js"></script>

	<!-- Main Script -->
	<script type="text/javascript" src="../Media/js/main.js"></script>
</body>
</html>