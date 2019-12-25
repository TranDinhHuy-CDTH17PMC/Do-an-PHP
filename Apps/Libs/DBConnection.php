<?php

$connect = ( "mysql:host = localhost;dbname = id12041544_db_ghtshop" );
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

 

//Làm trang chủ
//Tìm kiếm theo tên sản phẩm , tìm theo giá,tao bảng đăng kí tài khoản

/*
Sữ dụng insert into cho trang đăng kí tài khoản
*/
/*
$connect = ("mysql:host= local, dbname = db_ghtshop");
$option = array(
PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES UTF8";
);
try{
	$pdo = mew PDO()
}
catch(PDOException $e)
{
	$e -> getMessage
}
*/
?>