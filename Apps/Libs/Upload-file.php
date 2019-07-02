<?php 
function StringRandom(){

}
/*
*Lấy giá trị từ thẻ input file, upload file ảnh lên sever
@param filename
@return void
 */
function uploadFile($filename){
        //Sữ dụng biến upload file
        $fileUpload = $_FILES[$filename];
        //Kiểm tra tên của file ảnh
        if($fileUpload['name']!= null){
            //Lấy file tmp
            $file_name_tmp = $fileUpload['tmp_name'];
            //Tạo đường dẫn lưu ảnh
            $destination = '../Media/img/AnhSanpham/'.$fileUpload['name'];
            //Gọi phương thức upload file
            move_uploaded_file($file_name_tmp,$destination);
        }
    
    
}

?>