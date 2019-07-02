<h1 style="font-weight: bold;
						text-align: center;
						border-width: 0px 0px 5px 73px;
						border-style: solid;
						padding: 15px;
						  border-color:white;
						  color: black;">Thêm sản phẩm </h1>


<?php include "themsp.php" ?>

<form action="sanpham-them.php" method="post" enctype="multipart/form-data" name="form-add" id="form-add">
	<div class="well">
		<?php if (isset($error)) : ?>
			<div class="alert aler-danget">
				<strong style="color:red;">
					<?php echo $error; ?>
				</strong>
			</div>
		<?php endif ?>
		<div class="theloai">
			<div class="form-group">
				<label>Thể loại</label>
				<select class="form-control" name="maloai">
					<option value="DT" selected>Điện thoại</option>
					<option value="PK">Phụ kiện điện thoại</option>
					<option value="MTB">Máy tính bảng</option>
				</select>
				<br>
				<label>Hãng sản xuất</label>
				<select class="form-control" name="mancc">
					<option value="ncc1" selected>Oppo</option>
					<option value="ncc2">Apple</option>
					<option value="ncc3">Samsung</option>
					<option value="ncc4">Huawei</option>
					<option value="ncc5">Xixaomi</option>
					<option value="ncc7">Nokia</option>
				</select>
			</div>
		</div>
	</div>

	<div class="well">
		<div class="container">

			<div class="col-md-6">
				<div class="form-group">
					<label>Thêm ảnh</label>
					<div class="input-group">
						<span>
							<input type="file" name="linkanh">
						</span>
					</div>
					<img id='img-upload' />
				</div>
			</div>
		</div>
	</div>

	<div class="well">
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="tensp" placeholder="Tên sản phẩm">
				</div>
				<div class="col">
					<label>Giá</label>
					<input type="text" class="form-control" name="giamoi" placeholder=" vd: 10.000.000 đ">
				</div>
				<div class="col">
					<label>Số lượng</label>
					<input type="text" class="form-control" name="soluong" placeholder=" vd: 10.000.000 đ">
				</div>
			</div>
		</div>
	</div>

	<div class="well">
		<div class="row">
			<label>Mô tả sản phẩm</label>
			<div class="col-md-12">
				<div class="form-group">
					<textarea class="form-control textarea" rows="3" name="mota" id="" placeholder="mô tả sản phẩm"></textarea>
				</div>
			</div>
		</div>

		<div class="submit">
			<input class="btn btn-success" type="submit" name="them" value="Thêm">
		</div>
	</div>
</form>

<!--Phần js-->