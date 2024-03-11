<?php
session_start();
include_once("../model/DB_driver.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idLoaiHoSo = $_POST['idLoaiHoSo'];
    // Đường dẫn đến thư mục lưu trữ file
    $uploadDir = 'uploads/';

    // Tên file trên máy người dùng
    $fileName = $_FILES['file']['name'];
    $db = new DB_driver();
    $db -> themHoSo($fileName, $idLoaiHoSo);


    // Đường dẫn đầy đủ của file tạm thời trên máy chủ
    $tempFilePath = $_FILES['file']['tmp_name'];

    // Di chuyển file từ thư mục tạm thời đến thư mục lưu trữ
    $targetFilePath = $uploadDir . $fileName;
    if (move_uploaded_file($tempFilePath, $targetFilePath)) {
        echo 'File đã được tải lên và lưu vào ' . $targetFilePath;
        $_SESSION['thongbao']="Tải file lên hoàn tất";
        header("Location: ../controller/qlCanBo.php?cv=dsHoSo");

    } else {
        echo 'Có lỗi xảy ra khi tải lên file.';
    }
}
?>
