<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GHT</title>

	<link rel="stylesheet" href="Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="Media/css/owl.carousel.css">
	<link rel="stylesheet" href="Media/css/responsive.css">
	<link rel="stylesheet" href="Media/css/style.css">
	<link rel="stylesheet" href="Media/css/index.css">

	<style>
		.tieudesanpham {
			font-weight: bold;
			text-align: center;
			border-width: 2px 73px 2px 73px;
			border-style: solid;
			padding: 15px;
			border-radius: 37px;
			border-color: #bfa8e8;
			color: #bfa8e8;
		}
	</style>

</head>

<body>
	<?php
	include_once dirname(__FILE__)."/Apps/Class/SanPham.php";
	include_once dirname(__FILE__)."/Apps/Libs/Database.php";
	include_once dirname(__FILE__)."/Apps/Libs/helper.php";
	include_once dirname(__FILE__)."/header.php";
	include_once dirname(__FILE__)."/menu.php";

	?>
	<?php
	$db = new Database();
	$query_count = "select count(*) as counter from id12041544_db_ghtshop.chitietsp where xoa = 1";
	$kq = $db->thuchien_query($query_count);
	$tongsanpham = $kq[0]['counter'];
	$tranghientai = input_get('trang');
	
	$link = tao_link(base_url('sanpham.php'), array(
		'trang' => '{trang}'
	));
	$gioihan = 8;
	$phan_trang = phan_trang($link, $tongsanpham, $tranghientai, $gioihan);

	
	$query_select = "select * from id12041544_db_ghtshop.chitietsp where xoa = 1 order by masp limit " . $phan_trang['batdau'] . "," . $phan_trang['gioihan'] . "";
	$rows = $db->thuchien_query($query_select);
	?>

	<div class="container">

		<h1 class="tieudesanpham">Sản phẩm</h1>
		<?php $sp = new SanPham();
		$sp->xem_tatca_san_pham($rows);
		?>
	</div>
	<div class="container">
		<ul class="pager">

			<?php echo $phan_trang['thanhtrang']; ?>

		</ul>
	</div>
	<div class="nsx">
		<div class="container">
			<div class="col-md-12">
				<img src="Media/img/brand1.png" alt="">
				<img src="Media/img/brand2.png" alt="">
				<img src="Media/img/brand3.png" alt="">
				<img src="Media/img/brand4.png" alt="">
			</div>
		</div>
	</div>
	<!-- footer -->
	<?php

	include "footer.php"
	?>
	<!-- jQuery sticky menu -->
	<script src="Media/js/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script src="Media/js/bootstrap.min.js"></script>

	<!-- jQuery sticky menu -->
	<script src="Media/js/owl.carousel.min.js"></script>
	<script src="Media/js/jquery.sticky.js"></script>

	<!-- jQuery easing -->
	<script src="Media/js/jquery.easing.1.3.min.js"></script>

	<!-- Main Script -->
	<script src="Media/js/main.js"></script>

	<!-- Slider -->
	<script type="text/javascript" src="Media/js/bxslider.min.js"></script>
	<script type="text/javascript" src="Media/js/script.slider.js"></script>>
</body>

</html>