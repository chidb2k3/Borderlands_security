<!-- submit_comment.php -->

<?php
session_start();
include_once("../model/DB_driver.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu bình luận từ phía máy khách
    $noiDung = $_POST['comment'];
    $idCanBo = $_SESSION['maCB'];
    $idFileHoSo = $_SESSION['idFile'];

    $db = new DB_driver();
    $db -> themBinhLuan($idFileHoSo, $noiDung, $idCanBo);
    //Lưu database


    // Thực hiện lưu vào cơ sở dữ liệu hoặc nơi lưu trữ khác

    // Giả định rằng bạn có một hàm hoặc truy vấn để lưu vào cơ sở dữ liệu
    // saveCommentToDatabase($commentText);

    // Hiển thị thông tin bình luận vừa gửi
 $avatar = '../users/img-users/'.$idCanBo.'.png'; // Giả định rằng bạn đã xác định avatar người bình luận
 echo '<div class="comment">';
 echo '<img src="'.$avatar . '" alt="Avatar" class="avatar" style="width: 25px; height: 25px; border-radius: 50%;">';
 echo '<span class="username">' . $_SESSION['hoTen'] . ':</span>';
 echo '<p class="comment-text">Comment: <span style="color: blue;">' . $noiDung . '<span></p>';
 echo '</div>';
}
?>