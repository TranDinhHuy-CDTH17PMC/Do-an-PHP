<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Duyệt hóa đơn</title>
	<link rel="stylesheet" href="../Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Media/css/owl.carousel.css">
	<link rel="stylesheet" href="../Media/css/responsive.css">
	<link rel="stylesheet" href="../Media/css/quanly-style.css">
	<link rel="stylesheet" href="../Media/css/quanly-them.css">

	<?php include_once  "../Apps/Class/HoaDon.php"?>
	<?php include_once  "../Apps/Libs/Database.php"?>
</head>

<body>
	<?php include_once("admin-header.php");
	
	?>
	<?php include_once("admin-menu.php");?>

	<div class="container">

		<div class="col-sm-10" style="background-color: white;">
			<h1><i class="fa fa-2x fa-bitcoin"  ></i> QUẢN LÝ HÓA ĐƠN</h1>
			<form action="" method="get">
		
				<div class="form-group has-feedback">
					<label for="search">Lọc theo ngày</label>
					<input type="date" class="form-control" name="ngaylap"
					 id="search" placeholder="Nhập từ khóa">
					<span class="glyphicon glyphicon-search form-control-feedback"></span>
					<br>
					<label for="search">Lọc theo trạng thái: </label>
					<input type="radio"  name="trangthai" value = "1"> Đã duyệt
					<input type="radio"  name="trangthai" value= "2"> Chờ  duyệt
					<input type="radio"  name="trangthai" value= "0"> Hoàn thành
					

				
					
				</div>
				<button type="submit" class="btn btn-success" name= "loc_hd">Lọc</button>
			
			</form>
				<hr>
			<table class="table table-hover table-bordered " style="background-color: white;">
				<thead>
					<tr>
						<th>Mã hóa đơn</th>
						<th>Mã Khách hàng</th>
						<th>Địa chỉ giao hàng</th>
						<th>Ngày lập</th>
						<th>Tổng tiền</th>
						<th>Xem chi tiết/Duyệt</th>
					</tr>
				</thead>
				<tbody>

					<?php 	
                    $hd = new HoaDon();
					$hd->duyet_hoadon();
					$hd->capnhat_dulieu_vao_db();
					$rowsdata = $hd->lay_dulieu_hoadon();
					if(isset($_GET['ngaylap'])){
						$rowsdata = $hd->loc_dulieu_theo_ngay();
						global $rowCount;
						//if($rowCount==0)
						//$rowsdata = $hd->lay_dulieu_hoadon();

					}
				
					
					
					$r = $hd->lay_chitiet_hoadon();

					foreach($rowsdata as $row){
					?>
					
					<tr class="<?php if($row['trangthai']==1) echo " success ";
					 else if($row['trangthai']==0) echo "danger"?>">
						<form method="post" action="hoadon-quanly.php">
						<td>
							<?php echo $row['mahd']?><input  name ="mahd" value="<?php echo $row['mahd']?>" 
							style="display:none">
						</td>
						<td>
							<?php echo $row['makh']?>
						</td>
						<td>
							<?php echo $row['diachi']?>
						</td>
						<td>
							<?php echo $row['ngaylap']?>
						</td>
						<td>
							<?php echo number_format($row['tongtien'])?>
						</td>
						<td>
							<button name="xem_cthd" type="button" class="btn btn-info btn-xs"
							 data-toggle="modal" data-target="#myModal<?php echo $row['mahd']?>">
							 Xem chi tiết</button>
                            <button name="xoa_hd" type="submit" class="btn btn-danger btn-xs">Hoàn thành</button>
                            <button name="huy_duyet" type="submit" class="btn btn-warning btn-xs">
								Hủy duyệt</button>

						</td>
						</form>
						<div class="modal fade" id="myModal<?php echo $row['mahd']?>" role="dialog">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">CHI TIẾT HÓA ĐƠN</h4>
									</div>
									
									<form action="hoadon-quanly.php" method="post">
										<div class="modal-body">
											<?php 	
										$hd->set_mahd($row['mahd']);
										$r = $hd->lay_chitiet_hoadon();
										
						
									foreach($r as $d){?>
											<hr><h1><?php echo $d['TENSP']?></h1>
											<div class="form-group">
												<label class="control-label col-sm-2" for="sdt">Tên sản phẩm</label>
												<div class="">
													<input type="numberphone" class="form-control" name="sdt" id="sdt" placeholder="0972..." value="<?php echo $d[ 'TENSP']?>">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-2" for="hoten">Số lượng</label>
												<div>
													<input type="text" class="form-control" name="hoten" id="hoten" placeholder="Trần Đình Huy" value="<?php echo $d['soluong']?>">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-3" for="hoten">Số lượng tồn kho</label>
												<div>
													<input readonly type="text" class="form-control" name="hoten" id="hoten" placeholder="Trần Đình Huy" value="<?php echo $d['SOLUONG']?>">
												</div>
											</div>


											<div class="form-group">
												<label class="control-label col-sm-2" for="sdt">Mã sản phẩm</label>
												<div class="">
													<input readonly type="numberphone" class="form-control" name="sdt" id="sdt" placeholder="0972..." value="<?php echo $d[ 'masp']?>">
												</div>
											</div>
											

											<?php }
											?>
											<div class="form-group">
												<label class="control-label col-sm-3" for="diachi">Địa chỉ giao hàng</label>
												<div class="">
													<input type="numberphone" class="form-control" 
													name="diachi" id="diachi" placeholder="0972..." value="<?php echo $row[ 'diachi']?>">
												</div>
											</div>

							</div>
								</div>
								<div class="modal-footer">
								<input type="text" value="<?php echo $row['mahd']?>" style="display:none" name = "mahd">

									<button name= "capnhat_hoadon" type="submit" class="btn btn-success">Cập nhật</button>
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
</html>