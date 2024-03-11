<?php
session_start();
// Kiểm tra xem biểu mẫu đã được gửi chưa
if($_SERVER["REQUEST_METHOD"] == "POST"){
     // Kiểm tra xem tệp đã được tải lên mà không có lỗi hay không
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        
        // Xác minh phần mở rộng tệp
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Lỗi: Vui lòng chọn định dạng tệp hợp lệ.");
        
        // Xác minh kích thước tệp - tối đa 5MB
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Lỗi: Kích thước tệp lớn hơn giới hạn cho phép.");
        
        // Xác minh loại MIME của tệp
        if(in_array($filetype, $allowed)){
            // Kiểm tra xem tệp có tồn tại hay không trước khi tải lên
            if(file_exists("img-users/" . $filename)){
                echo $filename . " đã tồn tại.";
            } else{
                $filename = $_SESSION['maCB'].".png";
				//echo $_FILES["photo"]["tmp_name"];
				if(move_uploaded_file($_FILES["photo"]["tmp_name"], "img-users/" . $filename)){ // có thể có lỗi
					echo "Tệp của bạn đã được tải lên thành công.";
                    if ($_SESSION['you']['role']==1) {
                        header("location: ../controller/qlCanBo.php?cv=dsCanBo");
                    }else{
                        header("location: ../controller/qlCanBo.php?cv=tab&tab=CanBo");
                       
                    }
                    
                }else{
                   echo "Lỗi: không thể di chuyển tệp đến upload/";
               }
           } 
       } else{
        echo "Lỗi: Đã xảy ra sự cố khi tải tệp của bạn lên. Vui lòng thử lại."; 
    }
} else{
    echo "Error: " . $_FILES["photo"]["error"];
}
}


?>
<!-- <html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <h2> Cập nhật avatar</h2>
        <label for ="fileSelect"> Tên tệp: </label>
        <input type="file" name="photo" id = "fileSelect">
        <input type="submit" name="submit" value ="Tải lên">
        
    </form>
</body>
</html> -->
