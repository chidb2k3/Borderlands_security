<!-- load_comments.php -->


<?php
session_start();
include_once("../model/DB_driver.php");

$idFileHoSo = $_SESSION['idFile'];

$db = new DB_driver();
$dsBinhLuan= $db -> dsBinhLuan($idFileHoSo);
    //Lưu database


    // Thực hiện lưu vào cơ sở dữ liệu hoặc nơi lưu trữ khác

    // Giả định rằng bạn có một hàm hoặc truy vấn để lưu vào cơ sở dữ liệu
    // saveCommentToDatabase($commentText);

    // Hiển thị thông tin bình luận vừa gửi
    // Hiển thị bình luận
foreach ($dsBinhLuan as $ds) {
     $name = $db->getName($ds['idCanBo']);
     $avatar = '../users/img-users/'.$ds['idCanBo'].'.png'; // Giả định rằng bạn đã xác định avatar người bình luận
     echo '<div class="comment">';
     echo '<img src="'.$avatar . '" alt="Avatar" class="avatar" style="width: 25px; height: 25px; border-radius: 50%;">';
     echo '<span class="username">' . $name[0]['hoTen'] . ':</span>';
     echo '<p class="comment-text">Comment: <span style="color: blue;">' . $ds['noiDung'] . '<span></p>';
     echo '</div>';
 }




 ?>
