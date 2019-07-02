<?php
include_once( "../Apps/Libs/Database.php" );

class SanPham {
	private $linkanh;
	private $tensp;
	private $masp;
	private $giamoi;
	private $giagoc;
	private $theloai;
	private $xoa = 1;

	public

	/**
	 * hiển thị danh sách sản phẩm sản phẩm được truyền vào
	 *
	 * @param [Array] $rowdata
	 * @return void
	 */

	function xem_tatca_san_pham($rowsdata)
	{
		foreach ($rowsdata as $data) {
			if ($data['XOA'] == 1) {
				echo '<div class="col-md-3 col-sm-6">
			<div class = "thumbail">
			<div class = "caption" style = "background-color:black;display:block;">
			</div>
                         <div class="img">
								<img src="' . $data['LINKANH'] . '" width  = "150px" height= "150px">
								<h2><a href="chitiet.php?masp=' . $data['MASP'] . '">
								' . $data['TENSP'] . '</a></h2>
							<div class="info">
								<ins>' . number_format($data['GIAMOI'], 0, ".", ".") . '</ins>';
				if ($data['GIAGOC'] > 0 or ($data['GIAGOC'] > $data['GIAMOI']))
					echo '<del>' . $data['GIAGOC'] . '</del>';
				echo '
							</div> 
							<div class="rows">
								<div class="button">
									<a href="giohang.php?masp=' . $data['MASP'] . '&&chucnang=1">Đặt mua</a>
								</div>                       
								<div class="button">
									<a href="chitiet.php?masp=' . $data['MASP'] . '">Chi tiết</a>
								</div>
							</div>  
						</div>
					</div>
				</div>';
			}
		}
	}


	function hienthi_sanpham_moi() {
		$db = new Database();
		$query_select = "select * from db_ghtshop.chitietsp where xoa = 1 order by masp limit 8";
		return $db->thuchien_query($query_select);

	}
	function hienthi_sanpham_phobien() {
		$db = new Database();
		$query_select = "select * from db_ghtshop.chitietsp where xoa = 1 order by masp limit 10,8";
		return $db->thuchien_query($query_select);

	}
	/**
	 * trả về số dòng tìm được
	 *@return $result->fetchAll
	 */
	public
	$count = 0;
	//---------------------------------------------------------Tìm kiếm---------------

	function timkiem() {

		global $count;

	//Lấy giá trị tìm kiếm
		$search = addslashes( $_POST[ 'search' ] );
		if ( isset( $_POST[ 'search' ] ) ) {
			global $pdo;
			//Lệnh sql  tìm kiếm 
			$query = "select * from db_ghtshop.chitietsp where  tensp like '%$search%'";
			$result1 = $pdo->prepare( $query );
			//kết nối biến với giá trị

			$result1->execute();
			$rowsdata1 = $result1->fetchALL();
			//Đếm số dòng tìm được
			$count = $result1->rowCount();
	

		}

		return $rowsdata1;
	}
	function timkiem_nhieudieukien(){
		//Lấy dữ liệu kèm kiểm tra 
	
		$gia_tri = array(
			'tensp' =>isset($_POST['tim'])?$_POST['search']:false,
			'theloai' =>isset($_POST['tim'])?($_POST['theloai']):false,
			'nhasanxuat' =>isset($_POST['tim'])?$_POST['nsx']:false,
			'giadau' =>isset($_POST['tim'])?$_POST['giadau']:false,
			'giacuoi' =>isset($_POST['tim'])?$_POST['giacuoi']:false
		);
		//Thêm điều kiện vào mảng nếu có
		$dieu_kien = array();
		if($gia_tri['tensp']){
			$dieu_kien[] = "tensp like '%{$gia_tri['tensp']}%'";
		}
		if($gia_tri['theloai']){
			$dieu_kien[] = "maloai = '{$gia_tri['theloai']}'";
		}
		if($gia_tri['giacuoi']){
			$dieu_kien[] = "giamoi <= {$gia_tri['giacuoi']}";
		}
		if($gia_tri['nhasanxuat']){
			$dieu_kien[] = "mancc = '{$gia_tri['nhasanxuat']}'";
		}
		if($gia_tri['giadau']){
			$dieu_kien[]= "giamoi >= {$gia_tri['giadau']}";
		}
	//Lệnh truy vấn dữ liệu
		$query_search = "select * from db_ghtshop.chitietsp ct join 
		db_ghtshop.nhacungcap cc on ct.mancc = cc.manhacungcap";
		if($dieu_kien){
			$query_search.= ' WHERE '.implode(' AND ',$dieu_kien);
			
		}
		$db = new Database();
		return $db->thuchien_query($query_search);


	}

