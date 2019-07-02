<?php
/*setcookie(name, value, expire, path, domain, secure, httponly);*/

if(empty( $_POST[ 'user'])){

}else if (!is_null( $_POST[ 'user' ]  ) ) {
		$cookie_name = "username";
		$cookie_value = $_POST[ 'user' ];
		
		setcookie( $cookie_name, $cookie_value, time() + ( 86400 * 30 ), "/" );
	
	}


function Messenge($cookie_name, $cookie_value) {
	if ( !isset( $_COOKIE[ $cookie_name ] ) ) {
		echo "<script> alert('Tài khoản $cookie_name và  có mật khẩu $cookie_value được lưu  xin mời đăng nhập lại') </script>";

	} else  {
		echo " <script>alert('Xin chào bạn $cookie_value')</script>";
	}
}
function username($cookie_name){
	echo $cookie_name;
	
}

?>