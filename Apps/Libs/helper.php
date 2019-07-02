<?php
function phan_trang($link, $tongsanpham, $tranghientai, $gioihan)
{
    $tongsotrang = ceil($tongsanpham / $gioihan);

    if ($tranghientai > $tongsotrang) {
        $tranghientai = $tongsotrang;
    }
    if ($tranghientai < 1) {
        $tranghientai = 1;
    }
    //bắt đầu của giới hạn hạn sản phẩm
    $bat_dau = ($tranghientai - 1) * $gioihan;
    $thanh_trang = '';
    //Xữ lý hiển thị html
    if ($tranghientai > 1 && $tongsotrang > 1) {
        $thanh_trang .= "<li class ='previous'><a href =" . str_replace('{trang}', $tranghientai - 1, $link) . ">Trang trước</a></li>";
    }
    for ($i = 1; $i <= $tongsotrang; $i++) {
        if ($i == $tranghientai) {
            $thanh_trang .= "<li><a style = "."color:violet;".">$tranghientai</a></li>";
        } else {
            $thanh_trang .= "<li><a href = " . str_replace('{trang}', $i, $link) . ">$i</a></li>";
        }
    }
    return array(
        'batdau' => $bat_dau,
        'gioihan' => $gioihan,
        'thanhtrang' => $thanh_trang
    );
}
function tao_link($url,$loc = array()){
    $string = '';
    foreach ($loc as $key => $val){
        if ($val != ''){
            $string .= "&{$key}={$val}";
        }
    }
    return $url . ($string ? '?'.ltrim($string, '&') : '');
}
// Hàm tạo URL
function base_url($uri = ''){
    return 'http://localhost/DoAnWeb/'.$uri;
}
function thongbao($loaithongbao,$loinhan,$link = null){
    echo '<div class="alert alert-'.$loaithongbao.' alert-dismissible">
            <a href="'.$link.'" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>'.$loinhan.'</strong> 
          </div>';
}
// Hàm redirect
function redirect($url){
    header("Location:{$url}");
    exit();
}
 
// Hàm lấy value từ $_POST
function input_post($key){
    return isset($_POST[$key]) ? trim($_POST[$key]) : false;
}
 
// Hàm lấy value từ $_GET
function input_get($key){
    return isset($_GET[$key]) ? trim($_GET[$key]) : false;
}
 
// Hàm kiểm tra submit
function is_submit($key){
    return (isset($_POST['request_name']) && $_POST['request_name'] == $key);
}
 
// Hàm show error
function show_error($error, $key){
    echo '<span style="color: red">'.(empty($error[$key]) ? "" : $error[$key]). '</span>';
}
