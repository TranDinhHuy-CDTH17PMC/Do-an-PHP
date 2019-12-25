<?php
class TaiKhoan {
	private $password;
	private $username;
	private $email;
	private $trangthai;

	public
	function nhapdulieu() {
		$this->password = $_POST[ 'password' ];
		$this->username = $_POST[ 'username' ];
		$this->email = $_POST[ 'email' ];
		$this->trangthai = $_POST[ 'trangthai' ];
		
	}
	public
	function kiemtra_khoitao() {
		if (
			isset( $_POST[ 'password' ] )and isset( $_POST[ 'username' ] )and isset( $_POST[ 'email' ] ) )
			return true;
		return false;
	}
	public
	function kiemtra_nhap() {
		if ( ( empty( $this->password ) == true or empty( $this->email ) == true or 
		empty( $this->username ) == true ) ) {
			return false;
		}
		return true;
	}
	public
	function lay_Dulieu_tu_db() {
		$db = new Database();
		$db->set_bang( "taikhoan" );
		return $db->select_All();


	}
	public

	function them_taikhoan() {
		try {
			//Nhập dữ liệu mới
			$this->nhapdulieu();
			//Kiểm tra dữ liệu nhập
			if ( $this->kiemtra_nhap() == true ) {
				//Thực hiện thêm dữ liệu vào database
				$this->them_Dulieu_vao_db();
			}
		} catch ( Exception $e ) {
			$e->getMessage();
			exit();
		}
	}
	public
	function capnhat_dulieu_vao_db() {
		//Lệnh cập nhật tài khoản
		$query_update = "UPDATE id12041544_db_ghtshop.TAIKHOAN SET trangthai = '$this->trangthai',
		PASSWORD = '$this->password',email= '$this->email' WHERE  username = '$this->username'";
		$db = new Database();
		//Thực hiện truy vấn
		$db->thuchien_lenhsql( $query_update );

	}
	public
	function capnhat_taikhoan() {
		//Nhập dữ liệu mới
		$this->nhapdulieu();
		//Kiểm tra dữ liệu nhập
		if ( $this->kiemtra_nhap() == true ) {
			//Cập nhật dữ liệu
			$this->capnhat_dulieu_vao_db();
		}
	}
	public

	function kiemtra_trangthai( $tt ) {
		if ( $tt == "active" ) {
			return 'success';
		}
		return 'danger';

	}
	/*Phần đăng nhập*/
	public function kiemtra_dangnhap() {
		global $tt;
		global $rowCount;
		//Lấy dữ liệu mật khẩu và tài khoản người dùng nhập vào
		$this->password = $_POST[ 'password' ];
		$this->username = $_POST[ 'username' ];

		$query_dangnhap = "select username,password,trangthai from id12041544_db_ghtshop.taikhoan where username = '$this->username' and password = '$this->password'";
		$db = new Database();
		//Kiểm tra tồn tại của tài khoản trong cơ sở dữ liệu
		$row = $db->thuchien_query( $query_dangnhap );
		
		if ( $rowCount == 0 ) {
			return false;
		}
		//Kiểm tra mật khẩu và trạng thái tài khoản
		if ( $this->password != $row[ 0 ][ 1 ] or $row[0]['trangthai']!='active' ){
			unset($_SESSION['username']);
			return false;

		}
		if ( $this->username == 'Administrator') {
				echo " <script>alert('$tt')</script>";
			
				$_SESSION[ 'admin' ] = $this->username;
				unset($_SESSION['username']);
				header( "Location:Admin/sanpham-them.php" );
		}
		$tt = "Đăng nhập thành công";
		unset($_SESSION['cart']);
		$_SESSION[ 'username' ] = $this->username;
		return true;
	}

}
