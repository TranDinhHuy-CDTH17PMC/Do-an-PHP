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
	require_once dirname(__FILE__) . "/../Apps/Class/KhachHang.php";
	?>



</head>

<body>
	<?php
	include "header.php";
	?>
	<?php
	include "menu.php";
	$cthd = new ChitietHoadon();
	$hd = new HoaDon();
	$db = new Database();
	$kh = new Khachhang();
	global $session;
	//Thêm  khách hàng chưa đăng kí tài khoản vào cơ sở dữ liệu
	if (isset($_POST['tao_khachhang_tiemnang'])) {
		$kh->tao_khachhang_tiemnang();
	}
	//Lấy thông tin của sản phẩm 
	$row_ct = $cthd->lay_dulieu_sanpham();
	//Lấy dữ liệu khách hàng tiềm năng mới thêm vào
	if (!empty($kh->get_makh())) {
		$row_hd = $hd->lay_dulieu_khachhang_tiemnang($kh->get_makh());
	} else if (isset($_POST['makh'])) {
		//Lấy dữ liệu khách hàng đã có tài khoản
		$row_hd = $hd->lay_dulieu_khachhang_tiemnang($_POST['makh']);
	} else
		$db->thongbao('danger', 'Bắt buột điền đầy đủ thông tin của bạn');

	//Khi nhấn mua->gữi dữ liệu cần để lập hóa đơn->nhapdulieu() để gán dữ liệu

	if ($hd->kiemtra_nhap()) {
		$hd->nhapdulieu();
		if ($hd->kiemtra_khoitao()) {
			$hd->khoitao_hoadon($row_ct);
		} else
			$db->thongbao('danger', 'Đặt hàng chưa thành công');
	}
	


	$tongtien = 0;
	$tongsp = 0;
	//$hd->nhapdulieu();
	//$hd->them_dulieu_vao_db();

	?>
	<!-- slogan -->
	<div class="container">
		<form method="post" action="donhang.php">
			<div class="col-sm-10" style="background-color: white;">
				<h1><i class="fa fa-bitcoin"></i> CHI TIẾT HÓA ĐƠN</h1>

				<table class="table table-hover table-bordered " style="background-color: white;">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá tiền</th>
							<th>Thành tiền</th>
							<th>Xóa/Sữa</th>
						</tr>
					</thead>
					<tbody>

						<?php if (isset($row_ct) and isset($_SESSION['cart'])) {
							foreach ($row_ct as $row) { ?>
								<tr>
									<td><?php echo $row['TENSP'] ?></td>
									<td><?php echo $_SESSION['cart'][$row['MASP']] ?></td>
									<td><?php echo $row['GIAMOI'] ?></td>
									<td><?php echo $_SESSION['cart'][$row['MASP']] * $row['GIAMOI'] ?></td>
									<?php $tongsp = $tongsp + $_SESSION['cart'][$row['MASP']];
									$tongtien = $tongtien + $_SESSION['cart'][$row['MASP']] * $row['GIAMOI']; ?>
					
									<td>
										<a href="giohang.php" class="btn btn-info btn-sm">Sữa giỏ hàng</a>

									</td>
								<?php  }
						}

						?>
						</tr>
					</tbody>

					<?php if (isset($_POST['username']) or isset($row_hd)) {
						foreach ($row_hd as $row) { ?>
							<tfoot>
								<tr>
									<td>
									<strong>Người mua: <?php echo $row['tenkh'] ?></strong></td>
									<td><?php echo  $tongsp ?></td>
									<td><b>Địa chỉ: <?php echo $row['diachi'] ?></b></td>
									<td><?php echo $tongtien ?></td>
									<td><a href="diachi.php" class="btn btn-danger btn-sm">Sữa hồ sơ</a></td>
									<!---Lấy thông tin của hóa đơn từ <input>-->
									<input type="text" value="<?php echo $row['makh'] ?>" style="display:none" name="makh">
									<input type="number" value="<?php echo $tongsp ?>" style="display:none" name="tongsp">
									<input type="number" value="<?php echo $tongtien ?>" style="display:none" name="tongtien">
									<input type="text" value="<?php echo $row['diachi'] ?>" style="display:none" name="diachi">

								</tr>
							</tfoot>
						<?php }
				}
				?>

				</table>

				<div class="form-group">
					<button type="submit" class="btn-success btn-lg col-sm-3" name="mua">Mua</button>

				</div>

		</form>

	</div>




	</div><br>
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