<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Duyệt hóa đơn</title>
	<link rel="stylesheet" href="../Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Media/css/responsive.css">
	<link rel="stylesheet" href="../Media/css/quanly-style.css">
	<script type="text/javascript" src="../Media/js/Chart.min.js"></script>


	<?php include_once  "../Apps/Class/HoaDon.php" ?>
	<?php include_once  "../Apps/Libs/Database.php" ?>
</head>


<body>
	<?php include_once("admin-header.php");

	?>
	<?php include_once("admin-menu.php"); ?>

	<div class="container">

		<div class="col-sm-10" style="background-color: white;">
			<h1><i class="glyphicon glyphicon-usd "></i> DOANH THU THEO THÁNG QUÝ NĂM</h1>
			<br>
			<h3><i class=""></i> SẢN PHẨM BÁN CHẠY THÁNG <?php echo date('n') ?></h3>
			<table class="table table-hover table-bordered " style="background-color: white;">
				<thead>
					<tr>
						<th></th>
						<th>Tên sản phẩm</th>
						<th>Mã sản phẩm</th>
						<th>Tổng số lượng</th>
						<th>Tổng giá trị</th>

					</tr>
				</thead>
				<tbody>

					<?php
					$hd = new Database();
					//Danh sách sản phẩm bán chạy nhất theo tổng giá trị, tổng sản phẩm
					$query = "select sp.LINKANH,sp.TENSP,ct.masp,sum(ct.soluong) as tongsp,sp.
					GIAMOI*sum(ct.soluong) as tonggiatri from db_ghtshop.chitiethoadon ct
					join db_ghtshop.chitietsp sp on ct.masp = sp.masp group by 
					ct.masp order by ct.soluong desc  limit 10";
					$rowsdata = $hd->thuchien_query($query);//Danh sách sản phẩm 
					//Tổng doanh thu của cửa hàng
					$query = "select sum(tongtien) as doanhthu, count(mahd) as tonghd 
					from db_ghtshop.hoadon";
					$doanhthu = $hd->lay_mot_hang($query);//Số liệu cụ thể
					$query_sp = "select sum(soluong) as sanpham from db_ghtshop.chitiethoadon";
					$ct = $hd->lay_mot_hang($query_sp);
					//Số lượng hàng còn lại trong kho
					$query_hangton = "select sum(soluong) as tonkho from db_ghtshop.chitietsp";
					$tonkho = $hd->lay_mot_hang($query_hangton);
					foreach ($rowsdata as $row) {

						?>

						<tr>

							<td>
								<img src="<?php echo $row['LINKANH'] ?>" width="10%">
							</td>
							<td>
								<?php echo $row['TENSP'] ?>
							</td>

							<td>
								<?php echo $row['masp'] ?>
							</td>
							<td>
								<?php echo $row['tongsp'] ?>
							</td>
							<td>
								<?php echo number_format($row['tonggiatri'], 0, '.', '.') ?>
							</td>





						<?php
					}

					?>
					</tr>
				</tbody>
				<tfoot>
					<tr>

						<td><b>Tổng hàng trong kho: <h3><?php echo $tonkho['tonkho'] ?></h3>sản phẩm<b></td>
						<td></td>
						<td><b>Tổng hóa đơn:<h3><?php echo  $doanhthu['tonghd'] ?></h3>Hóa đơn</b></td>
						<td><b>Tổng sản phẩm bán được:<h3><?php echo $ct['sanpham'] ?></h3>Sản phẩm</b></td>
						<td>Tổng thu:<h3><?php echo number_format($doanhthu['doanhthu'], 0, '.', '.') ?> VNĐ</h3>
						</td>
					<tr>
				</tfoot>
			</table>
			<div class="col-sm-12">
				<canvas id="thang" width="400" height="200"></canvas>

			</div>
			<div class="col-sm-12">

				<canvas id="quy" width="400" height="200"></canvas>

			</div>
			<div class="col-sm-12">

				<canvas id="nam" width="400" height="200"></canvas>

			</div>
		</div>


	</div>
	<script>
		var ctx = document.getElementById('thang').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {

				labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
				datasets: [{

					label: 'Doanh thu (Triệu VNĐ)',
					data: [1200, 1900, 300, 500, 200, 300, 120, 190, 0, 0, 2000, 300],
					backgroundColor: 'rgba(255, 159, 64, 0.2)',

					borderColor: 'rgba(255, 159, 64, 1)',

					borderWidth: 1
				}, {
					label: 'Số lượng sản phẩm',
					data: [12, 190, 30, 500, 200, 300, 120, 190, 100, 110, 200, 300],
					backgroundColor: 'rgba(255, 99, 132, 0.2)',

					borderColor: 'rgba(255, 99, 132, 1)',

					borderWidth: 1
				}, ]
			},
			options: {

				title: {
					display: true,
					text: 'THỐNG KÊ THEO THÁNG',
					fontSize: 17

				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}

					}]
				}
			}
		});
		var ctx = document.getElementById('quy').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {

				labels: ['Quý I', 'Quý II', 'Quý III', 'Quý IV'],
				datasets: [{

					label: 'Doanh thu(VNĐ)',
					data: [120000, 190000, 30000, 50000],
					backgroundColor: 'rgba(255, 159, 64, 0.2)',

					borderColor: 'rgba(255, 159, 64, 1)',

					borderWidth: 1
				}, {
					label: 'Số lượng sản phẩm',
					data: [12000, 19000, 3000, 50000, 300000],
					backgroundColor: 'rgba(155, 99, 132)',
					borderCapStyle: 'round',
					borderColor: 'rgba(155, 99, 132, 0.2)',

					borderWidth: 1
				}, ]
			},
			options: {
				elements: {
					line: {
						tension: 0 // disables bezier curves
					}
				},
				title: {
					display: true,
					text: 'THỐNG KÊ THEO QUÝ',
					fontSize: 17

				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}

					}]
				}
			}
		});
		//thống kê theo năm
		var ctx = document.getElementById('nam').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {

				labels: ['Điện thoại ', 'Phụ kiện', 'Máy tính bảng '],
				datasets: [{

					label: 'Doanh thu(VNĐ)',
					data: [100, 30, 10],

					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 2
				}, ]
			},
			options: {
				elements: {
					line: {
						tension: 0 // disables bezier curves
					}
				},
				title: {
					display: true,
					text: 'THÀNH PHẦN SẢN PHẨM BÁN',
					fontSize: 17

				},

			}
		});
	</script>

	<?php include_once("admin-footer.php") ?>
	<script type="text/javascript" src="../Media/js/jquery.min.js"></script>
	<!-- Bootstrap JS form CDN -->
	<script type="text/javascript" src="../Media/js/bootstrap.min.js"></script>

	<!-- Main Script -->
</body>

</html>