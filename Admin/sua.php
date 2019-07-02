<?php
include_once( "../Apps/Libs/DBConnection.php" );
include("../Apps/Libs/Upload-file.php");

try {
	
	if ( isset( $_POST[ 'sua' ] ) ) {
		//Lấy đường dẫn file ảnh
		$target_dir = '../Media/img/AnhSanpham/';
		$target_file = $target_dir . basename( $_FILES[ 'linkanh' ][ 'name' ] );
	
		$type_file = $_FILES[ 'linkanh' ][ 'type' ];
		//Kiểm tra file ảnh
		$type_fileAllow = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
		
		//Dữ liệu đầu vào
		$linkanh = $target_file;//Gán đường dẫn cho thuộc tính
		$masp = addslashes( $_POST[ 'masp' ] );
		$tensp = addslashes( $_POST[ 'tensp' ] );
		$giamoi = addslashes( $_POST[ 'giamoi' ] );
		$tenanh = $_FILES['linkanh']['name'];//Lấy tên ảnh chọn
		$maloai = addslashes($_POST['maloai']);
		$mancc = addslashes($_POST['mancc']);
		$soluong = addslashes($_POST['soluong']);
		$giagoc = 0;//Giá gốc mặc định
		
		$query_giamoi = "select giamoi from db_ghtshop.chitietsp where masp=:masp";
		$stmt = $pdo->prepare($query_giamoi);
		$stmt->bindParam(':masp',$masp,PDO::PARAM_STR,255);
		$stmt->execute();
		$row = $stmt->fetch();
		$giagoc = $row['giamoi'];
		
		if(empty($tenanh)==true)
			$linkanh = $_POST['tenanh'];
		
		if (is_null($tenanh) or empty( $masp )or empty( $tensp )or empty( $giamoi )) {
			echo 'Không được để trống thông tin';
		
		}
		else{
			//Upload file ảnh nếu file ảnh mới
			uploadFile('linkanh');
			//Thực hiện truy vấn 
			$sqlUpdate = "update db_ghtshop.chitietsp set linkanh =:linkanh, 
			tensp =:tensp,giagoc =:giagoc,giamoi =:giamoi,mancc =:mancc,maloai =:maloai,
			soluong =:soluong where masp =:masp";
			$data = $pdo->prepare( $sqlUpdate );
			$data->bindParam(':linkanh',$linkanh);
			$data->bindParam(':tensp',$tensp);
			$data->bindParam(':giagoc',$giagoc);
			$data->bindParam(':giamoi',$giamoi);
			$data->bindParam(':mancc',$mancc);
			$data->bindParam(':maloai',$maloai);
			$data->bindParam(':soluong',$soluong);
			$data->bindParam(':masp',$masp);
			//Thực thi lệnh sql
			
			$data->execute();
			//Đếm số dòng bị ảnh hưởng bởi lệnh sql
			$count = $data->rowCount();
			
			if ( $count > 0 ) {
				$error = "Cập nhật thành công";
			} else
				$error = "Cập nhật thất bại";
	
		}
		
		}
	
	
} catch ( PDOException $e ) {
	$e->getMessage();
	exit();
}




?>