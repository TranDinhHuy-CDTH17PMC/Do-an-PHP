<?php 
include "../Apps/Libs/DBConnection.php";
function thongbao($loaithongbao,$loinhan,$link = null){
	echo '<div class="alert alert-'.$loaithongbao.' alert-dismissible">
			<a href="'.$link.'" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>'.$loinhan.'</strong> 
		  </div>';
}
		try{
		
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		 
		function generate_string($input, $strength = 16) {
			$input_length = strlen($input);
			$random_string = '';
			for($i = 0; $i < $strength; $i++) {
				$random_character = $input[mt_rand(0, $input_length - 1)];
				$random_string .= $random_character;
			}
		 
			return $random_string;
		}
		if(isset($_POST['dangki'])){
			

		$tendk = addslashes(($_POST['hoten']));
		$mk = addslashes($_POST['password']);
		$email = addslashes($_POST['email']);		


		if(empty($tendk) or empty($mk) or empty($email) )
				$error = "Không được để trống";
		

		if(!isset($error)){
			$data_taikhoan = $pdo->prepare("select username from id12041544_db_ghtshop.taikhoan where username ='$tendk'");
	
			$data_taikhoan->execute();
			$user = $data_taikhoan->fetchAll();
			if($user){
				$error = 'Tài khoản này đã tồn tại';
			}
			else{
				$sqlInsert ="Insert into id12041544_db_ghtshop.taikhoan (username,password,email) 
				values ('$tendk','$mk','$email')";
				$data_taikhoan = $pdo->prepare($sqlInsert);
				$data_taikhoan->execute();
		
				$count = $data_taikhoan->rowCount();
				if($count > 0)
				{
					$error = "Bạn đã thêm thành công";
					
				}
				
				else{
					$error = "Bạn đã thêm thất bại";
				
				}
			}
		
		}
		
	}

}

catch(PDOException $e){
	echo $e->getMessage();
	exit();
}

		
		
	?>