
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin hồ sơ cá nhân</title>
    <style>
        .profile-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 30%;
         }

        .profile-header {
            background-color: #007bff;
            color: white;
            padding: 8px;
            text-align: center;
        }

        .profile-content {
            padding: 20px;
            text-align: center;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .info-group {
            margin-bottom: 20px;
        }

        .info-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .info-group span {
            display: block;
        }
    </style>
</head>

<body>
     <?php include("menu2.php"); ?> <br>
     <div class="profile-container" style="margin-left: 35%;">
        <div class="profile-header" style="background-color: white;">
            <h6 style="color: black;"><b>THÔNG TIN HỒ SƠ CÁ NHÂN</b> </h6>
        </div>
        <div class="profile-content">
            <img class="avatar" src="../users/img-users/<?php if (isset($_SESSION['you'])) {
                echo $_SESSION['you']['maCB'];
            } ?>.png" alt="Avatar">
            <div class="info-group">
                <label for="fullName">Họ và tên:</label>
                <span id="fullName"><?php if (isset($_SESSION['you'])) {
                    echo $_SESSION['you']['hoTen'];
                } ?></span>
            </div>
            <div class="info-group">
                <label for="dob">Ngày sinh:</label>
                <span id="dob"><?php if (isset($_SESSION['you'])) {
                    echo $_SESSION['you']['ngaySinh'];
                } ?></span>
            </div>
            <div class="info-group">
                <label for="email">Email:</label>
                <span id="email"><?php if (isset($_SESSION['you'])) {
                    echo $_SESSION['you']['email'];
                } ?></span>
            </div>
            <!-- Thêm các thông tin cá nhân khác tại đây -->
        </div>
    </div>
   
   
</body>
</html>
