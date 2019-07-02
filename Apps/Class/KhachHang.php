<?php

class Khachhang
{
	private $makh;
	private $tenkh;
	private $gioitinh;
	private $cmnd;
	private $sdt;
	private $diachi;
	private $username;
	public function set_tenkh($value)
	{
		$this->tenkh = $value;
	}
	public function set_sdt($value)
	{
		$this->sdt = $value;
	}
	public function set_diachi($value)
	{
		$this->diachi = $value;
	}
	public function get_makh()
	{
		return $this->makh;
	}

	public function set_makh()
	{
		$db = new Database();
		$ma = $db->taoma_tudong('Khachhang');
		$this->makh = "Guest" . "-" . "$this->tenkh" . "$ma";
	}
	public function tao_khachhang_tiemnang()
	{
		if (isset($_POST['tao_khachhang_tiemnang'])) {
			$tinh = $_POST['tinhthanh'];//Lấy thông tin tỉnh thành phố
			$quan = $_POST['quanhuyen'];//Lấy thông tin quận huyện
			$duong = $_POST['duongnha'];//Lấy địa chỉ nhà
			$diachi = "$duong, $quan, $tinh";//Ghép thành địa chỉ
			if (isset($_POST['tenkh']) and isset($diachi) and isset($_POST['sdt'])) {
				$this->set_makh();
				$this->set_diachi($diachi);
				$this->set_sdt($_POST['sdt']);
				$this->set_tenkh($_POST['tenkh']);
				//Gọi phương thức thêm dữ liệu
				$this->them_Dulieu_vao_db();
			}
		}
	}
	/**Nhập dữ liệu từ form thông qua biến superglobal $_POST
	 */

	public function nhapdulieu()
	{
		$this->tenkh = $_POST['tenkh'];
		$this->cmnd = $_POST['cmnd'];
		$this->diachi = $_POST['diachi'];
		$this->gioitinh = $_POST['gioitinh'];
		$this->sdt = $_POST['sdt'];
		if (isset($_SESSION['username'])) {
			$this->username = $_SESSION['username'];
		}
		else if(isset($_POST['username'])){
			$this->username = $_POST['username'];

		}
		$this->makh = $_POST['makh'];
		if (empty($this->makh)) {
			$this->makh = "Customer" . "-" . "$this->username";
		}
		
	}
	/**	Kiểm tra thông tin truyền vào có đầy đủ 
	 *@return Boolean
	 */
	public function kiemtra_khoitao()
	{
		if (
			isset($_POST['diachi']) and
			isset($_POST['tenkh']) and
			isset($_POST['makh']) and
			isset($_POST['sdt'])
		)
			return true;
		return false;
	}
	public
	function kiemtra_nhap()
	{

		if ((empty($this->hoten) == true or empty($this->makh) == true
			or empty($this->username) == true or empty($this->gioitinh) or empty($this->diachi)
			or
			empty($this->cmnd) == true or empty($this->sdt) == true)) {
			return true;
		}
		return false;
	}
	/**
	 * Lấy toàn bộ dữ liệu từ bảng Khách hàng 
	 *
	 * @return Array[][]
	 */
	public
	function lay_Dulieu_tu_db()
	{
		$db = new Database();
		$db->set_bang("khachhang");
		return $db->select_All();
	}
	/**
	 * Lấy dữ liệu của bảng khách hàng có tài khoản đang đăng nhập
	 *
	 * @return Array/null
	 */
	function lay_dulieu_cua_khachhang()
	{
		if (isset($_SESSION['username'])) {
			$username = $_SESSION['username'];
			$query = "Select * from db_ghtshop.Khachhang where username = '$username'";
			$db = new Database();
			return $db->thuchien_query($query);
		}
		return null;
	}
	//Lấy dữ liệu từ form và thêm vào database;
	public function them_Dulieu_vao_db()
	{

		$query_insert = "INSERT into db_ghtshop.Khachhang
		(tenkh,makh,diachi,sdt,gioitinh,username,cmnd)
		values(N'$this->tenkh','$this->makh',N'$this->diachi',
		'$this->sdt',N'$this->gioitinh','$this->username','$this->cmnd')";
		$db = new Database();
		$db->thuchien_lenhsql($query_insert);
		global $rowCount;
		if ($rowCount > 0)
			$db->thongbao('success', 'Thêm thành công ');
	}

/**
 * Cập nhật dữ liệu vào database
 *
 * @return void
 */
	public
	function capnhat_dulieu_vao_db()
	{
		//Lệnh Update của sql
		$query_update = "update db_ghtshop.khachhang set tenkh = N'$this->tenkh',
		cmnd = $this->cmnd,sdt = '$this->sdt',diachi = N'$this->diachi',
		gioitinh = N'$this->gioitinh' WHERE  makh = '$this->makh' and username= '$this->username'";
		$db = new Database();
		//Gọi phương thức thực thi lệnh từ Class Database
		$db->thuchien_lenhsql($query_update);
		global $rowCount;
		//Đếm số dòng bị ảnh hưởng bởi lệnh SQL 
		if ($rowCount > 0) {
			$db->thongbao('info', "Cập nhật thành công");
		}
	}
	public
	function capnhat_Khachhang()
	{
		//Lấy dữ liệu đầu vào
		$this->nhapdulieu();
		//Kiểm tra dữ liệu nhập
		if ($this->kiemtra_nhap() == true) {
			//Gọi phương thức cập nhật
			$this->capnhat_dulieu_vao_db();
		}
	}
}
