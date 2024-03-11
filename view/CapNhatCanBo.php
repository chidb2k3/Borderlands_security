
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cán Bộ</title>
</head>
<body>
	<?php include("menu.php");
	// if (isset($_GET['maCB'])) {
	//  	$_SESSION['maCBC']=$_GET['maCB'];
	//  } ?>
	<a href="javascript:history.back()"><img src="../img/back.png" style="width: 35px; height: 30px; margin-left: 5%;"> </a>

	<span style="margin-left: 10px; color: red; margin-left: 30%;"><b>CẬP NHẬT THÔNG TIN CÁN BỘ</b> </span>


		<form class="row g-1" style="width: 60%; margin-left: 20%;"method="GET" >
				<div class="col-md-6">
				<label for="inputCity" class="form-label">Họ tên</label>
				<input type="text" class="form-control" id="inputCity" name="hoTen" value="<?php echo 
				$canbo[0]['hoTen']; ?>">
			</div>
			
			<div class="col-md-6">
				<label for="inputPassword4" class="form-label">Ngày sinh</label>
				<input type="date" class="form-control" id="inputPassword4" name="ngaySinh" value="<?php echo $canbo[0]['ngaySinh']; ?>">
			</div>
			<div class="col-12">
				<label for="inputAddress" class="form-label">Địa Chỉ</label>
				<input type="text" class="form-control" id="inputAddress" name="diaChi" value="<?php echo $canbo[0]['diaChi']; ?>">
			</div>
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Email</label>
				<input type="email" class="form-control" id="inputEmail4"placeholder="@gmail.com" name="email" value="<?php echo $canbo[0]['email']; ?>">
			</div>
			<!-- <div class="col-md-6">
				<label for="inputCity" class="form-label">Email</label>
				<input type="text" class="form-control" id="inputCity" placeholder="@gmail.com">
			</div> -->
			<div class="col-md-4">
				<label for="inputState" class="form-label">Giới tính</label>
				<select id="inputState" class="form-select" name="gioiTinh">
					<option selected value="<?php $canbo[0]['gioiTinh']; ?>"><?php echo $canbo[0]['gioiTinh']; ?></option>
					<option value="Nữ">Nữ</option>
					<option value="Nam">Nam</option>
					<option value="Khác">Khác</option>
				</select>
			</div>
			<div class="col-md-2">
				<label for="inputZip" class="form-label">Số điện thoại</label>
				<input type="text" class="form-control" id="inputZip" placeholder="+84" name="soDT" value="<?php echo $canbo[0]['soDT']; ?>">
			</div>
			<div class="col-md-6">
				<label for="inputAddress" class="form-label">username</label>
				<input type="text" class="form-control" id="inputAddress" name="username" value="<?php echo $canbo[0]['username']; ?>">
			</div>
			<div class="col-md-6">
				<label for="inputAddress" class="form-label">password</label>
				<input type="text" class="form-control" id="inputAddress" name="password" value="<?php echo $canbo[0]['password']; ?>">
			</div>
			<div class="col-md-4">
				<label for="inputState" class="form-label">Quyền</label>
				<select id="inputState" class="form-select" name="role">
					<option selected value="<?php $canbo[0]['role']; ?>"><?php if ($canbo[0]['role']==1) {
						echo "Admin";
					}else{
						echo "Người dùng";
					} ?></option>
					<option value="1">Admin</option>
					<option value="0">Người dùng</option>
				</select>
			</div>
			<!-- <div class="col-12">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="gridCheck">
					<label class="form-check-label" for="gridCheck">
						Check me out
					</label>
				</div>
			</div> -->
			<div class="col-12">
				<button type="submit" class="btn btn-primary" name="cv" value="btncapNhatCanBo">Lưu</button>
			</div>
		</form>

	</body>
	</html>