	function timkiem_theogia() {
		$db = new Database();

		$giadau = ( int )$_POST[ 'giadau' ];
		$giacuoi = ( int )$_POST[ 'giacuoi' ];
		if ( $giadau <= 0 or $giacuoi <= 0 ) {
			echo "Bạn vui lòng nhập giá tiền đúng ";
			echo "Lưu ý không nhập kí tự đặc biệt, chữ cái hoặc giá tiền < 0";
		} else
		if ( $giacuoi > $giadau ) {
			if ( is_int( $giadau )or is_int( $giacuoi ) ) {
				$query_search = "select * from db_ghtshop.chitietsp where
				 giamoi >= $giadau and giamoi <= $giacuoi";

				$rowdata = $db->thuchien_query( $query_search );
				$this->xem_tatca_san_pham( $rowdata );

			}


		} else
			echo "Giá cuối bạn nhập bé hơn giá đầu vui lòng nhập lại ";

	}
	/**
	 *Trả nếu tìm thấy kết quả và hiển thị tất cả nếu ko tìm thấy
	 */
	function Ketqua_timkiem() {
		global $count;
		$sanpham = new Database();
		if ( isset( $_POST[ 'search' ] ) ) {
			$search = $_POST['search'];
			$rows = $this->timkiem_nhieudieukien();
			if ( $sanpham->rowCount>0 ) {
				echo "<h1 class = 'tieudesanpham'>Không tìm được $search </h1>";
				$sanpham->set_bang( "chitietsp" );
				$this->xem_tatca_san_pham( $sanpham->select_All('where xoa = 1') );
			} else {
				$this->xem_tatca_san_pham($rows);
			}
		} else
			echo "Trống";
	}
	function Ketqua_timkiem_dongian() {
		global $count;
		$sanpham = new Database();
		if ( isset( $_POST[ 'search' ] ) ) {
			$search = $_POST['search'];
			$rows = $this->timkiem();
		
			if ( $count < 1) {
				echo "<h1 class = 'tieudesanpham'>Không tìm được $search </h1>";
				$sanpham->set_bang( "chitietsp" );
				$this->xem_tatca_san_pham( $sanpham->select_All('where xoa = 1') );
			} else {
				$this->xem_tatca_san_pham($rows);
			}
		} else
			echo "Trống";
	}
	/**
	 * Cập nhật trạng thái của giỏ hàng
	 *
	 * @return void
	 */
	public function capnhat_soluong_giohang() {
		if ( isset( $_POST[ 'capnhat_giohang' ] ) ) {
			foreach ( $_POST[ 'qty' ] as $key => $value ) {
				if ( ( $value == 0 )and( is_numeric( $value ) ) ) {
					unset( $_SESSION[ 'cart' ][ $key ] );
				} elseif ( ( $value > 0 )and( is_numeric( $value ) ) ) {
					$_SESSION[ 'cart' ][ $key ] = $value;
				}
			}
		}
	}

	function xem_sanpham_giohang( $rowsdata ) {
		global $total;
		global $tongsp;
		if ( isset( $_SESSION[ 'cart' ] ) ) {
			foreach ( $rowsdata as $data ) {
				if ( isset( $_SESSION[ 'cart' ][ $data[ 'MASP' ] ] ) ) {
					echo '  
		<tr>
		<form action = "giohang.php" method = "post"> 
		 <td data-th="Product"> 
		  <div class="row"> 
		   <div class="col-sm-3 hidden-xs"><img src="' . $data[ 'LINKANH' ] . '" alt="' . $data[ 'MASP' ] . '" 
		   class="img-responsive" width="150px" height="150px">
		   </div> 
		   <div class="col-sm-10"> 
			<h4 class="nomargin">' . $data[ 'TENSP' ] . '</h4> 
		   </div> 
		  </div> 
		 </td> 
		 <td data-th="Price"><input style= "display:none;" name = "masp" value ="' . $data[ 'MASP' ] . '">' . $data[ 'GIAMOI' ] . '</td> 
		 <td data-th="Quantity"><input class="form-control text-center" value="' . $_SESSION[ 'cart' ][ $data[ 'MASP' ] ] . '" type="number" name = "qty[' . $data[ 'MASP' ] . ']">
		 </td> 
		 <td data-th="Subtotal" class="text-center">' . $data[ 'SOLUONG' ] . '</td> 
		 <td data-th="Subtotal" class="text-center">' . $data[ 'GIAMOI' ] . '</td> 
		 <td  data-th="">
		  <button type = "submit" name = "capnhat_giohang" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
		  </button> 
		  <button type = "submit"  name ="xoa_giohang" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
		 </td>
		 </form>
		</tr> ';
					//Tính tổng sản phẩm 
               $tongsp= $tongsp+$_SESSION['cart'][$data['MASP']];
               //Tính tổng tiền
					$total = $total + $_SESSION[ 'cart' ][ $data[ 'MASP' ] ] * $data[ 'GIAMOI' ];
					echo '<div class= "col-sm-10">';
					$this->kiemtra_tonkho($data);
					echo '</div>';
				}
			}
		}

	}
//Xóa sản phẩm theo mã
	public 
	function xoa_giohang() {
		//kiểm tra thực hiện
		if ( isset( $_POST[ 'xoa_giohang' ] ) ) {
			//Kiểm tra mã sản phẩm
			if ( isset( $_POST[ 'masp' ] ) ) {
				$id = $_POST[ 'masp' ];
				//Xóa mã sản phẩm được truyền
				unset( $_SESSION[ 'cart' ][ $id ] );

			}

		}
	}
	public  function kiemtra_tonkho($data){
		if($_SESSION[ 'cart' ][ $data[ 'MASP' ] ]>$data['SOLUONG'] ){
				$db = new Database();
				$db->thongbao("danger","Hết hàng");
		}
	}
	//Đánh giá sản phẩm
	public function them_binhluan(){
		if (isset($_POST['makh']) or isset($_POST['masp']) or isset($_POST['noidung'])) {
			$masp = $_GET['masp'];
			$makh = $_SESSION['username'];
			$noidung = $_POST['noidung'];
			$trangthai = 1;
			$db = new Database();
			$sql_query = "Insert into db_ghtshop.binhluan(makh,masp,noidung,trangthai) values('$makh','$masp','$noidung',$trangthai)";
			$db->thuchien_lenhsql($sql_query);
			if ($db->rowCount > 0) {
				echo  "Thêm thành công";
			}
		}
	}
}

?>