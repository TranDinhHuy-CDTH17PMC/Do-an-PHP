	<?php
	include "../Apps/Libs/DBConnection.php";
try{
		//Mã sản phẩm muốn xóa
		$masp = $_GET['MASP'];
		//chuỗi truy vấn sql
		$sqlDelete = "update id12041544_db_ghtshop.chitietsp set xoa = 0 where masp = '$masp'";
		$data = $pdo->prepare($sqlDelete);
		$data->execute();
		//Quay về trang sau khi thực hiện truy vấn thành công
		header('Location: sanpham-quanly.php');
		$count_row = $data->rowCout();
		
		if($count_row>0)
		{
			$error = "Xóa thành công";
			
		}
		else
		$error = "Xóa thất bại ";

	
	
	
}
catch(PDOEXception $e ){
	$e->getMessage();
	exit();
}
?>