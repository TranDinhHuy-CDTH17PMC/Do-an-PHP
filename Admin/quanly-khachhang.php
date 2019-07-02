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

	<?php include_once  "../Apps/Class/KhachHang.php";
	include_once "../Apps/Libs/Database.php"?>
</head>

<body>
	<?php include_once("admin-header.php");
	
	?>
	<?php include_once("admin-menu.php");?>

	<div class="container">

		<div class="col-sm-10" style="background-color: white;">
			<h1><i class="fa fa-3x fa-user"  ></i> 	QUẢN LÝ KHÁCH HÀNG</h1>
			<table class="table table-hover table-bordered " style="background-color: white;">
				<thead>
					<tr>
						<th>Họ tên</th>
						<th>Mã</th>
						<th>Tên tài khoản</th>
						<th>Địa chỉ</th>
						<th>Số CMND</th>
						<th>Số điện thoại</th>
						<th>Xóa/Sữa</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
						$nv = new Khachhang();
						if($nv->kiemtra_khoitao()==true)
							$nv->capnhat_Khachhang();
				
					
					$rowsdata = $nv->lay_Dulieu_tu_db();
					foreach($rowsdata as $row){
					?>
					<tr>
						<td>
							<?php echo $row['tenkh']?>
						</td>
						<td>
							<?php echo $row['makh']?>
						</td>
						<td>
							<?php echo $row['username']?>
						</td>
						<td>
							<?php echo $row['diachi']?>
						</td>
						<td>
							<?php echo $row['cmnd']?>
						</td>
						<td>
							<?php echo $row['sdt']?>
						</td>

						<td>
							<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['makh']?>">Sữa</button>
							<button type="button" class="btn btn-danger btn-xs">Xóa</button>
						</td>
						<div class="modal fade" id="myModal<?php echo $row['makh']?>" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">CẬP NHẬT KHÁCH HÀNG</h4>
									</div>
									<form action="quanly-khachhang.php" method="post">
										<div class="modal-body">
											<div class="form-group">
												<label class="control-label col-sm-2" for="tenkh">Họ tên:</label>
												<div>
													<input type="text" class="form-control" name="tenkh" id="tenkh" placeholder="Trần Đình Huy" value="<?php echo $row['tenkh']?>">
												</div>
											</div>


											<div class="form-group">
												<label class="control-label col-sm-2" for="sdt">Số điện thoại:</label>
												<div class="">
													<input type="numberphone" class="form-control" name="sdt" id="sdt" placeholder="0972..." value=<?php echo $row[ 'sdt']?>>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="cmnd">Số CMND</label>
												<div class="">
													<input type="text" class="form-control" name="cmnd" id="cmnd" value=<?php echo $row[ 'cmnd']?>>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="makh">Mã nhân viên:</label>
												<div class="">
													<input type="text" class="form-control" name="makh" id="makh" placeholder="Trần Đình Huy" value=<?php echo $row[ 'makh']?> readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="diachi">Địa chỉ</label>
												<div class="">
													<input type="text" class="form-control" name="diachi" id="diachi" placeholder="Trần Đình Huy" value="<?php echo $row['diachi']?>">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="username">Địa chỉ</label>
												<div class="">
													<input type="text" class="form-control" name="username" id="diachi" placeholder="Trần Đình Huy" value="<?php echo $row['username']?>" readonly>
												</div>
											</div>
											

											<div class="form-group">
												<div class="col-sm-offset-2">
													<div class="radio"><label class="control-label col-sm-2">Giới tính</label>
											
														<label class="radio-inline"><input type="radio" name="gioitinh" value="Nữ">Nữ</label>
														<label class="radio-inline"><input type="radio" name="gioitinh" value="Nam" checked >Nam</label>
													</div>
												</div>
											</div>
										<button type="submit" name = "capnhat_khachhang" class="btn btn-success">Cập nhật</button>

										</div>
								</div>
								<div class="modal-footer">
									
									</form>
								</div>
							</div>
						</div>


						<?php }
					
						?>
					
					</tr>
				</tbody>
				<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['makh']?>">Thêm mới</button>
			</table>

		</div>

		
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