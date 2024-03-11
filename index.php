<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BỘ CHỈ HUY BỘ ĐỘI BIÊN PHÒNG TỈNH QUẢNG BÌNH - PHÒNG TRINH SÁT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
/*            background-color: #007bff;*/
            background-image: url('users/img-btn/head.png');
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
/*            background-color: #333;*/

            background-image: url('users/img-btn/bg.png');
            color: white;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
        }

        section {
            margin: 3px;
        }

        .hero-image {
            position: relative;
            height: 400px;
            overflow: hidden;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease-in-out;
        }

        .hero-image:hover img {
            transform: scale(1.2);
        }

        .login-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
        }

        .login-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .login-form {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .password-container {
            position: relative;
        }

        .password-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .login-btn {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div>
        <header>

        <img src="users/img-btn/logo.png" alt="Logo Bộ Chỉ Huy" style="max-width: 100px;" align="left">
        <h1 style="color: #99FF33;">BỘ CHỈ HUY BỘ ĐỘI BIÊN PHÒNG TỈNH QUẢNG BÌNH
        </h1>
    </header>
        
    </div>
    
    <div style="margin-top: 5px;">
          <nav>
        <a href="#"><b>TRANG CHỦ</b></a>
        <a href="#"><b>THÔNG TIN BỘ CHỈ HUY</b></a>
        <a href="#"><b>LIÊN HỆ</b></a>
        <a href="#"><b>HỒ SƠ</b></a>
        <button class="login-btn" onclick="openModal()">Đăng nhập</button>
    </nav>
    </div>

  

    <section>
        <div class="hero-image">
            <img src="users/img-btn/battay.png" alt="Hình ảnh lớn" style="height: 130%;">
        </div>

        <h2>Trang chủ</h2>
       
    </section>
    <iframe src="https://baoquangbinh.vn/quoc-phong-an-ninh/202307/bo-chi-huy-bo-doi-bien-phong-tinh-cong-bo-trao-quyet-dinh-ve-cong-tac-can-bo-2210679/" width="100%" height="1000px" frameborder="0"></iframe>


    <!-- Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-content">
            <button class="close-btn" onclick="closeModal()">Đóng</button>

            <div class="login-container">

                <h2 align="center">Đăng nhập hệ thống</h2>
                
                <div class="login-form">
                 <form action="controller/qlCanBo.php" method="POST">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group password-container">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" id="password" name="password" required>
                        <span class="password-icon" onclick="togglePassword()">👁️</span>
                    </div>
                    <div class="login-btn" align="center" ><button type="submit" name="cv" value="btnLogin">Đăng Nhập</button></div>
                </form>
                <h4><?php if (isset($thongbao)) {
                    echo "<script>
                        document.getElementById('loginModal').style.display = 'flex';
                        </script>";
                    echo $thongbao;
                } ?></h4>
                <div class="forgot-password">
                    <a href="#">Quên mật khẩu?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const passwordIcon = document.querySelector('.password-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.textContent = '👁️';
        } else {
            passwordInput.type = 'password';
            passwordIcon.textContent = '👁️';
        }
    }

    function login() {


    }
</script>


<script>
    function openModal() {
        document.getElementById('loginModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('loginModal').style.display = 'none';
    }
</script>
</body>
</html>
