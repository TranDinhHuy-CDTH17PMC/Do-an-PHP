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
	<link rel="stylesheet" href="../Media/css/style.css">
	<link rel="stylesheet" href="../Media/css/index.css">

	<link href="../Media/css/slideshow.css" rel="stylesheet" type="text/css">
	


</head>
<body>
	<?php
	require_once dirname( __FILE__ ) . "/../Apps/Class/SanPham.php";
	include "header.php";
	include "menu.php";
	?>


	<!-- liveShow -->

	<div class="content">
		<?php
		include "slideshow.php"
		?>

		<div class="promotion">
			<div class="col-md-3 col-sm-6">
				<div class="promo promo1">
					<i class="fa fa-refresh"></i>
					<p>30 ngày đổi trả</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="promo promo2">
					<i class="fa fa-truck"></i>
					<p>Giao hàng miễn phí</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="promo promo3">
					<i class="fa fa-lock"></i>
					<p>An toàn</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="promo promo4">
					<i class="fa fa-gift"></i>
					<p>Cam kết chất lượng</p>
				</div>
			</div>
		</div>


		<hr>
		<!---Phần chính----->
		<div class="container">
			<?php 
			
			$sp = new SanPham();
			if(isset($_POST['search'])){?>
			<div class="new-products">
				<p>Kết quả tìm kiếm</p>
			</div>
			<?php 
			
		$sp->Ketqua_timkiem_dongian();
			
		}else{ ?>

			<div class="new-products">
				<p>Sản phẩm mới</p>
			</div>
			
			<hr style="margin-bottom:47px;">
			<!--Hiển thị danh sách sản phẩm-->
			<?php $sp->xem_tatca_san_pham($sp->hienthi_sanpham_moi());?>
			<div class="new-products">
				<p>Phổ biến nhất</p>
			</div>
				
		
			<hr style="margin-bottom:47px;">
			<?php $sp->xem_tatca_san_pham($sp->hienthi_sanpham_phobien());}?>

		</div>
		





		<!---Phần button---->



		<div class="nsx">
			<div class="container">
				<div class="col-md-12">
					<img src="../Media/img/brand1.png" alt="">
					<img src="../Media/img/brand2.png" alt="">
					<img src="../Media/img/brand3.png" alt="">
					<img src="../Media/img/brand4.png" alt="">
				</div>
			</div>
		</div>
		<!-- footer -->
		<?php

		include "footer.php"
		?>



		<!-- Latest jQuery form server -->
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