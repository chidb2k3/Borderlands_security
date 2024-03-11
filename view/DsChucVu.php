<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chức Vụ</title>
	
</head>
<body>
	
	<?php include("menu.php"); ?>
	<a href="javascript:history.back()"><img src="../img/back.png" style="width: 35px; height: 30px; margin-left: 5%;"> </a>
	<a href="?cv=themChucVu"><button type="button" class="btn btn-primary"
		style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
		Thêm
	</button></a>
	<span style="margin-left: 10px; color: red; margin-left: 30%;"><b>DANH SÁCH CHỨC VỤ</b> </span>
	

	<table class="table">
		<thead>
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Mã chức vụ</th>
				<th scope="col">Tên chức vụ</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody class="table-group-divider">
			<?php 
			for ($i=1; $i < sizeof($dsChucVu); $i++) { 
				$j = $dsChucVu[$i]['maCV'];
				echo "<tr>";
				echo '<th scope="row">'.$i.'</th>';
				echo "<td>CV".$dsChucVu[$i]['maCV']."</td>";
				echo "<td>".$dsChucVu[$i]['tenCV']."</td>";
				echo '<td><a href="?cv=capNhatChucVu&maCV='.$j.'">Cập nhật</a></td>';
				echo '<td><a href="?cv=xoaChucVu&maCV='.$j.'"><i class="bi bi-trash"></i></a></td>';
				echo "</tr>";
			}
			?>

		</tbody>
	</table>


</body>
</html>