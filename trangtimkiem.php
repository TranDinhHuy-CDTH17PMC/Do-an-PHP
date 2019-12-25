<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Tìm kiếm nâng cao</title>
	<link rel="stylesheet" href="Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="Media/css/owl.carousel.css">
	<link rel="stylesheet" href="Media/css/responsive.css">
	<link rel="stylesheet" href="Media/css/style.css">
	<link rel="stylesheet" href="Media/css/index.css">
	<style>
		.tieudesanpham {
			font-weight: bold;
			text-align: center;
			border-width: 2px 73px 2px 73px;
			border-style: solid;
			padding: 15px;
			border-radius: 37px;
			border-color: #bfa8e8;
			color: #bfa8e8;
		}
	</style>
</head>

<body>
	<?php 
	
	require_once dirname(__FILE__) . "/Apps/Class/SanPham.php";
	require_once dirname(__FILE__) . "/Apps/Libs/Database.php" ;
	include_once "header.php";
	include "menu.php";

	?>
	<form action="trangtimkiem.php" class="search-form" method="post" name="timkiem">
		<div class="container">
			<div class="col-md-12">

				<div class="form-group has-feedback">

					<label for="search">Tìm kiếm</label>
					<input type="text" class="form-control" name="search"  placeholder="Nhập từ khóa">
					<span class="glyphicon glyphicon-search form-control-feedback"></span>
				</div>

			</div>
			<br>


			<div class="form-group row">
				<div class="col-xs-2">
					<label for="ex1">Giá đầu</label>
					<input class="form-control" id="ex1" type="text" name="giadau">

				</div>
				<div class="col-xs-2">
					<label for="ex2">Giá cuối</label>
					<input class="form-control" id="ex2" type="text" name="giacuoi">
				</div>
				<div class="col-xs-4">
					<?php
					$db_tl = new Database();
					$db_tl->set_bang('theloai');
					$rows = $db_tl->select_All();
					?>
					<label for="sel1">Thể loại:</label>
					<select class="form-control" name="theloai">
						<option></option>
						<?php foreach ($rows as $row) {
							echo '<option value="' . $row['maloai'] . '">' . $row['tenloai'] . '</option>';
						} ?>
					</select>

				</div>
				<?php
				$db_ncc = new Database();
				$db_ncc->set_bang('NhaCungCap');
				$rows = $db_ncc->select_All();


				?>
				<div class="col-xs-4">
					<label for="sel2">Nhà sản xuất:</label>

					<select class="form-control" id="sel2" name="nsx">
						<option></option>
						<?php foreach ($rows as $row) {
							echo '<option value="' . $row['MaNhaCungCap'] . '">' . $row['TenNhaCungCap'] . '</option>';
						} ?>


					</select>

				</div>
				<div class="col-xs-2">
					<label for="ex3">Tìm kiếm nâng cao</label>
					<input type="submit" class="form-control" value="Tìm nâng cao" id="ex3" name='tim'>
				</div>

			</div>
	</form>



	<h1 class="tieudesanpham">
		<p>Kết quả tìm kiếm</p>
	</h1>

	<?php
	$sp = new SanPham();
	$sp->Ketqua_timkiem();
	?>


	</div>


	<?php include "footer.php" ?>
	<script src="Media/js/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script src="Media/js/bootstrap.min.js"></script>

	<!-- jQuery sticky menu -->
	<script src="Media/js/owl.carousel.min.js"></script>
	<script src="Media/js/jquery.sticky.js"></script>

	<!-- jQuery easing -->
	<script src="Media/js/jquery.easing.1.3.min.js"></script>

	<!-- Main Script -->
	<script src="Media/js/main.js"></script>

	<!-- Slider -->
	<script type="text/javascript" src="Media/js/bxslider.min.js"></script>
	<script type="text/javascript" src="Media/js/script.slider.js"></script>
</body>

</html>