<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PhongBan</title>
	
</head>
<body>
	
	<?php include("menu.php"); ?>
	<a href="javascript:history.back()"><img src="../img/back.png" style="width: 35px; height: 30px; margin-left: 5%;"> </a>
	<a href="?cv=themPhongBan"><button type="button" class="btn btn-primary"
		style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
		Thêm
	</button></a>
	<span style="margin-left: 10px; color: red; margin-left: 30%;"><b>DANH SÁCH PHÒNG BAN</b> </span>
	

	<table class="table">
		<thead>
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Mã Phòng Ban</th>
				<th scope="col">Tên Phòng Ban</th>
				<th scope="col">Địa Chỉ</th>
				<th scope="col">Số điện thoại</th>
				<th scope="col">Email</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody class="table-group-divider">
			<?php 
			for ($i=1; $i < sizeof($dsPhongBan); $i++) { 
				$j = $dsPhongBan[$i]['maPB'];
				echo "<tr>";
				echo '<th scope="row">'.$i.'</th>';
				echo "<td>PB".$dsPhongBan[$i]['maPB']."</td>";
				echo "<td>".$dsPhongBan[$i]['tenPB']."</td>";
				echo "<td>".$dsPhongBan[$i]['diaChi']."</td>";
				echo "<td>".$dsPhongBan[$i]['sDT']."</td>";
				echo "<td>".$dsPhongBan[$i]['email']."</td>";
				echo '<td><a href="?cv=capNhatPhongBan&maPB='.$j.'">Cập nhật</a></td>';
				echo '<td><a href="?cv=xoaPhongBan&maPB='.$j.'"><i class="bi bi-trash"></i></a></td>';
				echo "</tr>";
			}
			?>

		</tbody>
	</table>


</body>
</html>