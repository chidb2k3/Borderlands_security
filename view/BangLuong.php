<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lương cán bộ</title>
</head>
<body>
	<?php if (isset($_SESSION['you'])) {
		if ($_SESSION['you']['role']==1) {
			include("menu.php");
		}else{
			include("menu2.php");
		}
	}  $_SESSION['maLuong']=$bangluong[0]['maLuong'];
	$_SESSION['maCB']=$bangluong[0]['maCB'];
	?>
	<a href="javascript:history.back()"><img src="../img/back.png" style="width: 35px; height: 30px; margin-left: 5%;"> </a>

		<span style="margin-left: 10px; color: red; margin-left: 30%;"><b>DANH SÁCH BẢNG LƯƠNG</b> </span>
		<br>

		<hr>

  <?php for ($i=0; $i < sizeof($bangluong); $i++) { 
  	// code..
   ?><span>STT <?php echo $i+1; ?></span>
		<form class="row g-1" style="width: 60%; margin-left: 20%;"method="GET"  >
			<div class="col-md-2">
				<label for="inputCity" class="form-label">Mã Lương</label>
				<input size="10" type="text" class="form-control" id="inputCity" name="maHS" value="<?php echo 
				$bangluong[$i]['maLuong'];  ?>" disabled >
			</div>
			<div class="col-md-2">
				<label for="inputCity" class="form-label">Mã Cán Bộ</label>
				<input type="text" class="form-control" id="inputCity" name="maCB" value="<?php echo 
				$bangluong[$i]['maCB']; ?>" disabled>
			</div>
			<div class="col-md-2">
				<label for="inputCity" class="form-label">Tháng</label>
				<input type="number" class="form-control" id="inputCity" name="thang" value="<?php echo 
				$bangluong[$i]['maLuong']; ?>">
			</div>
			<div class="col-md-2">
				<label for="inputCity" class="form-label">Năm</label>
				<input type="number" class="form-control" id="inputCity" name="nam" value="<?php echo 
				$bangluong[$i]['nam'];  ?>">
			</div>
			<div class="col-md-6">
				<label for="inputCity" class="form-label">Lương cơ bản</label>
				<input type="text" class="form-control" id="inputCity" name="luongCoBan" value="<?php echo 
				$bangluong[$i]['luongCoBan']."     VNĐ"; ?>">
			</div>
			<div class="col-md-6">
				<label for="inputCity" class="form-label">Tiền thưởng</label>
				<input type="text" class="form-control" id="inputCity" name="tienThuong" value="<?php echo 
				$bangluong[$i]['tienThuong']."     VNĐ";  ?>">
			</div>
			<div class="col-md-6">
				<label for="inputCity" class="form-label">Tiền phạt</label>
				<input type="text" class="form-control" id="inputCity" name="tienPhat" value="<?php echo 
				$bangluong[$i]['tienPhat']."     VNĐ";  ?>">
			</div>
				<div class="col-md-4">
				<label for="inputCity" class="form-label">Hệ số lương</label>
				<input type="text" class="form-control" id="inputCity" name="heSoLuong" value="<?php echo 
				$bangluong[$i]['heSoLuong'];  ?>">
			</div>
			<div class="col-md-2">
				<label for="inputCity" class="form-label">Tiền lương</label>
				<input type="text" class="form-control" id="inputCity" name="tienLuong" value="<?php echo 
				$bangluong[$i]['tienLuong']."     VNĐ"; ?>">
			</div>
			<div class="col-md-3">
				<label for="inputCity" class="form-label">Tiền thực nhận</label>
				<input type="text" class="form-control" id="inputCity" name="luongThucNhan" value="<?php echo 
				$bangluong[$i]['luongThucNhan']."     VNĐ";  ?>">
			</div>
		</form>
		<hr style="color: red" size="2">
	<?php } ?>

	</body>
	</html>