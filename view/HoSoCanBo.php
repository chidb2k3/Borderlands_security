<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hồ sơ cán bộ</title>
</head>
<body>
	<?php include("menu.php"); $_SESSION['maHS']= $hoso[0]['maHS'];?>
	<a href="javascript:history.back()"><img src="../img/back.png" style="width: 35px; height: 30px; margin-left: 5%;"> </a>

	<span style="margin-left: 10px; color: red; margin-left: 30%;"><b>HỒ SƠ CÁN BỘ</b> </span>


	<form class="row g-1" style="width: 60%; margin-left: 20%;"method="GET" >
		<div class="col-md-6">
			<label for="inputCity" class="form-label">Mã Hồ Sơ</label>
			<input type="text" class="form-control" id="inputCity" name="maHS" value="<?php echo 
			$hoso[0]['maHS'];  ?>" disabled>
		</div>
		<div class="col-md-6">
			<label for="inputCity" class="form-label">Mã Cán Bộ</label>
			<input type="text" class="form-control" id="inputCity" value="<?php echo 
			$hoso[0]['maCB']; ?>" disabled>
		</div>
		<div class="col-md-6">
			<label for="inputCity" class="form-label">Họ tên</label>
			<input type="text" class="form-control" id="inputCity" name="hoTen" value="<?php echo 
			$canbo[0]['hoTen']; ?>" disabled>
		</div>
		<div class="col-md-6">
			<label for="inputCity" class="form-label">Trình độ</label>
			<input type="text" class="form-control" id="inputCity" name="trinhDo" value="<?php echo 
			$hoso[0]['trinhDo']; ?>">
		</div>
		<div class="col-md-4">
			<label for="inputState" class="form-label">Chức vụ</label>
			<select id="inputState" class="form-select" name="maCV">
				<option selected value="<?php echo $hoso[0]['maCV'] ?>"><?php echo $tenCV; ?></option>
				<?php 
				for ($i=0; $i < sizeof($dschucvu) ; $i++) { 
					echo '<option value="'.$dschucvu[$i]["maCV"].'">'.$dschucvu[$i]["tenCV"].'</option>';
				}

				?>

			</select>
		</div>
		<div class="col-md-4">
			<label for="inputState" class="form-label">Phòng ban</label>
			<select id="inputState" class="form-select" name="maPB">
				<option selected value="<?php echo $hoso[0]['maPB'] ?>"><?php echo $tenPB; ?></option>
				<?php 
				for ($i=0; $i < sizeof($dsphongban) ; $i++) { 
					echo '<option value="'.$dsphongban[$i]["maPB"].'">'.$dsphongban[$i]["tenPB"].'</option>';
				}

				?>

			</select>
		</div>
		<div class="col-md-4" >
			<label for="inputState" class="form-label">Quyền truy cập tài liệu</label><br>



			<?php $a[0]=0; for($i=0; $i<sizeof($idLoaiHoSo); $i++){

				$a[$i] = $idLoaiHoSo[$i]['idLoaiHoSo'];

			} ?>
			<input type="checkbox" name="idLoaiHoSo1" value="1" <?php  for($i=0; $i<sizeof($a); $i++){
				if ($a[$i]==1) {
					echo "checked";
					break;
				}

			}   ?> >Danh sách phòng trinh sát<br>
			<input type="checkbox" name="idLoaiHoSo2"value="2"<?php  for($i=0; $i<sizeof($a); $i++){
				if ($a[$i]==2) {
					echo "checked";
					break;
				}

			}   ?> >Hồ sơ nội biên<br>
			<input type="checkbox" name="idLoaiHoSo4" value="4"<?php  for($i=0; $i<sizeof($a); $i++){
				if ($a[$i]==4) {
					echo "checked";
					break;
				}

			}   ?> >Danh sách phòng trinh sát<br>
			<input type="checkbox" name="idLoaiHoSo5" value="5"<?php  for($i=0; $i<sizeof($a); $i++){
				if ($a[$i]==5) {
					echo "checked";
					break;
				}

			}   ?> >Đội trinh sát cơ động

		</div>
		<div class="col-md-6">
			<label for="inputPassword4" class="form-label">Ngày vào làm</label>
			<input type="date" class="form-control" id="inputPassword4" name="ngayVao" value="<?php echo $hoso[0]['ngayVao']; ?>" >
		</div>
		<div class="col-md-6">
			<label for="inputPassword4" class="form-label">Ngày nghỉ việc</label>
			<input type="date" class="form-control" id="inputPassword4" name="ngayRa" value="<?php echo $hoso[0]['ngayRa']; ?>">
		</div>
		<div class="col-md-6">
			<label for="inputPassword4" class="form-label">Lý do nghỉ việc</label>
			<input type="text" class="form-control" id="inputPassword4" name="lyDo" value="<?php echo $hoso[0]['lyDo']; ?>">
		</div>
		<div class="col-12">
			<button type="submit" class="btn btn-primary" name="cv" value="btnluuHoSo">Lưu</button>
		</div>
	</form>
	<hr>

</body>
</html>