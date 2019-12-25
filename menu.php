<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">GHT-Shoping</a>
		</div>
		<ul class="nav navbar-nav">
			
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="trangtimkiem.php">
					<i class="glyphicon glyphicon-search"></i> Tìm kiếm
					<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="trangtimkiem.php">Nhà sản xuất</a>
					</li>
					<li><a href="trangtimkiem.php">Giá tiền</a>
					</li>
					<li><a href="trangtimkiem.php">Loại sản phẩm</a>
					</li>
				</ul>
			</li>
			<li><a href="sanpham.php"><i class="glyphicon glyphicon-phone"></i> Sản phẩm</a>
			</li>
			
		</ul>
		<div class="col-md-3">
			<form action="index.php" class="search-form" method="post">
				<div class="form-group has-feedback">

					<label for="search" class="sr-only">Tìm kiếm</label>
					<input type="text" class="form-control" name="search" 
					id="search" placeholder="Nhập từ khóa">

					<span class="glyphicon glyphicon-search form-control-feedback"></span>
				</div>
			</form>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#" data-toggle="modal" data-target="#logout-modal"><i class="fa fa-user"></i>
					<?php

					if (isset($_SESSION['username']) and $_SESSION['username'] != 'Administrator')
						echo $_SESSION['username'];
					else
						echo "Tài khoản" ?></a>
			</li>
			<li><a href="#" data-toggle="modal" data-target="#login-modal"><i class="glyphicon glyphicon-log-in">

					</i> Đăng nhập</a>

			</li>
			<li><a href="dangki.php"><i class="glyphicon glyphicon-check"></i> Đăng kí</a>
			</li>


		</ul>
	</div>
</nav>