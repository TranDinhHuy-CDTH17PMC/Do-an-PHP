<!doctype html>
<html>
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thông tin khách hàng</title>
	<link rel="stylesheet" href="../Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Media/css/owl.carousel.css">
	<link rel="stylesheet" href="../Media/css/responsive.css">
	<link rel="stylesheet" href="../Media/css/style.css">
	<style>
		.row.content {
			height: 1500px
		}
		.sidenav {
			background-color: #f1f1f1;
			height: 100%;
		}
		
		
		footer {
			background-color: #555;
			color: white;
			padding: 15px;
		}

		
		@media screen and (max-width: 767px) {
			.sidenav {
				height: auto;
				padding: 15px;
			}
			.row.content {
				height: auto;
				width: 100%;
			}
		}
	</style>

</head>

<body>
	<?php include_once "../Apps/Class/KhachHang.php";
	require_once "../Apps/Libs/Database.php";
		include_once "header.php";
	
	?>
	<div class="container-fluid">
		<div class="row content" style="width: 100%;">
			<div class="col-sm-3 sidenav">
				<h4>Tên tài khoản</h4>
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="#section1">Tài khoản</a>
					</li>
					<li><a href="giohang.php">Giỏ hàng</a>
					</li>
					<li><a href="#">Thông báo cho bạn</a>
					</li>
					<li><a href="#diachi">Sổ địa chỉ</a>
					</li>
				</ul><br>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Tìm kiếm giỏ hàng">
					<span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
				


					</button>
					</span>
				</div>
			</div>

			<div class="col-sm-9">
				<?php $kh = new Khachhang();
				$db = new Database();
				//Kiểm tra hành động cập nhật
				if(isset($_POST['capnhat_khachhang'])){
					//Gọi phương thức cập nhật
					$kh->capnhat_Khachhang();
				}else if(isset($_POST['them_khachhang'])){
					$kh->nhapdulieu();
					if($kh->kiemtra_khoitao()==true){
						$kh->them_Dulieu_vao_db();
					}
					else
					$db->thongbao('danger','Điền đầy đủ thông tin vào');
					
				}
					
				$rows = $kh->lay_dulieu_cua_khachhang();
			
				if(!empty($rows)){
				foreach($rows as $row){	
				?>
				<form class="form-horizontal" action="khachhang.php" method ="post">
					<b></b><h3>THÔNG TIN TÀI KHOẢN</h3></b>
				<hr>
				<h3> Tên tài khoản: <strong><?php echo $row['username'] ?>
				<input name = 'username' value = "<?php echo $row['username'] ?>"
				 style="display:none;"></strong></h3>
				<hr>
				
					<div class="form-group">
						<label class="control-label col-sm-2" for="hoten">Họ tên:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="hoten" placeholder="Trần Đình Huy"
							value="<?php echo $row['tenkh'] ?>" name="tenkh">
							<input type="text" class="form-control" style="display:none;"
							value="<?php echo $row['makh'] ?>" name="makh">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="cmnd">CMND:</label>
						<div class="col-sm-10">
							<input value="<?php echo $row['cmnd'] ?>" name="cmnd"
							type="text" class="form-control" id="cmnd">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="sdt">Số điện thoại:</label>
						<div class="col-sm-10">
							<input type="numberphone" 
							value="<?php echo $row['sdt'] ?>" name="sdt"
							class="form-control" id="sdt" placeholder="0972...">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Mật khẩu cũ:</label>
						<div class="col-sm-10">
							<input name=""
							type="password" class="form-control" id="pwd" placeholder="Enter password">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd2">Mật khẩu mới:</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="pwd2" placeholder="Enter password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="radio"><label class="control-label col-sm-2">Giới tính</label>
								<label class="radio-inline"><input type="radio" name="gioitinh" value="Nữ" checked>Nữ</label>
								<label class="radio-inline"><input type="radio" name="gioitinh" value="Nam">Nam</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="hoten">Địa chỉ:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="hoten" placeholder="Trần Đình Huy"
							value="<?php echo $row['diachi'] ?> " name="diachi">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name="capnhat_khachhang" class="btn btn-success">Cập nhật</button>
						</div>
					</div>
				</form>

				<?php }
			}
			else {
				echo '<form class="form-horizontal" action="khachhang.php" method ="post">
				<b></b><h3>THÔNG TIN TÀI KHOẢN</h3></b>
				<hr>';
				if(isset($_SESSION['username'])){
				echo '<h3> Tên tài khoản: <strong> '.$_SESSION['username'].'
				<input type = "text" name = "username " value = "'.$_SESSION['username'].'"';
				echo 'style="display:none;"></strong></h3>';}
				echo '<hr>
				
					<div class="form-group">
						<label class="control-label col-sm-2" for="hoten">Họ tên:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="hoten" placeholder="Trần Đình Huy"
							 name="tenkh">
							<input type="text" class="form-control" style="display:none;"
							 name="makh">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="cmnd">CMND:</label>
						<div class="col-sm-10">
							<input  name="cmnd"
							type="text" class="form-control" id="cmnd">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="sdt">Số điện thoại:</label>
						<div class="col-sm-10">
							<input type="numberphone" 
							 name="sdt"
							class="form-control" id="sdt" placeholder="0972...">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Mật khẩu cũ:</label>
						<div class="col-sm-10">
							<input name=""
							type="password" class="form-control" id="pwd" placeholder="Enter password">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd2">Mật khẩu mới:</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="pwd2" placeholder="Enter password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="radio"><label class="control-label col-sm-2">Giới tính</label>
								<label class="radio-inline"><input type="radio" name="gioitinh" value="Nữ" checked>Nữ</label>
								<label class="radio-inline"><input type="radio" name="gioitinh" value="Nam">Nam</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="hoten">Địa chỉ:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="hoten" placeholder="Trần Đình Huy"
							 name="diachi">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name="them_khachhang" class="btn btn-info">Thêm thông tin</button>
						</div>
					</div>
				</form>';
			}
			?>
				
			<?php 
		?>




				
			</div>
		</div>
	</div>



	<?php include "footer.php";?>
	<script src="../Media/js/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script src="../Media/js/bootstrap.min.js"></script>

	<!-- jQuery sticky menu -->
	<script src="../Media/js/owl.carousel.min.js"></script>
	<script src="../Media/js/jquery.sticky.js"></script>

	<!-- jQuery easing -->
	<script src="../Media/js/jquery.easing.1.3.min.js"></script>

	<!-- Main Script -->
	<script src="../Media/js/main.js"></script>

	<!-- Slider -->
	<script type="text/javascript" src="../Media/js/bxslider.min.js"></script>
	<script type="text/javascript" src="../Media/js/script.slider.js"></script>
</body>
</html>