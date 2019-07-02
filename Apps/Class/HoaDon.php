<?php

class HoaDon
{
	private $makh;
	private $ngaylap;
	private $tongtien;
	private $tongsp;
	private $mahd;
	private $manv;
	private $diachi;
	private $trangthai = 2;



	public function set_makh($value)
	{
		$this->makh = $value;
	}
	public function set_ngaylap()
	{
		$this->ngaylap = date("Y-m-d");
	}
	public function set_tongtien($value)
	{
		$this->tongtien = $value;
	}
	public function set_mahd($value)
	{
		$this->mahd = $value;
	}
	public function set_tongsp($value)
	{
		$this->tongsp = $value;
	}
	//Kiểm tra nhập từ $_POST[]
	public function kiemtra_nhap()
	{
		if (
			isset($_POST['makh']) and
			isset($_POST['diachi']) and
			isset($_POST['tongsp']) and
			isset($_POST['tongtien'])
		)
			return true;
		return false;
	}
	/**
	 * Kiểm tra các thuộc tính được khởi tạo chưa
	 *
	 * @return boolean
	 */
	public function kiemtra_khoitao()
	{
		if (
			isset($this->makh) and
			isset($this->ngaylap) and
			isset($this->diachi) and
			isset($this->tongsp) and
			isset($this->tongtien) and
			isset($this->diachi)
		)
			return true;
		return false;
	}
	/**
	 * Lấy dữ liệu cần thiết từ bảng khách hàng để lập hóa đơn (makh,diachi)
	 * @return Array[][]
	 */
	public function lay_dulieu_khachhang()
	{
		$db = new Database();
		$username = $_SESSION['username'];
		$query_kh = "select * from db_ghtshop.khachhang k join db_ghtshop.taikhoan t on 
			 t.username = k.username  where t.username = '$username'";
		$kh = $db->thuchien_query($query_kh);
		return $kh;
	}
	public function lay_dulieu_khachhang_tiemnang($makh)
	{
		$db = new Database();
		$query_kh = "select makh,diachi,tenkh from db_ghtshop.khachhang where makh = '$makh'";
		$kh = $db->thuchien_query($query_kh);
		return $kh;
	}
	/**
	 *Lấy toàn bộ dữ liệu từ bảng HoaHon trong Database
	 *@return array[][]
	 */
	public function lay_dulieu_hoadon()
	{
		$db = new Database();
		$db->set_bang('Hoadon');
		$rows = $db->select_All();
		return $rows;
	}
	//Gán giá trị cho thuộc tính của Hóa đơn
	public function nhapdulieu()
	{
		global $stt;
		$this->diachi = $_POST['diachi'];
		$this->ngaylap = date("Y-m-d");
		$this->tongsp = $_POST['tongsp'];
		$this->makh = $_POST['makh'];
		$this->tongtien = $_POST['tongtien'];
		//Tạo mã hóa đơn tự động
		$db = new Database();
		$query = 'select count(*) as dem from db_ghtshop.hoadon';
		$d = $db->thuchien_query($query);
		$stt = $d[0]['dem'];
		$stt += 1;
		$this->mahd = "HoaDon" . "-" . "$this->makh" . "-" . date('d-m') . "-" . "$stt";
	}
	//Lấy dữ liệu từ form và thêm vào database
	public function them_dulieu_vao_db()
	{
		$db = new Database();
		$query_insert = "INSERT INTO db_ghtshop.hoadon(makh,ngaylap,tongtien,mahd,tongsp,trangthai,diachi)
		 values('$this->makh','$this->ngaylap',$this->tongtien,'$this->mahd',$this->tongsp,$this->trangthai,'$this->diachi')";
		$db->thuchien_lenhsql($query_insert);
	}
	//Lấy chi tiết hóa đơn của đối tượng gọi đến
	public function lay_chitiet_hoadon()
	{
		$ct = new ChitietHoadon();
		$ct->set_mahd($this->mahd);
		return $ct->lay_chitiet_sanpham();
	}
	//Thay đổi trạng thái của hóa đơn
	public function duyet_hoadon()
	{
		$db = new Database();
		if (isset($_POST['duyet_hd'])) {
			if (isset($_POST['mahd'])) {
				$m = $_POST['mahd'];//Lấy mã hóa đơn muốn thay đổi
				//Lệnh thay đổi trạng thái của hóa đơn
				$query = "UPDATE db_ghtshop.hoadon SET trangthai = 1 where mahd = '$m'";
				$db->thuchien_lenhsql($query);//Truy vẫn cơ sở dữ liệu
				echo '<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Đã duyệt thành công</strong> 
			  </div>';
			}
		} else
		if (isset($_POST['xoa_hd'])) {
			if (isset($_POST['mahd'])) {
				$m = $_POST['mahd'];
				$query = "UPDATE db_ghtshop.hoadon SET trangthai = 0 where mahd = '$m'";
				$db->thuchien_lenhsql($query);
				echo '<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Thanh toán hoàn tất</strong> 
			  </div>';
			}
		} else
		if (isset($_POST['huy_duyet'])) {
			if (isset($_POST['mahd'])) {
				$m = $_POST['mahd'];
				$query = "UPDATE db_ghtshop.hoadon SET trangthai = 2 where mahd = '$m'";
				$db->thuchien_lenhsql($query);
				echo '<div class="alert alert-info alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Hủy duyệt thành công</strong> 
			  </div>';
			}
		} else
			echo '<div class="alert alert-warning alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Vui lòng chọn chức năng</strong> 
			  </div>';
	}
	//Truyền vào lệnh thông báo
	public function thongbao($loaithongbao, $loinhan, $link = null)
	{
		echo '<div class="alert alert-' . $loaithongbao . ' alert-dismissible">
				<a href="' . $link . '" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>' . $loinhan . '</strong> 
			  </div>';
	}
	/**
	 *Tạo hóa đơn mới ở trạng thái chờ duyệt
	 *@param array $array//Mảng chi tiết hóa đơn
	 * @return void
	 */
	public function khoitao_hoadon($array)
	{

		global $rowCount;//biến toàn cục
		$db = new Database();
		//Kiểm tra khởi tạo giá trị đầu vào 
		if (isset($_POST['mua'])) {
			$this->nhapdulieu();
			//Kiểm tra tồn tại của mã hóa đơn
			$query_ktr = "Select * from db_ghtshop.hoadon where mahd = '$this->mahd'";
			$ktr = $db->thuchien_query($query_ktr);
			if (empty($ktr)) {
				//Kiểm tra mã sản phẩm và số lượng sản phẩm
				if (isset($_SESSION['cart'])){
					$ct = new ChitietHoadon();
					foreach($array as $row){
						//Nhập dữ liệu cho chi tiết hóa đơn
						$ct->nhapdulieu($this->mahd, $row['MASP'], $_SESSION['cart'][$row['MASP']]);
						//Thêm dữ liệu cho chi tiết hóa đơn
						$ct->them_dulieu_vao_db();
					}
					//Thêm dữ liệu cho hóa đơn
					$this->them_dulieu_vao_db();
					//Kiểm tra thêm 
					if ($rowCount > 0) {
						$this->thongbao('success', 'Một hóa đơn đã được tạo và chờ duyệt');
						//Thêm thành công Xóa giỏ hàng
						unset($_SESSION['cart']);
					}
				} else
					$this->thongbao('danger', "Chưa có sản phẩm trong giỏ hàng");
			} else {
				$this->thongbao('info', 'Mã hóa đơn đã tồn tại');
			}
		}
	}
	//Cập nhật  dữ liệu database
	public function capnhat_dulieu_vao_db()
	{
		//kiểm tra khởi tạo mã hóa đơn và địa chỉ
		if (isset($_POST['mahd'])) {
			$this->mahd = $_POST['mahd'];
			if (isset($_POST['diachi']))
				$this->diachi = $_POST['diachi'];
		}
		$query = "update db_ghtshop.hoadon set diachi = '$this->diachi' where mahd = '$this->mahd'";
		$db = new Database();
		global $rowCount; //Đếm số dòng sql thực thiện 
		if (isset($_POST['capnhat_hoadon'])) { //kiểm tra hành động cập nhật
			$db->thuchien_lenhsql($query);
			if ($rowCount > 0) {
				$this->thongbao('info', 'Cập nhật thành công');
			}
		}
	}
	//Lấy ngày từ form và lọc dữ liệu theo ngày 
	public function loc_dulieu_theo_ngay()
	{
		//Kiểm tra hành động
		if (isset($_GET['loc_hd'])) {
			if(isset($_GET['ngaylap']))
			$this->ngaylap = $_GET['ngaylap'];//Lấy dữ liệu ngày
			if( isset($_GET['trangthai']))
			$tt = $_GET['trangthai'];
			
			//Truy vấn cơ sở dữ liệu
			$query_filter = "select * from db_ghtshop.hoadon where ngaylap =:ngaylap or trangthai=:trangthai ";
			global $pdo;
			$data = $pdo->prepare($query_filter);
			$data->bindParam(':ngaylap', $this->ngaylap);
			$data->bindParam(':trangthai',$tt,PDO::PARAM_INT);
			$data->execute();
			return $data->fetchAll();//Trả về kết quả lọc
		}
	}
}
class ChitietHoadon
{
	private $masp;
	private $mahd;
	private $soluong;

