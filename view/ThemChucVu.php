<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CHức Vụ</title>
</head>
<body>
	<?php include("menu.php"); ?>
	<a href="javascript:history.back()"><img src="../img/back.png" style="width: 35px; height: 30px; margin-left: 5%;"> </a>

	<span style="margin-left: 10px; color: red; margin-left: 30%;"><b>THÊM CHỨC VỤ</b> </span>

	<form class="row g-1" style="width: 60%; margin-left: 20%;"method="GET" >
		<div class="col-md-6">
			<label for="inputCity" class="form-label">Tên chức vụ</label>
			<input type="text" class="form-control" id="inputCity" name="tenCV">
		</div>

		<div class="col-12">
			<button type="submit" class="btn btn-primary" name="cv" value="btnThemChucVu">Ok</button>
		</div>
	</form>

</body>
</html>