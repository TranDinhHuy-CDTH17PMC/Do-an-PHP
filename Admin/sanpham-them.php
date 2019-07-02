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

	<?php include "admin-header.php"?>
<?php include "admin-menu.php"?>
	<div class="container">
		<div class="row">
			
			<!---Phần thêm sản phẩm------------------------------------------------------>

			<div class=" col-md-9">

				<div class="tab-content">
					<!-------------Form Thêm sp----------------------------------------------->
					<div id="tabThem" class="tab-pane fade in active">
						<?php include "paneThem.php"?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<?php include "admin-footer.php"?>





	<script  type="text/javascript" src="../Media/js/jquery.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<script  type="text/javascript" src="../Media/js/bootstrap.min.js"></script>

	<script  type="text/javascript" src="../Media/js/owl.carousel.min.js"></script>
	<script  type="text/javascript" src="../Media/js/jquery.sticky.js"></script>

	<script  type="text/javascript" src="../Media/js/jquery.easing.1.3.min.js"></script>

	<!-- Main Script -->
	<script  type="text/javascript" src="../Media/js/main.js"></script>
<script>
	$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable input").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>