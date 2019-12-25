<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GHT shoping</title>

	<link rel="stylesheet" href="Media/css/bootstrap.min.css">
	<link rel="stylesheet" href="Media/css/font-awesome.min.css">
	<link rel="stylesheet" href="Media/css/owl.carousel.css">
	<link rel="stylesheet" href="Media/css/responsive.css">
	<link rel="stylesheet" href="Media/css/style.css">
	<link rel="stylesheet" href="Media/css/chitiet.css">

</head>

<body onload="load()">
	<!--Nav-->
	<?php
	require_once dirname(__FILE__) . "/Apps/Class/SanPham.php";
	include "Apps/Libs/DBConnection.php";
	include "header.php";
	include "menu.php";
	?>
	<!--Content-->
	<div class="main">
		<div id="title-product">

			<?php
			//Lấy mã hóa đơn thông qua URL của sản phẩm tương ứng
			$MASP = $_GET['masp'];
			//Lấy dữ liệu của sản phẩm tương ứng với Mã sản phẩm
			$result = $pdo->prepare("select * from id12041544_db_ghtshop.chitietsp WHERE MASP='$MASP'");
			$result->execute();
			$rowsdata = $result->fetchALL();
			foreach ($rowsdata as $data) {
				echo '	<h1>' . $data['TENSP'] . '</h1>';
			} ?>
			<div class="ratingresult">
				<span class="star">
					<i class="iconstar"></i>
				</span>
				<span class="star">
					<i class="iconstar"></i>
				</span>
				<span class="star">
					<i class="iconstar"></i>
				</span>
				<span class="star">
					<i class="iconstar"></i>
				</span>
				<span class="star">
					<i class="iconstar"></i>
				</span>
				<span class="star">
					<i class="iconstar"></i>
				</span>
				<a href="#" style="padding: 5px;">30 đánh giá</a>
			</div>

		</div>
		<hr />
		<?php
		$MASP = $_GET['masp'];
		$result = $pdo->prepare("select * from id12041544_db_ghtshop.chitietsp WHERE MASP='$MASP'");
		$result->execute();
		$rowsdata = $result->fetchALL();
		foreach ($rowsdata as $data) {
			echo '<div class="images">
			<img src="' . $data['LINKANH'] . '" width="320px "height="320px">
		</div>';
			?>
			<div class="price-sale">

				<div class="area-price"><sup>
						<?php echo number_format($data['GIAMOI'], 0, '.', '.') ?> VNĐ </sup>
				</div>
				<div class="area_promition zero">
					<strong>Khuyến mãi</strong>
					<span class="infopr"> Giảm ngay 500.000đ
						(áp dụng chođơn hàng đặt và nhận hàng từ ngày 30 - 31/3)
						(đã trừ vào giá)</span>
					<br />
					<span class="infopr">Cơ hội trúng 100 bao
						lì xì trị giá 2 tỷ đồng <a href="#"> Xem chi tiết tại..</a></span>
				</div>
				<div class="area_order">
					<a class="buy_now" href="giohang.php?masp=<?php echo $data['MASP'] ?>&chucnang=1">
						<b>Mua ngay</b>
						<span>Giao trong 1 giờ</span>
					</a>
				</div>

			</div>
		<?php } ?>
		<div class="area_article">
			<h1 style="width: 100%">Giới thiệu sản phẩm</h1>
			<div class="left-content">
				<div class="tableparamater">
					<h2>Thông số kỹ thuật</h2>
					<?php
					include "Apps/Libs/DBConnection.php";


					$result = $pdo->prepare("select * 
									from id12041544_db_ghtshop.thongsokythuat
									WHERE thongsokythuat.masp='sp8'");
					$result->execute();
					$rowsdata = $result->fetchALL();
					foreach ($rowsdata as $data) {
						echo '<ul class="pramater one">
						<li class="pr"><span>Màn hình </span>' . $data['manhinh'] . '</li>
						<li class="pr"><span>Hệ điều hành </span>' . $data['hedieuhanh'] . '</li>
						<li class="pr"><span>Camera trước </span>' . $data['camera_truoc'] . '</li>
						<li class="pr"><span>Camera sau </span>' . $data['camera_sau'] . '</li>
						<li class="pr"><span>Bộ nhớ trong </span>' . $data['rom'] . '</li>
						<li class="pr"><span>Ram </span>' . $data['ram'] . '</li>
						<li class="pr"><span>CPU </span>' . $data['cpu'] . '</li>
						<li class="pr"><span>Thẻ nhớ</span>' . $data['thenho'] . '</li>
						<li class="pr"><span>Thẻ sim</span>' . $data['thesim'] . '</li>
						<li class="pr"><span>Dung lượng pin</span>' . $data['pin'] . '</li>
						<li class="pr"><span>OTG</span>' . $data['otg'] . '</li>
					</ul>
					</div>';
					} ?>
				</div>
			</div>
			<div class="right-content">
				<h2> Đặt điểm nổi bật của<</h2> <p>Samsung Galaxy A30 là một chiếc máy khá hấp dẫn,
						dành cho các bạn yêu thích thương hiệu Samsung,
						muốn sở hữu một sản phẩm có nhiều tính năng hấp
						dẫn mà không cần phải bỏ ra nhiều tiền.
						Màn hình lớn tương đương Galaxy S10+
						Có thể bạn sẽ bất ngờ bởi chiếc điện
						thoại Samsung mới sở hữu cho mình màn
						hình có kích thước lên tới 6.4 inch,
						tương đương với màn hình của chiếc Samsung Galaxy S10+.</p>
						<p>
							Đặc điểm nổi bật của Samsung Galaxy A30
							Tìm hiểu thêm Tìm hiểu thêm Bộ sản phẩm
							chuẩn: Hộp, Sạc, Tai nghe, Sách hướng dẫn,
							Cây lấy sim, Cáp, Ốp lưng Samsung Galaxy A30
							là một chiếc máy khá hấp dẫn, dành cho các bạn
							yêu thích thương hiệu Samsung, muốn sở hữu một
							sản phẩm có nhiều tính năng hấp dẫn mà không cần
							phải bỏ ra nhiều tiền. Màn hình lớn tương đương
							Galaxy S10+ Có thể bạn sẽ bất ngờ bởi chiếc điện
							thoại Samsung mới sở hữu cho mình màn hình có kích
							thước lên tới 6.4 inch, tương đương với màn hình của chiếc
							Samsung Galaxy S10+. Điện thoại Samsung Galaxy A30 chính
							hãng | Màn hình Tuy nhiên khác với màn hình Infinity-O
							trên người đàn anh đắt tiền thì Galaxy A30 sẽ sở hữu
							màn hình Infinity-U hoàn toàn mới mẻ. Với tỷ lệ màn
							hình 19:9 đảm bảo cho bạn có một không gian trải nghiệm
							rộng rãi trên kích thước 6 inch nhưng vẫn tối ưu được
							 diện tích tổng thể thân máy.</p>
			</div>
		</div>
	</div>


	<!-- footer -->

	<div class="container">
		<hr>
		<h2>Bình luận</h2>
		<form method="post">
			<label>Tên của bạn: </label>
			<input type="text" id="masp" style="display:none" value=<?php echo $MASP ?>>
			<input type="text" id="makh"  value=<?php 
			if(isset($_SESSION['username'])) echo $_SESSION['username'] ?>><br>
			<textarea id="comment" cols="100" rows="5" placeholder="Nội dung..."></textarea><br>
			<button class="btn btn-success" type="button" onclick="them()">Góp ý</button>
		</form>
		<div id="noidung"></div>
		<script>
			function load() {
				var xhttp = new XMLHttpRequest();
				var masp = document.getElementById('masp').value;

				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("noidung").innerHTML = this.responseText;
					};
				}
				xhttp.open("POST", "binhluan.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("masp=" + masp);
			}

			function them() {
				var text = document.getElementById('comment').value;
				var masp = document.getElementById('masp').value;
				var makh = document.getElementById('makh').value;

				var xhttp = new XMLHttpRequest();

				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("noidung").innerHTML = this.responseText;
					};
				}
				xhttp.open("POST", "binhluan.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("noidung=" + text + "&masp=" + masp + "&makh=" + makh);
			}
		</script>
	</div>
	<br>
	<div>
		<?php
		include "footer.php";
		?>
	</div>


	<!-- Latest jQuery form server -->

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

</body>

</html>