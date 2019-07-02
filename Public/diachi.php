<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tạo hóa đơn mua hàng</title>
	<link rel="stylesheet" href="../Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Media/css/owl.carousel.css">
	<link rel="stylesheet" href="../Media/css/responsive.css">
	<link rel="stylesheet" href="../Media/css/style.css">
	<link rel="stylesheet" href="../Media/css/giohang.css">
	<?php include dirname(__FILE__) . "/../Apps/Class/HoaDon.php";
	require_once dirname(__FILE__) . "/../Apps/Libs/Database.php";
	?>



</head>

<body>
	<?php
	include "header.php";
	include "menu.php";
	?>


	<div class="title">
		<div class="col-md-12">
			<div class="title1">
				<h2>Địa chỉ đặt hàng</h2>
			</div>
		</div>
	</div>
	<?php
	$hd = new HoaDon();
	if (isset($_SESSION['username'])) {
		$rows = $hd->lay_dulieu_khachhang();
		if (empty($rows))
		{
			echo "<div class = 'col-sm-9'>";
			$hd->thongbao('danger', 'Bạn chưa cập nhật thông tin người dùng');
			echo "</div>";
			echo "<a class = 'btn btn-warning btn-lg' href = 'khachhang.php'>Cập nhật thông tin tại đây </a>";

		}
		if (isset($rows)) {
			?>
			<!-- slogan -->

			<div class="container">
				<section class="giaohang">
					<?php foreach ($rows as $row) { ?>
						<form class="form-horizontal" name="giaohang" method="post" action="donhang.php">
							<div class="container">

								<div class="form-group col-sm-10">
									<label class="label-control col-sm-4">Tên người mua</label>
									<input class="form-control col-sm-4" type="text" name="tenkh" value="<?php echo $row['tenkh'] ?>">
									<label class="label-control col-sm-4">Số điện thoại</label>
									<input class="form-control col-sm-4" type="text" name="sdt" value="<?php echo $row['sdt'] ?>">
								</div>

								<div class="form-group col-sm-12">
									<div class="form-group col-sm-6">
										<label class="label-control col-sm-4">Tỉnh thành</label>
										<select class="form-control" form="giaohang">
											<option value="" selected>Chọn tỉnh/thành phố</option>
											<option value="TP Hồ Chí Minh">TP HCM</option>
											<option value="Hà Nội">Hà Nội</option>
										</select>
									</div>
									<div class="form-group col-sm-4">
										<label class="label-control col-sm-4">Quận</label>
										<select class="form-control">
											<option value="" selected>Chọn Quận</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="2">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
									</div>
									<div class="form-group col-sm-6">
										<label class="label-control col-sm-4">Địa chỉ nhà,đường</label>
										<input class="form-control col-sm-4" type="text" name="diachi" min="5" max="100" value="<?php echo $row['diachi'] ?>">
									</div>

									<input style="display:none;" value="<?php echo $row['makh'] ?>" name="makh">
									<div class="form-group-lg col-sm-8">
										<button name="submit" type="submit" class="btn btn-info btn-lg">
											Kiểm tra thông tin
											<i class="fa fa-shopping-cart"></i></button>
									</div>
								</div>


						</form>
					<?php }
			}
		} else { ?>


			</section>
			<section class="giaohang">
				<form class="form-horizontal" name="giaohang" method="post" action="donhang.php">
					<div class="container">

						<div class="form-group col-sm-10">
							<label class="label-control col-sm-4">Tên người mua</label>
							<input class="form-control col-sm-4" type="text" name="tenkh" value="">
							<label class="label-control col-sm-4">Số điện thoại</label>
							<input class="form-control col-sm-4" type="text" name="sdt">
						</div>

						<div class="form-group col-sm-12">
							<div class="form-group col-sm-6">
								<label class="label-control col-sm-4">Tỉnh thành</label>
								<select class="form-control" name="tinhthanh">
									<option value="" selected></option>
									<option value="TP Hồ Chí Minh">TP HCM</option>
									<option value="Hà Nội">Hà Nội</option>
								</select>
							</div>
							<div class="form-group col-sm-4">
								<label class="label-control col-sm-4">Quận</label>
								<select class="form-control" name="quanhuyen">
									<option value="" selected></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="2">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
							</div>
							<div class="form-group col-sm-6">
								<label class="label-control col-sm-4">Địa chỉ nhà,đường</label>
								<input class="form-control col-sm-4" type="text" name="duongnha" value="">
							</div>
							<div class="form-group-lg col-sm-8">
								<button name="tao_khachhang_tiemnang" type="submit" class="btn btn-success btn-lg">
									Đặt hàng
									<i class="fa fa-shopping-cart"></i></button>
							</div>
						</div>


				</form>
			<?php }


		?>
		</section>

	</div>

	<!-- giỏ hàng -->

	<!-- giao hành -->



	<!-- footer -->
	<?PHP
	include "footer.php"
	?>




	<!-- Latest jQuery form server -->
	<script src="../Media/js/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script src="../Media/js/bootstrap.min.js"></script>

</body>

</html>