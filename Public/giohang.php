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
	<link rel="stylesheet" href="../Media/css/giohang.css">
	<?php include dirname(__FILE__) . "/../Apps/Class/SanPham.php";
	require_once dirname(__FILE__) . "/../Apps/Libs/Database.php"; ?>


</head>

<body>
	<?php
	include "header.php";
	?>
	<?php
	include "menu.php"
	?>

	<div class="title">
		<div class="col-md-12">
			<?php ?>
			<div class="title1">
				<h2>Giỏ hàng</h2>
			</div>
		</div>
	</div>
	<!-- slogan -->
	<div class="container">
		<form action="giohang.php" method="post">
			<table id="cart" class="table table-hover table-bordered">
				<thead>
					<tr>
						<th class="text-center">Tên sản phẩm</th>
						<th class="text-center">Giá </th>
						<th class="text-center">Số lượng</th>
						<th class="text-center">Tồn kho</th>
						<th class="text-center">Thành tiền</th>
						<th class="text-center">Xóa/Sữa </th>
					</tr>
				</thead>
				<tbody>
					<?php
					$sp = new SanPham();
					$total = 0;
					$tongsp = 0;

					$ok = 1;

					if (isset($_SESSION['cart'])) {

						foreach ($_SESSION['cart'] as $k => $v) {
							if (isset($k)) {
								$ok = 2;
							}
						}
					}
					if ($ok == 2) {
						echo "<form action='giohang.php' method='post'>";
						foreach ($_SESSION['cart'] as $key => $value) {
							$item[] = $key;
						}
						$str = implode("','", $item);
						include "../Apps/Libs/DBConnection.php";
						$sql = "select * from db_ghtshop.chitietsp where masp in ('$str')";
						$query = $pdo->prepare($sql);
						$query->execute();
						$data = $query->FetchAll();

						$sp->capnhat_soluong_giohang();
						$sp->xoa_giohang();
			
						$sp->xem_sanpham_giohang($data);
					}
					?>
					<tr>
						<td><a href="index.php" class="btn btn-warning"> Tiếp tục mua hàng</a></td>

						<td></td>
						<td class="text-center"><strong>Tổng số lượng: <?php echo $tongsp ?> </strong></td>
						<td></td>
						<td class="list-inline text-center"><strong>Tổng tiền: <?php
												echo number_format($total)
											?>
								VND</strong></td>
						<td><a href="diachi.php" class="btn btn-primary">Đặt hàng</a></td>

					</tr>
					</tfoot>
			</table>
		</form>
	</div>
	<!-- giỏ hàng -->

	<!-- giao hành -->



	<!-- footer -->
	<?PHP
	include "footer.php"
	?>
	<!-- Latest jQuery form server -->
	<script src="../Media/js/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script src="../Media/js/bootstrap.min.js"></script>

</body>

</html>