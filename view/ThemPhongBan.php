<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm Phòng Ban</title>
</head>
<body>
	<?php include("menu.php"); ?>
	<a href="javascript:history.back()"><img src="../img/back.png" style="width: 35px; height: 30px; margin-left: 5%;"> </a>

	<span style="margin-left: 10px; color: red; margin-left: 30%;"><b>THÊM PHÒNG BAN</b> </span>


	<form class="row g-1" style="width: 60%; margin-left: 20%;"method="GET" >
		<div class="col-md-6">
			<label for="inputCity" class="form-label">Tên phòng ban</label>
			<input type="text" class="form-control" id="inputCity" name="tenPB">
		</div>
		<div class="col-12">
			<label for="inputAddress" class="form-label">Địa Chỉ</label>
			<input type="text" class="form-control" id="inputAddress" name="diaChi">
		</div>
		<div class="col-md-6">
			<label for="inputEmail4" class="form-label">Email</label>
			<input type="email" class="form-control" id="inputEmail4"placeholder="@gmail.com" name="email">
		</div>
		
		<div class="col-md-2">
			<label for="inputZip" class="form-label">Số điện thoại</label>
			<input type="text" class="form-control" id="inputZip" placeholder="+84" name="sDT">
		</div>
		
		<div class="col-12">
			<button type="submit" class="btn btn-primary" name="cv" value="btnThemPhongBan">Ok</button>
		</div>
	</form>

</body>
</html>