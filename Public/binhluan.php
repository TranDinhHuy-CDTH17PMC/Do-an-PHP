<?php
$connect = ( "mysql:host = localhost;dbname = db_ghtshop" );
$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
	PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
);
try {
	$pdo = new PDO( $connect, 'root','', $options);
	//$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	

} catch ( PDOException $e ) {
	echo $e->getMessage();
    exit();
}
function thongbao($loaithongbao,$loinhan,$link = null){
    echo '<div class="alert alert-'.$loaithongbao.' alert-dismissible">
            <a href="'.$link.'" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>'.$loinhan.'</strong> 
          </div>';
}
function taoma_tudong($table,$pdo){
    $query = 'select count(*) as dem from db_ghtshop.'.$table.'';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $d = $stmt->fetch();
    $stt = $d['dem'];
    return $stt + 1;
}
if (isset($_POST['makh']) and isset($_POST['masp']) and isset($_POST['noidung'])) {
    $masp = $_POST['masp'];
    $makh =$_POST['makh'];
    $noidung = $_POST['noidung'];
    $mabinhluan = taoma_tudong("binhluan",$pdo);
    $sql_query = "Insert into db_ghtshop.binhluan(mabinhluan,makh,masp,noidung) values('$mabinhluan','$makh','$masp','$noidung')";
    $stmt = $pdo->prepare($sql_query);
    /*$stmt->bindParam(":makh",$a);
    $stmt->bindParam(":masp",$b);
    $stmt->bindParam(":noidung",$text);
    $stmt->bindParam(":trangthai",$trangthai);*/
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "<br>";
        thongbao('success',"Bình luận thành công");
    }
}


if(isset($_POST['masp'])){
    $masp = $_POST['masp'];
    $sql_query = "Select * from db_ghtshop.binhluan where trangthai = 0 and masp = '$masp'  order by ngaygio desc";
    $stmt = $pdo->prepare($sql_query);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    foreach ($rows as $row) {
        echo '<div class="media">
        <div class="media-left media-top">
            <img src="img_avatar1.png" class="media-object" style="width:60px">
        </div>
        <div class="media-body">
        <h4 class="media-heading">' . $row['makh'] . ' <small><i>' . $row['ngaygio'] . '</i></small></h4>
        <p class = "cmt">' . $row['noidung'] . '</p>
            <button class="btn btn-danger btn-xs" onclick="xoa_binhluan()">Xóa</button>
        </div>
    </div>';
    }
}

?>