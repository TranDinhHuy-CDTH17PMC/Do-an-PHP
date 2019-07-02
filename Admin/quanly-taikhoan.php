<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lý tài khoản</title>
	<link rel="stylesheet" href="../Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Media/css/owl.carousel.css">
	<link rel="stylesheet" href="../Media/css/responsive.css">
	<link rel="stylesheet" href="../Media/css/quanly-style.css">
	<link rel="stylesheet" href="../Media/css/quanly-them.css">
	<?php include_once "../Apps/Libs/Database.php"?>
	<?php include_once "../Apps/Class/TaiKhoan.php"?>
</head>

<body>
	<?php include_once("admin-header.php");
	
	?>
	<?php include_once("admin-menu.php");?>

	<div class="container">

		<div class="col-sm-10" style="background-color: white;">
			<h1><i class="fa fa-4x fa-user"  ></i> 	QUẢN LÝ TÀI KHOẢN</h1>
			<table class="table table-hover table-bordered " style="background-color: white;">
				<thead>
					<tr>
						<th>Tài khoản</th>
						<th>Mật khẩu</th>
						<th>Email</th>
						<th>Xóa/Sữa</th>
					</tr>
				</thead>
				<tbody>
					<?php $tk = new TaiKhoan();
			
					if($tk->kiemtra_khoitao()==true)
						$tk->capnhat_taikhoan();
					$rowsdata = $tk->lay_Dulieu_tu_db();
					foreach($rowsdata as $row){					
						$gt = $tk->kiemtra_trangthai($row['TRANGTHAI']);
					?>
					<tr class = "<?php echo $gt?>">
						<form method="post" action="quanly-taikhoan.php">
						<td><?php echo $row['USERNAME']?></td>
						<td><?php echo $row['PASSWORD']?></td>
						<td><?php echo $row['EMAIL']?></td>
						<td>
							<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['USERNAME']?>">Sữa</button>
							<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row['USERNAME']?>">Thông tin</button>
							<button type="submit" class="btn btn-danger btn-xs" >Xóa</button>
						</td>
						</form>
						<form action = "quanly-taikhoan.php" method="post">
						<div class="modal fade" id="myModal<?php echo $row['USERNAME']?>" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">CẬP NHẬT TÀI KHOẢN</h4>
									</div>
									
										<div class="modal-body">
											<div class="form-group">
												<label class="control-label col-sm-2" for="hoten">Tên tài khoản</label>
												<div>
													<input type="text" class="form-control" name = "username" id="hoten"
													 placeholder="Trần Đình Huy" value = "<?php echo $row['USERNAME']?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="ngaysinh">Ngày sinh</label>
												<div class="">
													<input type="text" class="form-control" name = "password" id="ngaysinh"  
													value = <?php echo $row['PASSWORD'];?>>
												</div>
											</div>
										
											<div class="form-group">
												<label class="control-label col-sm-2" for="diachi">Email</label>
												<div class="">
													<input type="email" class="form-control" name="email" id="luong"
													 placeholder="" value = <?php echo $row['EMAIL'] ?>>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-2">
													<div class="radio"><label class="control-label col-sm-2">Giới tính</label>
														<label class="radio-inline"><input type="radio" name="trangthai" value="active" checked>Active</label>
														<label class="radio-inline"><input type="radio" name="trangthai" value="deactive">Deactive</label>
													</div>
												</div>
											</div>
											<button type="submit" class="btn btn-success" >Cập nhật</button>
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
</html><!doctype html>
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
</head>

<body>
	<?php include_once("admin-header.php");
	include_once("admin-menu.php");
	?>
	<?php include_once("admin-footer.php")?>
		<script  type="text/javascript" src="../Media/js/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script  type="text/javascript" src="../Media/js/bootstrap.min.js"></script>

	<script  type="text/javascript" src="../Media/js/owl.carousel.min.js"></script>
	<script  type="text/javascript" src="../Media/js/jquery.sticky.js"></script>

	<script  type="text/javascript" src="../Media/js/jquery.easing.1.3.min.js"></script>

	<!-- Main Script -->
	<script  type="text/javascript" src="../Media/js/main.js"></script>
</body>
</html>