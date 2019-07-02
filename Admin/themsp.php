
<?php
/*Kết nối database*/
require_once "../Apps/Libs/DBConnection.php";
require_once "../Apps/Libs/Upload-file.php";

try {
	if (isset($_POST['them'])) {
		//Lấy link ảnh
		$target_dir = '../Media/img/AnhSanpham/';
		$target_file = $target_dir . basename($_FILES['linkanh']['name']);
		$type_file = $_FILES['linkanh']['type'];
		
		$type_fileAllow = array('image/png', 'image/jpg', 'image/jpeg', 'image/gif');
		if (!in_array(strtolower($type_file), $type_fileAllow)) {

					$error = 'File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh';
					
				}
		else{

		/*if(file_exists($target_file)){
			$error = "File bạn chọn đã tồn tại trên hệ thống";
			
			}*/
		//lấy giá trị cần thiết 
		$linkanh = $target_file;
		$tensp = addslashes($_POST['tensp']);
		$giamoi = addslashes($_POST['giamoi']);
		$theloai = addslashes($_POST['maloai']);
		$mancc = addslashes($_POST['mancc']);
		$soluong = addslashes($_POST['soluong']);
		$tenanh = $_FILES['linkanh']['name'];
		//Gán giá cũ cho giá gốc
		$query = "select count(masp) as stt,maloai from db_ghtshop.chitietsp where maloai = '$theloai'";
		$db = $pdo->prepare($query);
		$db->execute();
		$smst = $db->fetch();
		//Tự tạo mã sản phẩm
		$masp = "$theloai" . ($smst['stt'] + 1);


//Kiểm tra dữ liệu trống
		if (empty($tenanh) or empty($tensp) or empty($giamoi) or empty($theloai)
		) {
			$error = 'Không được để trống thông tin';
		} else if (!isset($error)) {
			//Kiểm tra mã sản phẩm trong database
			$sqlMasp = "Select masp from db_ghtshop.chitietsp where masp = '$masp'";
			$data_masp = $pdo->prepare($sqlMasp);
			$data_masp->execute();
			$msp = $data_masp->fetch();
			if ($msp) {
				$error = "Mã sản phẩm đã tồn tại";
			} else {
				$nameInput = 'linkanh';
				//Gọi phương thức Upload file
				uploadFile($nameInput);
				//Chuổi truy vấn SQL
				$sqlInsert = "Insert into db_ghtshop.chitietsp (linkanh,tensp,giamoi,giagoc,masp,maloai,soluong,mancc) 
					values (:linkanh,:tensp,:giamoi,:giagoc,:masp,:maloai,:soluong,:mancc)";
				$data = $pdo->prepare($sqlInsert);
				//bind giá trị cho Paramater
				$data->bindParam(':linkanh', $linkanh, PDO::PARAM_STR, 255);
				$data->bindParam(':masp', $masp, PDO::PARAM_STR, 255);
				$data->bindParam(':tensp', $tensp, PDO::PARAM_STR, 255);
				$data->bindParam(':giamoi', $giamoi, PDO::PARAM_INT);
				$data->bindParam(':giagoc', $giamoi, PDO::PARAM_INT);
				$data->bindParam(':maloai', $theloai, PDO::PARAM_STR, 255);
				$data->bindParam(':soluong', $soluong, PDO::PARAM_INT);
				$data->bindParam(':mancc', $mancc, PDO::PARAM_STR, 255);

				//Thực hiện truy vấn dữ liệu
				$data->execute();
				$count = $data->rowCount();
				if ($count > 0) {
					$error = "Thêm thành công $tensp";
				} else
					$error = "Thêm thất bại";
			}
		}
	}
	}
} catch (PDOException $e) {
	$e->getMessage();
	exit();
}

?>