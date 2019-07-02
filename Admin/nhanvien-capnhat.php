<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lý khách hàng</title>
	<link rel="stylesheet" href="../Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Media/css/owl.carousel.css">
	<link rel="stylesheet" href="../Media/css/responsive.css">
	<link rel="stylesheet" href="../Media/css/quanly-style.css">
	<link rel="stylesheet" href="../Media/css/quanly-them.css">

	<?php include_once  "../Apps/Class/Nhanvien.php"?>
</head>

<body>
	<?php include_once("admin-header.php");
	
	?>
	<?php include_once("admin-menu.php");?>

	<div class="container">

		<div class="col-sm-10" style="background-color: white;">
			<h1><i class="fa fa-4x fa-user"  ></i> 	QUẢN LÝ NHÂN VIÊN</h1>
			<table class="table table-hover table-bordered " style="background-color: white;">
				<thead>
					<tr>
						<th>Họ tên</th>
						<th>Mã</th>
						<th>Ngày sinh</th>
						<th>Địa chỉ</th>
						<th>Lương</th>
						<th>Xóa/Sữa</th>
					</tr>
				</thead>
				<tbody>
					<?php $nv = new Nhanvien();
					if($nv->kiemtra_khoitao()==true)
					$nv->capnhat_nhanvien();
					$rowsdata = $nv->lay_Dulieu_tu_db();
					foreach($rowsdata as $row){
					?>
					<tr>
						<td><?php echo $row['hoten']?></td>
						<td><?php echo $row['manv']?></td>
						<td><?php echo $row['ngaysinh']?></td>
						<td><?php echo $row['diachi']?></td>
						<td><?php echo number_format($row['luong'])?></td>
		

						<td>
							<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['manv']?>">Sữa</button>
							<button type="button" class="btn btn-danger btn-xs">Xóa</button>
						</td>
						<div class="modal fade" id="myModal<?php echo $row['manv']?>" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">CẬP NHẬT NHÂN VIÊN</h4>
									</div>
									<form action = "nhanvien-capnhat.php" method="post">
										<div class="modal-body">
											<div class="form-group">
												<label class="control-label col-sm-2" for="hoten">Họ tên:</label>
												<div>
													<input type="text" class="form-control" name = "hoten" id="hoten" placeholder="Trần Đình Huy" value = "<?php echo $row['hoten']?>">
												</div>
											</div>
										

											<div class="form-group">
												<label class="control-label col-sm-2" for="sdt">Số điện thoại:</label>
												<div class="">
													<input type="numberphone" class="form-control" name = "sdt" id="sdt" placeholder="0972..." value = <?php echo $row['sdt']?>>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="ngaysinh">Ngày sinh</label>
												<div class="">
													<input type="date" class="form-control" name = "ngaysinh" id="ngaysinh"  value = <?php echo $row['ngaysinh'];?>>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="ngaygianhap">Ngày gia nhập</label>
												<div class="">
													<input type="date" name = "ngaygianhap" class="form-control" id="ngaygianhap"  value = <?php echo $row['ngaygianhap']?>>
												</div>
											</div>


											<div class="form-group">
												<label class="control-label col-sm-2" for="manv">Mã nhân viên:</label>
												<div class="">
													<input type="text" class="form-control" name = "manv" id="manv" placeholder="Trần Đình Huy" value = <?php echo $row['manv']?> readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="diachi">Địa chỉ</label>
												<div class="">
													<input type="text" class="form-control" name="diachi" id="diachi" placeholder="Trần Đình Huy" value = "<?php echo $row['diachi']?>">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="diachi">Lương</label>
												<div class="">
													<input type="text" class="form-control" name="luong" id="luong" placeholder="Trần Đình Huy" value = <?php echo $row['luong'] ?>>
												</div>
											</div>

											<div class="form-group">
												<div class="col-sm-offset-2">
													<div class="radio"><label class="control-label col-sm-2">Giới tính</label>
														
														<label class="radio-inline"><input type="radio" name="gioitinh" value="Nữ" checked>Nữ</label>
														<label class="radio-inline"><input type="radio" name="gioitinh" value="Nam">Nam</label>
													</div>
												</div>
											</div>
											
										</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success" >Cập nhật</button>
									</form>
								</div>
							</div>
						</div>
		

					<?php }
					
						?>
		</tr>
		</tbody>
		</table>

	</div>

<?php 	$nv = new Nhanvien();
					?>
	</div>
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