<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GHT</title>

	<link rel="stylesheet" href="../Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Media/css/owl.carousel.css">
	<link rel="stylesheet" href="../Media/css/responsive.css">
	<link rel="stylesheet" href="../Media/css/quanly-style.css">
	<link rel="stylesheet" href="../Media/css/quanly-them.css">


</head>

<body>
	<?php include("admin-header.php");
	require_once dirname(__FILE__)."/sua.php";
	require_once dirname(__FILE__) . "/../Apps/Class/SanPham.php";
	require_once dirname(__FILE__) . "/../Apps/Libs/Database.php"
	?>
	<?php include("admin-menu.php") ?>
	<div class="container">
		<div class=" col-md-10">
			<div style="background-color: white">
				<hr>
				
				<p style="font-size:36px;"><i class="glyphicon glyphicon-pencil text-primary "></i> Quản lý sản phẩm</p>
				<?php $db = new Database();
				isset($error)?$db->thongbao("danger",$error):false ?>
				
				<form action="sanpham-quanly.php" class="search-form" method="post" name="timkiem">
					<div class="col-md-12">
						 
						<div class="form-group has-feedback">
							<label for="search">Tìm kiếm theo tên:</label>
							<input type="text" class="form-control" name="search" id="search" placeholder="Nhập tên sản phẩm">
							<span class="glyphicon glyphicon-search form-control-feedback"></span>
						</div>
					</div>

					<div class="col-md-3 ">
						<label for="ex1">Giá đầu</label>
						<input class="form-control" id="ex1" type="text" name="giadau">

					</div>
					<div class="col-md-3">
						<label for="ex2">Giá cuối</label>
						<input class="form-control" id="ex2" type="text" name="giacuoi">
					</div>
					<div class="col-md-3">
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
					<div class="col-md-3">
						<label for="sel2">Nhà sản xuất:</label>
						<select class="form-control" id="sel2" name="nsx">
							<option></option>
							<?php foreach ($rows as $row) {
								echo '<option value="' . $row['MaNhaCungCap'] . '">' . $row['TenNhaCungCap'] . '</option>';
							} ?>
						</select>
					</div>
					<div class="col-md-3">
						<label for="ex3">Tìm kiếm nâng cao</label>
						<input type="submit" class="btn btn-success" value="Tìm nâng cao" id="ex3" name="tim">
						<br>
					</div>
			</div>
			</form>
			<br>
			<hr>
			<br>
			<table id="cart" class="table table-bordered table-hover" style="background-color: white">
				<thead>
					<tr>
						<th>Ảnh minh họa</th>
						<th style="width:20%">Tên</th>
						<th>Mã sản phẩm</th>
						<th>Số lượng</th>
						<th>Thể loại </th>
						<th>Giá</th>
						<th>Hãng</th>
						<th style="width:20%">Chức năng </th>
					</tr>
				</thead>
				<tbody id="myTable">

					<?php
					include_once("../Apps/Libs/DBConnection.php");
					$sqlSelectAll = "select * from id12041544_db_ghtshop.chitietsp ct join 
						id12041544_db_ghtshop.nhacungcap cc on ct.mancc = cc.manhacungcap";
					$data = $pdo->prepare($sqlSelectAll);
					$data->execute();
					$listProcduct = $data->fetchAll();

					$sp = new SanPham();
					if (isset($_POST['tim']))
						$listProcduct = $sp->timkiem_nhieudieukien();

					foreach ($listProcduct as $row) {
						if ($row['XOA'] == 1) { ?>
							<form action="" method="post" enctype="multipart/form-data" class="form-editsp">
								<tr>

									<td><img src="<?php echo "../".$row['LINKANH'] ?>" width="100px" height="100px"></td>
									<td><?php echo $row['TENSP'] ?></td>
									<td><?php echo $row['MASP'] ?></td>
									<td><?php echo $row['SOLUONG'] ?></td>
									<td><?php echo $row['MALOAI'] ?></td>

									<td><?php echo number_format($row['GIAMOI']) ?></td>
									<td><?php echo $row['TenNhaCungCap'] ?></td>


									<td>
										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" 
										data-target="#myModal<?php echo $row['MASP'] ?>">Sữa</button>
										<a type="button" href="Xoa.php?MASP=<?php echo $row['MASP'] ?>" class="btn btn-danger btn-xs">Xóa</a>
									</td>
									<div class="modal fade" id="myModal<?php echo $row['MASP'] ?>" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">CẬP NHẬT SẢN PHẨM</h4>
												</div>
												<form action="sua.php" method="post" enctype="multipart/form-data">
													<div class="modal-body">
														<div class="form-group col-sm-4">
															<label class="control-label col-sm-8" for="hoten">Mã sản phẩm:</label>
															<div>
																<input type="text" class="form-control" name="masp" id="hoten" value="<?php echo $row['MASP'] ?>" readonly>
															</div>
														</div>


														<div class="form-group col-sm-8">
															<label class="control-label col-sm-8" for="sdt">Tên sản phẩm:</label>
															<div class="">

																<input type="text" class="form-control" name="tensp" value="<?php echo $row['TENSP'] ?>">
															</div>
														</div>
														<div class="form-group col-sm-6">
															<label class="control-label col-sm-2" for="sdt">Giá:</label>
															<div class="">
																<input type="text" class="form-control" name="giamoi" id="sdt" value=<?php echo $row['GIAMOI'] ?>>
															</div>
														</div>
														<div class="form-group col-sm-6">
															<label class="control-label col-sm-6" for="sdt">Hãng sản xuất:</label>
															<select class="form-control" name="mancc">
																<option value="ncc1" selected>Oppo</option>
																<option value="ncc2">Apple</option>
																<option value="ncc3">Samsung</option>
																<option value="ncc4">Huawei</option>
																<option value="ncc5">Xixaomi</option>
																<option value="ncc7">Nokia</option>
															</select>
														</div>
														<div class="form-group col-sm-6">
															<label class="control-label col-sm-6" for="ngaysinh">Thể loại</label>
															<div class="form-group">
																<select class="form-control" name="maloai">
																	<option value="DT" selected>Điện thoại</option>
																	<option value="PK">Phụ kiện điện thoại</option>
																	<option value="MTB">Máy tính bảng</option>
																</select>
															</div>
														</div>
														<div class="form-group col-sm-6">
															<label class="control-label col-sm-6" for="ngaysinh">Tồn kho</label>
															<div class="">
																<input type="text" class="form-control" name="soluong" id="ngaysinh" value=<?php echo $row['SOLUONG']; ?>>
															</div>
														</div>
														<div class="form-group">
															<label class="control-label col-sm-2" for="FILE">Ảnh minh họa</label>
															<div class="">
																<input type="file" class="control-label" name="linkanh" id="FILE">
																<input type="text" class="form-control" name="tenanh" value="<?php echo $row['LINKANH'] ?>" readonly>

															</div>
														</div>


													</div>
											</div>
											<div class="modal-footer">
												<button type="submit" name="sua" class="btn btn-success">Cập nhật</button>
							</form>
				</div>
			</div>
			</div>
		<?php } ?>
		</tr>
		</form>
	<?php
}
?>
	</div>

	</tbody>

	</table>
	</div>
	</div>

	</div>
	<?php include "admin-footer.php" ?>

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