	public function set_masp($value)
	{
		$this->masp = $value;
	}
	public function set_mahd($value)
	{

		$this->mahd = $value;
	}
	public function set_makh($value)
	{
		$this->makh = $value;
	}
	public function kiemtra_khoitao()
	{
		if (
			isset($this->masp) and
			isset($this->mahd) and
			isset($this->soluong)
		)
			return true;
		return false;
	}
	/**
	 * Lấy giữ liệu sản phẩm từ giỏ hàng
	 *
	 * @return Array
	 */
	public function lay_dulieu_sanpham()
	{
		$db = new Database();

		if (!empty($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $key => $value) {
				$item[] = $key;
			}
			$str = implode("','", $item);
			$query_sp = "select * from db_ghtshop.chitietsp where masp in ('$str')";
			$sp = $db->thuchien_query($query_sp);
			return $sp;
		} else
			return null;
	}
	/**
	 *Gán giá trị cho hóa đơn
	 * @param [string] $_mahd
	 * @param [string] $_masp
	 * @param [inte] $_soluong
	 * @return void
	 */
	public function nhapdulieu($_mahd, $_masp, $_soluong)
	{
		$this->mahd = $_mahd;
		$this->masp = $_masp;
		$this->soluong = $_soluong;
	}
	/**
	 * Lấy dữ liệu từ form gán vào chi tiết hóa đơn 
	 *
	 * @return void
	 */
	public function lay_dulieu_tu_form()
	{
		$this->nhapdulieu($_POST['mahd'], $_POST['masp'], $_POST['soluong']);
	}
	/**
	 * Lấy dữ liệu từ database
	 *
	 * @return Array[][]
	 */
	public function lay_dulieu_tu_db()
	{
		$db = new Database();
		$query = "select * from db_ghtshop.chitiethoadon where mahd = '$this->mahd'";
		return $db->thuchien_query($query);
	}
	public function lay_chitiet_sanpham()
	{
		$query = "select * from db_ghtshop.chitietsp hd join db_ghtshop.chitiethoadon 
		ct on hd.masp = ct.masp where mahd = '$this->mahd'";
		$db = new Database();
		return $db->thuchien_query($query);
	}
	public function them_dulieu_vao_db()
	{
		$query = "insert into db_ghtshop.chitiethoadon(masp,mahd,soluong)
		values( '$this->masp','$this->mahd',$this->soluong)";
		$db = new Database();

		$db->thuchien_lenhsql($query);
	}
}
