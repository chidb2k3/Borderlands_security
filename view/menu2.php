<?php
// Kiểm tra xem người dùng đã đăng nhập chưa

if (!isset($_SESSION['maCB'])) {
    // Nếu chưa đăng nhập, chuyển hướng về trang chủ
	header("Location: ../index.php");
	exit();
}

// Xử lý đăng xuất khi nhấp vào nút Đăng xuất
if (isset($_POST['cv']) && $_POST['cv']=="Đăng xuất") {
    // Hủy tất cả các session
	session_unset();
    // Hủy session hiện tại
	session_destroy();
    // Chuyển hướng về trang chủ
	header("Location: ../index.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<style>
		header {
/*			background-color: #007bff;*/
			background-image: url('../users/img-btn/head.png');
			color: white;
			padding: 20px;
			text-align: center;
		}
		#uploadModal {
			display: none;
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: #fff;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 5px;
			z-index: 2;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			max-width: 400px;
			width: 100%;
			text-align: center;
		}

		#uploadModal h3 {
			color: #007bff;
			margin-bottom: 20px;
		}

		#uploadModal input[type="file"] {
			margin-bottom: 10px;
		}

		#uploadModal button {
			background-color: #007bff;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		#uploadModal button:hover {
			background-color: #0056b3;
		}

		#uploadModal .close-btn {
			background-color: #ccc;
			color: #333;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		#uploadModal .close-btn:hover {
			background-color: #999;
		}

	</style>
</head>


<title>Quản lý nhân sự</title>
</head>
<body>
	<header>

		<img src="../users/img-btn/logo.png" alt="Logo Bộ Chỉ Huy" style="max-width: 100px;" align="left">
		<h1>BỘ CHỈ HUY BỘ ĐỘI BIÊN PHÒNG TỈNH QUẢNG BÌNH
		</h1>
	</header>
	<ul class="nav justify-content-center" style="background-color:#CCFFFF; margin-top: 5px; max-width: 85%;">
		<li class="nav-item"><a class="nav-link" href="../index.php"><b>TRANG CHỦ</b></a></li>
		
		<li class="nav-item">
			<a class="nav-link" href="qlBangLuong.php?cv=dsBangLuongYou"><b>BẢNG LƯƠNG</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="qlCanBo.php?cv=dsHoSo"><b>HỒ SƠ TRINH SÁT</b></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="qlCanBo.php?cv=tab&tab=CanBo"><b>THÔNG TIN CÁ NHÂN</b></a>
		</li>

		
		<li style="margin-left: 200px;">
			<span><?php if (isset($_SESSION['hoTen'])) {
				echo $_SESSION['hoTen'];
			} ?></span>
			<a href="javascript:void(0);" onclick="showUploadModal()"><img src="../users/img-users/<?php echo $_SESSION['maCB']; ?>.png"
				style="width: 45px; height: 45px; border-radius: 50%; ">
			</a>

			
		</li>


		

	</ul>


	<div id="uploadModal">
		<button  onclick="hideUploadModal()"><img src="../img/close.png" style="width: 30px; height: 30px;" ></button>
		<h3>Cập nhật avartar</h3>
		<form action="../users/upload.php" method="post" enctype="multipart/form-data">
			<input type="file" name="photo" accept="image/*">
			<button type="submit" disabled>Tải ảnh lên</button>
		</form>
		<form method="post" action="" style="padding: 10px; float: right;">
			<input type="submit" name="cv" value="Đăng xuất">
		</form>
	</div>

	<script>
		function showUploadModal() {
			document.getElementById('uploadModal').style.display = 'block';
		}

		function hideUploadModal() {
			document.getElementById('uploadModal').style.display = 'none';
		}
	</script>













	
	
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>