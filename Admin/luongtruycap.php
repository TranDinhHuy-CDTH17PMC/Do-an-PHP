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


	<?php include_once  "../Apps/Class/HoaDon.php"?>
	<?php include_once  "../Apps/Libs/Database.php"?>
</head>


<body>
	<?php include_once("admin-header.php");
	
	?>
	<?php include_once("admin-menu.php");?>

	<div class="container">

		<div class="col-sm-10" style="background-color: white;">
			<h1><i class="glyphicon glyphicon-globe"></i>LƯỢNG TRUY CẬP</h1>
			<br>
			<h3><i class=""></i> TOP LƯỢT TRUY CẬP NGÀY  <?php echo date('d-m-Y')?></h3>
			<table class="table table-hover table-bordered " style="background-color: white;">
				<thead>
					<tr>

						<th>Tài khoản/Khách hàng</th>
						<th>Lượt truy cập</th>
						<th>Ngày truy cập</th>
						<th>Thời gian truy cập</th>

					</tr>
				</thead>
				<tbody>

					<?php 	
                    $hd = new Database();
					$query = "select mahd,makh,ngaylap,sum(tongtien) as tongtien from id12041544_db_ghtshop.hoadon group by  makh  order by tongtien  desc limit 5";
					$rowsdata = $hd->thuchien_query($query);
					$query = "select sum(tongtien) as doanhthu, count(mahd) as tonghd from id12041544_db_ghtshop.hoadon";
					$doanhthu = $hd->lay_mot_hang($query);
					$query_sp = "select sum(soluong) as sanpham from id12041544_db_ghtshop.chitiethoadon";
					$ct = $hd->lay_mot_hang($query_sp);
					$query_hangton = "select sum(soluong) as tonkho from id12041544_db_ghtshop.chitietsp";
					$tonkho = $hd->lay_mot_hang($query_hangton);
					foreach($rowsdata as $row){
					
					?>

					<tr>


						<td>
							<?php echo $row['makh']?>
						</td>

						<td>
							<?php echo $row['ngaylap']?>
						</td>
						<td>
							<?php echo $row['ngaylap']?>
						</td>
						<td>
							<?php echo number_format($row['tongtien'],0,'.','.')?>
						</td>





						<?php 
					}
					
						?>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td><b>Tổng Lượt truy cập: <h3><?php echo $tonkho['tonkho']?></h3>truy cập<b></td> 
					
					<tr>
				</tfoot>
			</table>
			<div class="col-sm-12">
				
				<canvas id="quy" width="400" height="200"></canvas>

			</div>
			<div class="col-lg-12">
<canvas id="thang" width="400" height="200"></canvas>

			</div>
			
		</div>


	</div>
	<script>
		var ctx = document.getElementById( 'thang' ).getContext( '2d' );
		var myChart = new Chart( ctx, {
			type: 'bar',
			data: {

				labels: [ 'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12' ],
				datasets: [ {

					label: 'Lượng truy cập',
					data: [ 1200, 1900, 300, 500, 200, 300, 120, 190, 0, 0, 2000, 300 ],
					backgroundColor: 'rgba(255, 159, 64, 0.2)',

					borderColor: 'rgba(255, 159, 64, 1)',

					borderWidth: 1
				}, {
					label: 'Số lượng sản phẩm',
					data: [ 12, 190, 30, 500, 200, 300, 120, 190, 100, 110, 200, 300 ],
					backgroundColor: 'rgba(255, 99, 132, 0.2)',

					borderColor: 'rgba(255, 99, 132, 1)',

					borderWidth: 1
				}, ]
			},
			options: {

				title: {
					display: true,
					text: 'TRUY CẬP THEO THÁNG',
					fontSize: 17

				},
				scales: {
					yAxes: [ {
						ticks: {
							beginAtZero: true
						}

					} ]
				}
			}
		} );
		var ctx = document.getElementById( 'quy' ).getContext( '2d' );
		var myChart = new Chart( ctx, {
			type: 'line',
			data: {

				labels: [  '1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','10','21','22','23','24' ],
				datasets: [ {

					label: 'Lượng truy cập',
					data: [ 12000,12030,13000,22000,52000,11000,82000,12000,12030,13000,22000,52000,11000,82000,11000,11000,11000,],
					backgroundColor: 'rgba(255, 159, 64, 0.2)',

					borderColor: 'rgba(255, 159, 64, 1)',

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
					text: 'TRUY CẬP TRONG  NGÀY',
					fontSize: 17

				},
				scales: {
					yAxes: [ {
						ticks: {
							beginAtZero: true
						}

					} ]
				}
			}
		} );
		//thống kê theo năm
		
	</script>

	<?php include_once("admin-footer.php")?>
	<script type="text/javascript" src="../Media/js/jquery.min.js"></script>
	<!-- Bootstrap JS form CDN -->
	<script type="text/javascript" src="../Media/js/bootstrap.min.js"></script>





	<!-- Main Script -->
</body>
</html>