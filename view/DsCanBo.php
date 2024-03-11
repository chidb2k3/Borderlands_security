<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách cán bộ</title>
	
</head>
<body>
	
	<?php 
	include("menu.php"); 
	?>
	<div style="text-align: center;"><span style="margin-left: 10px; color: red;" ><b>DANH SÁCH CÁN BỘ</b></span></div>
	<div>
		<div style="width: 100px;">
			<a href="javascript:history.back()"><img src="../img/back.png" style="width: 35px; height: 30px; margin-left: 5%;"> </a>
			<a href="?cv=themCanBo"><button type="button" class="btn btn-primary"
				style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
				Thêm
			</button></a>
			
		</div>
		<div>

			<form style="float: left;">
               <input disabled type="" name="" value="Tất cả cán bộ">
               <input type="" name="" disabled value="Số lượng: <?php echo count($dsCanBo); ?>" size="9">
				<input size="30" type="text" name="timkiemcanbo" placeholder="Tìm kiếm cán bộ" value="<?php if (isset($_GET['timkiemcanbo'])) {
					echo $_GET['timkiemcanbo'];
				} ?>">
				<!-- <button type="submit" name="btn" value="Tìm Kiếm">Tìm Kiếm</button> -->
				<input type="submit" name="btn" value="Tìm Kiếm">
			</form>
			<form style="text-align: center;">
				<button type="submit" name="cv" value="dsCanBo" style="border: 10px;">Hiển thị tất cả</button>
			</form>
			
		</div>
		

		
	</div>
	
	
	

	<table class="table"><b></b>
		<thead>
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Mã cán bộ</th>
				<th scope="col">Ảnh</th>
				<th scope="col">Họ tên</th>
				<th scope="col">Ngày sinh</th>
				<th scope="col">Giới tính</th>
				<th scope="col">Địa chỉ</th>
				<th scope="col">Số điện thoại</th>
				<th scope="col">Email</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody class="table-group-divider">
			<?php 
			for ($i=0; $i < sizeof($dsCanBo); $i++) { 
				$j = $dsCanBo[$i]['maCB'];
				echo "<tr>";
				echo '<th scope="row">'.$i.'</th>';
				echo "<td>CB".$dsCanBo[$i]['maCB']."</td>";?>
				<td><img style="width: 100px; height: 100px;" src="../users/img-users/<?php echo $dsCanBo[$i]['maCB'];  ?>.png"></td>
				<?php
				echo "<td>".$dsCanBo[$i]['hoTen']."</td>";
				echo "<td>".$dsCanBo[$i]['ngaySinh']."</td>";
				echo "<td>".$dsCanBo[$i]['gioiTinh']."</td>";
				echo "<td>".$dsCanBo[$i]['diaChi']."</td>";
				echo "<td>0".$dsCanBo[$i]['soDT']."</td>";
				echo "<td>".$dsCanBo[$i]['email']."</td>";
				echo '<td><a href="?cv=luongCanBo&maCB='.$j.'">Lương</a></td>';
				echo '<td><a href="?cv=capNhatCanBo&maCB='.$j.'">Cập nhật</a></td>';
				echo '<td><a href="?cv=hoSoCanBo&maCB='.$j.'">Hồ sơ</a></td>';
				echo '<td><a href="?cv=xoaCanBo&maCB='.$j.'"><i class="bi bi-trash"></i></a></td>';
				echo "</tr>";
			}
			?>

		</tbody>
	</table>


</body>
</html>