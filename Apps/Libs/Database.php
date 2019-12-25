<?php

include_once dirname( __FILE__ ) . "/DBConnection.php";
class Database {
	private $bang = "";
    private $dieukien = "";
    private $cot = "";
    public $rowCount = 0;
    


	


    public
    function get_bang()
    {
        return  $this->bang;
    }
    public function get_dieukien()
    {
        # code...
        return $this->dieukien;
    }
    function get_cot(){
        return $this->dieukien;
    }
    function set_bang($bang){
        $this->bang = $bang;
    }
    function set_dieukien($dieukien){
        $this->dieukien = $dieukien;

    }
    function set_cot($cot){
        $this->cot;
    }
      /**
	 *Thực hiện câu lệnh sql truyền vào
	 *@param query
	 *@return void
     */
    function thuchien_lenhsql($query,$bind=null){
		global $pdo;
        global $rowCount;
        $result = $pdo->prepare($query);
        $result->execute();
		$rowCount = $result->rowCount();
    }
    function lay_mot_hang($query,$bind=null){
        global $pdo;
        global $rowCount;
        $result = $pdo->prepare($query);
        $result->execute();
        $rowCount = $result->rowCount();
        return $result->fetch();
    }
    /**
    *Thực hiện câu lệnh sql truyền vào trả về 1 mảng
    *@return  Array
     */
    function thuchien_query($query){
        global $pdo;
        global $rowCount;
        $result = $pdo->prepare($query);
        $result->execute();
        $rowCount = $result->rowCount();
        return $result->fetchAll();
    }
  /**
  *@see Chọn tất cả các cột của bảng được truyền vào */
	function select_All($where = null) {
        $query_select = "select * from id12041544_db_ghtshop.$this->bang $where";
        return $this->thuchien_query($query_select);

    }

    public function thongbao($loaithongbao,$loinhan,$link = null){
		echo '<div class="alert alert-'.$loaithongbao.' alert-dismissible">
				<a href="'.$link.'" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>'.$loinhan.'</strong> 
			  </div>';
    }
    /**
    *Đếm toàn bộ dữ liệu + 1
    *@return int
    */
    public function taoma_tudong($table){
        $query = 'select count(*) as dem from id12041544_db_ghtshop.'.$table.'';
		$d = $this->thuchien_query($query);
        $stt = $d[0]['dem'];
        return $stt + 1;
    }
    function tinh_luongtruycap(){
        $tentruycap = '';
        if(isset($_SESSION['username'])){
            $tentruycap = $_SESSION['username'];
        }
        else{
            $stt = $this->lay_mot_hang("select count(ten) as stt from id12041544_db_ghtshop.truycap");
            $tentruycap = "Guest-".$stt['stt'];
        }
        
        $query = "UPDTATE truycap SET solan = solan + 1 where ten = $tentruycap";
        $this->thuchien_lenhsql($query);        
    }
}

?>