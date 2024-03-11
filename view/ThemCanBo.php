<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm Cán Bộ</title>
</head>
<body>
	<?php include("menu.php"); ?>
	<a href="?cv=dsCanBo"><img src="../img/back.png" style="width: 35px; height: 30px; margin-left: 5%;"> </a>

		<span style="margin-left: 10px; color: red; margin-left: 30%;"><b>THÊM CÁN BỘ</b> </span>

		<form class="row g-1" style="width: 60%; margin-left: 20%;"method="GET" >
				<div class="col-md-6">
				<label for="inputCity" class="form-label">Họ tên</label>
				<input type="text" class="form-control" id="inputCity" name="hoTen">
			</div>
			
			<div class="col-md-6">
				<label for="inputPassword4" class="form-label">Ngày sinh</label>
				<input type="date" class="form-control" id="inputPassword4" name="ngaySinh">
			</div>
			<div class="col-12">
				<label for="inputAddress" class="form-label">Địa Chỉ</label>
				<input type="text" class="form-control" id="inputAddress" name="diaChi">
			</div>
			<div class="col-md-6">
				<label for="inputEmail4" class="form-label">Email</label>
				<input type="email" class="form-control" id="inputEmail4"placeholder="@gmail.com" name="email">
			</div>
			<!-- <div class="col-md-6">
				<label for="inputCity" class="form-label">Email</label>
				<input type="text" class="form-control" id="inputCity" placeholder="@gmail.com">
			</div> -->
			<div class="col-md-4">
				<label for="inputState" class="form-label">Giới tính</label>
				<select id="inputState" class="form-select" name="gioiTinh">
					<option selected value="Nam">Nam</option>
					<option value="Nữ">Nữ</option>
					<option value="Khác">Khác</option>
				</select>
			</div>
			<div class="col-md-2">
				<label for="inputZip" class="form-label">Số điện thoại</label>
				<input type="text" class="form-control" id="inputZip" placeholder="+84" name="soDT">
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
				<button type="submit" class="btn btn-primary" name="cv" value="btnThemCanBo">Ok</button>
			</div>
		</form>

	</body>
	</html>