<?php
require_once "../Apps/Libs/Database.php";
class Nhanvien {

	public $manv;
	public $hoten;
	public $luong;
	public $ngaysinh;
	public $ngaygianhap;
	public $diachi;
	public $sdt;
	public $gioitinh;

	public $tentaikhoan;


	public
	function __construct() {
		$this->diachi = "";
		$this->hoten = "";
		$this->luong = "";
		$this->manv = "";
		$this->ngaysinh = "0/0/0";
		$this->ngaygianhap = "0/0/0";
		$this->sdt = "";
		$this->gioitinh = 'nam';
	}
	public
	function kiemtra_khoitao() {
		if(
		isset($_POST[ 'diachi' ]) and
		isset ($_POST[ 'hoten' ]) and
		isset ($_POST[ 'luong' ]) and
		isset($_POST[ 'manv'  ]) and
		isset($_POST[ 'ngaysinh' ])and
		isset($_POST[ 'ngaygianhap' ]) and
		isset($_POST[ 'sdt' ]) and
		isset ($_POST[ 'gioitinh' ]))
			return true;
		return false;
	}

	public
	function nhapdulieu() {
		$this->diachi = $_POST[ 'diachi' ];
		$this->hoten = $_POST[ 'hoten' ];
		$this->luong = ( int )$_POST[ 'luong' ];
		$this->manv = $_POST[ 'manv' ];
		$this->ngaysinh = $_POST[ 'ngaysinh' ];
		$this->ngaygianhap = $_POST[ 'ngaygianhap' ];
		$this->sdt = $_POST[ 'sdt' ];
		$this->gioitinh = $_POST[ 'gioitinh' ];
		
	}
	public
	function kiemtra_nhap() {

		if ( ( empty( $this->hoten ) == true or empty( $this->luong ) == true or empty( $this->manv ) == true or empty( $this->ngaysinh ) == true or empty( $this->ngaygianhap ) == true or empty( $this->sdt ) == true ) ) {
			return "Dữ liệu nhập bị bỏ trống";
		} else if ( is_numeric( $this->luong ) == false )
			return "Lương là phải là một số tự nhiên";
		return "Dữ liệu nhập đầy đủ";
	}
	public
	function lay_Dulieu_tu_db() {
		$db = new Database();
		$db->set_bang( "nhanvien" );
		return $db->select_All();


	}
	public
	function them_Dulieu_vao_db() {
		$query_insert = "INSERT into db_ghtshop.Nhanvien(manv,hoten,luong,ngaysinh,ngaygianhap,diachi,sdt,gioitinh,tentaikhoan)
		values('$this->manv',N'$this->hoten',$this->luong,'$this->ngaysinh','$this->ngaygianhap',N'$this->diachi','$this->sdt',N'$this->gioitinh','$this->tentaikhoan')";
		$db = new Database();
		$db->thuchien_lenhsql( $query_insert );

	}
	public
	function them_nhanvien() {
		try{
			$this->nhapdulieu();
		
		if ( $this->kiemtra_nhap() == "Dữ liệu nhập đầy đủ" ) {
			$this->them_Dulieu_vao_db();
		}
		}catch(Exception $e){
			$e->getMessage();
			exit();
		}
	}
	public
	function capnhat_dulieu_vao_db() {
		$query_update = "update db_ghtshop.nhanvien set hoten = N'$this->hoten',luong = $this->luong,ngaysinh = '$this->ngaysinh',ngaygianhap = '$this->ngaygianhap',diachi = N'$this->diachi',sdt = '$this->sdt',gioitinh = N'$this->gioitinh',tentaikhoan = '$this->tentaikhoan' WHERE  manv = '$this->manv'";
		$db = new Database();
		$db->set_bang( "nhanvien" );
		$db->thuchien_lenhsql( $query_update );

	}
	public
	function capnhat_nhanvien() {
		try{
		$this->nhapdulieu();
		if ( $this->kiemtra_nhap() == "Dữ liệu nhập đầy đủ" ) {
			$this->capnhat_dulieu_vao_db();
			
		}
		   }
		catch(Exception $e){
			$e->getMessage();
			die();
				
		}
	}



}
