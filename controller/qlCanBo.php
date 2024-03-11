<?php 
session_start();
include_once("../model/m_CanBo.php");
include_once("../model/DB_driver.php");
include_once("../model/m_ChucVu.php");
include_once("../model/m_PhongBan.php");
include_once("../model/HoSoCanBo.php");
include_once("../model/Luong.php");

class qlCanBo{
	function m_chucvu(){
		return new m_ChucVu();
	}

	function m_phongban(){
		return new m_PhongBan();
	}
	function m_canbo(){
		return new m_CanBo();
	}
	
	function __construct(){

	}
	function logout(){

    // Hủy tất cả các session
		session_unset();
    // Hủy session hiện tại
		session_destroy();
    // Chuyển hướng về trang chủ
		header("Location: ../index.php");
		exit();
		
	}
	function you(){
		$you = $this->m_CanBo()->you($_SESSION['maCB']);
		return $you;
	}


	function xemDsCanBo(){
		if (isset($_GET['timkiemcanbo'])) {
			$dsCanBo = $this->m_CanBo() -> dsCanBoTimKiem($_GET['timkiemcanbo']);
			include_once("../view/DsCanBo.php");
		}else{
			$dsCanBo = $this->m_CanBo() -> dsCanBo();
			include_once("../view/DsCanBo.php");
		}


	}
	function xoaFile(){
		$tenFileHoSo = $_GET['tenFile'];
		$id = $_GET['id'];
		if (file_exists("../word/uploads/{$tenFileHoSo}")) {
			unlink("../word/uploads/{$tenFileHoSo}");
			$this->m_CanBo()->xoaFile($id);
			
			$_SESSION['thongbao']="Xóa thành công";

		}else{
			$_SESSION['thongbao']="Không tìm thấy file nào để xóa";
		}
		$this->dsHoSo();
		
	}
	function read(){
		include_once("../view/read.php");
	}
	function pL(){
		$soluong = 0;
		if (isset($_GET['tukhoa'])) {
			$tk = $_GET['tukhoa'];
			if (isset($_GET['cv'])&&isset($_GET['ma'])) {
				$a[0]=$_GET['ma'];
				$dsHoSo[0] = $this->m_CanBo()->pLL($_GET['ma'],$tk);
				$ma =$_GET['ma'];
				if ($ma==1) {
					$_SESSION['ds']="Danh Sách Phòng Trinh Sát";
				}else{
					if ($ma==2) {
						$_SESSION['ds']="Hồ Sơ Nội Biên";
					}else{
						if ($ma==4) {
							$_SESSION['ds']="Hồ Sơ Ngoại Biên";
						}else{
							$_SESSION['ds']="Đội Trinh Sát Cơ Động";
						}
					}
				}

				$soluong=count($dsHoSo[0]);
				include_once("../view/dsHoSo.php");
			}else{
				$_SESSION['thongbao']="Lỗi";
				$this->dsHoSo();
			}

		}else{
			if (isset($_GET['cv'])&&isset($_GET['ma'])) {
				$a[0]=$_GET['ma'];
				$dsHoSo[0] = $this->m_CanBo()->pL($_GET['ma']);
				$ma =$_GET['ma'];
				if ($ma==1) {
					$_SESSION['ds']="Danh Sách Phòng Trinh Sát";
				}else{
					if ($ma==2) {
						$_SESSION['ds']="Hồ Sơ Nội Biên";
					}else{
						if ($ma==4) {
							$_SESSION['ds']="Hồ Sơ Ngoại Biên";
						}else{
							$_SESSION['ds']="Đội Trinh Sát Cơ Động";
						}
					}
				}
				$soluong=count($dsHoSo[0]);
				include_once("../view/dsHoSo.php");
			}else{
				$_SESSION['thongbao']="Lỗi";
				$this->dsHoSo();
			}

		}

		
		
	}
	function dsHoSo(){
		$soluong = 0;
		if (isset($_GET['tukhoa'])) {
			$tk = $_GET['tukhoa'];

			if (isset($_SESSION['you']) && $_SESSION['you']['role']==1) {
				$_SESSION['ds']="Tất cả hồ sơ";
				$a[0]=1;$a[1]=2;$a[2]=4;$a[3]=5;
				$dsHoSo[0] = $this->m_CanBo()->pLL($a[0],$tk);
				$dsHoSo[1] = $this->m_CanBo()->pLL($a[1],$tk);
				$dsHoSo[2] = $this->m_CanBo()->pLL($a[2],$tk);
				$dsHoSo[3] = $this->m_CanBo()->pLL($a[3],$tk);
				$soluong = count($dsHoSo[0])+count($dsHoSo[1])+count($dsHoSo[2])+count($dsHoSo[3]);
			}else{
				$you = $this->you();

				$ma=$you[0]['maHS'];
				$idLoaiHoSo=$this->m_CanBo()->TaiLieu($ma);
				for ($i=0; $i < sizeof($idLoaiHoSo) ; $i++) { 
					$a[$i]=$idLoaiHoSo[$i]['idLoaiHoSo'];
					$dsHoSo[$i]=$this->m_CanBo()->pLL($a[$i],$tk);
					$soluong+=count($dsHoSo[$i]);
				}




			}
		}else{

			if (isset($_SESSION['you']) && $_SESSION['you']['role']==1) {
				$_SESSION['ds']="Tất cả hồ sơ";
				$a[0]=1;$a[1]=2;$a[2]=4;$a[3]=5;
				$dsHoSo[0] = $this->m_CanBo()->pL($a[0]);
				$dsHoSo[1] = $this->m_CanBo()->pL($a[1]);
				$dsHoSo[2] = $this->m_CanBo()->pL($a[2]);
				$dsHoSo[3] = $this->m_CanBo()->pL($a[3]);
				$soluong = count($dsHoSo[0])+count($dsHoSo[1])+count($dsHoSo[2])+count($dsHoSo[3]);
			}else{
				$you = $this->you();

				$ma=$you[0]['maHS'];
				$idLoaiHoSo=$this->m_CanBo()->TaiLieu($ma);
				for ($i=0; $i < sizeof($idLoaiHoSo) ; $i++) { 
					$a[$i]=$idLoaiHoSo[$i]['idLoaiHoSo'];
					$dsHoSo[$i]=$this->m_CanBo()->pL($a[$i]);
					$soluong+=count($dsHoSo[$i]);
				}




			}

		}

		
		
		include_once("../view/dsHoSo.php");
	}
	function login(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if (isset($_POST['username']) && isset($_POST['password'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$role = $this->m_CanBo()->checkIn($username,$password);
				if ($role==2) {
					$thongbao = "Sai tên đăng nhập hoặc mật khẩu!";
					include_once("../index.php");
				}else{
					if ($role==1) {
						$this->xemDsCanBo();
					}else{
						if ($role==0) {
							include_once("../view/CanBo.php");
						}

					}
				}
			}


		}
	}
	// function dsBangLuong(){
	// 	$bangluong = $this->m_CanBo() -> dsBangLuong();
	// 	include_once("../view/BangLuong.php");

	// }
	function tab(){
		if (isset($_GET['tab'])) {
			$tab = $_GET['tab'];
			include_once("../view/{$tab}.php");
		}


	}
	function hoSoCanBo(){
		$hoso = $this->m_CanBo()->HoSoCanBo($_GET['maCB']);
		$canbo = $this->m_CanBo()->chiTietCanBo($_GET['maCB']);
		$dschucvu = $this->m_ChucVu()->dsChucVu();
		$dsphongban = $this->m_PhongBan()->dsPhongBan();
		$dsTaiLieu = $this->m_ChucVu()->dsTaiLieu();
		$tenCV = $this->m_ChucVu()->tenChucVu($hoso[0]['maCV']);
		$tenTaiLieu = $this->m_ChucVu()->tenTaiLieu($hoso[0]['tailieu']);
		$tenPB = $this->m_PhongBan()->tenPhongBan($hoso[0]['maPB']);
		$tailieu = $hoso[0]['tailieu'];
		$idLoaiHoSo = $this->m_CanBo()->TaiLieu($hoso[0]['maHS']);
		include_once("../view/HoSoCanBo.php");
	}
	function luongCanBo(){
		$bangluong = $this->m_CanBo()->luongCanBo($_GET['maCB']);
		include_once("../view/LuongCanBo.php");
	}
	function capNhatCanBo(){
		$canbo = $this->m_CanBo()->chiTietCanBo($_GET['maCB']);
		$_SESSION['maCBC']= $_GET['maCB'];
		include_once("../view/CapNhatCanBo.php");
	}
	function btncapNhatCanBo(){
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$maCB = $_SESSION['maCBC'];
			unset($_SESSION['maCBC']);
			$hoTen = $_GET['hoTen'];
			$ngaySinh = $_GET['ngaySinh'];
			$gioiTinh = $_GET['gioiTinh'];
			$diaChi = $_GET['diaChi'];
			$soDT = $_GET['soDT'];
			$email = $_GET['email'];
			$username = $_GET['username'];
			$password = $_GET['password'];
			$role = $_GET['role'];
			$cb = new CanBo($hoTen,$ngaySinh,$gioiTinh,$diaChi,$soDT,$email,$username,$password, $role);
			$db = new DB_driver();
			$db -> updateCanBo($cb,$maCB);
			unset($_SESSION['cv']);
		// $this->xemDsCanBo();
			header("location: qlCanBo.php?cv=dsCanBo");

		}

	}

	function btnThemCanBo(){
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$hoTen = $_GET['hoTen'];
			$ngaySinh = $_GET['ngaySinh'];
			$gioiTinh = $_GET['gioiTinh'];
			$diaChi = $_GET['diaChi'];
			$soDT = $_GET['soDT'];
			$email = $_GET['email'];
			$cb = new CanBo($hoTen,$ngaySinh,$gioiTinh,$diaChi,$soDT,$email,"","","");
			$db = new DB_driver();
			$db -> themCanBo($cb);
			unset($_SESSION['cv']);
		// $this->xemDsCanBo();
			header("location: qlCanBo.php?cv=dsCanBo");

		}

	}
	function btnluuHoSo(){
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$db = new DB_driver();
			$maHS = $_SESSION['maHS'];
			$maCV = $_GET['maCV'];
			$maPB = $_GET['maPB'];
			$trinhDo = $_GET['trinhDo'];
			$ngayVao = $_GET['ngayVao'];
			$ngayRa = $_GET['ngayRa'];
			$lyDo = $_GET['lyDo'];
			if (isset($_GET['idLoaiHoSo1'])&& $_GET['idLoaiHoSo1']==1) {
				if (sizeof($db->TonTai($maHS,1))==0) {
					$db->addTL($maHS,1);
				}
				
			}else{
				$db->delTL($maHS,1);
			}
			if (isset($_GET['idLoaiHoSo2'])&& $_GET['idLoaiHoSo2']==2) {
				if (sizeof($db->TonTai($maHS,2))==0) {
					$db->addTL($maHS,2);
				}
			}else{
				$db->delTL($maHS,2);
			}
			if (isset($_GET['idLoaiHoSo4'])&& $_GET['idLoaiHoSo4']==4) {
				if (sizeof($db->TonTai($maHS,4))==0) {
					$db->addTL($maHS,4);
				}
			}else{
				$db->delTL($maHS,4);
			}
			if (isset($_GET['idLoaiHoSo5'])&& $_GET['idLoaiHoSo5']==5) {
				if (sizeof($db->TonTai($maHS,5))==0) {
					$db->addTL($maHS,5);
				}
			}else{
				$db->delTL($maHS,5);
			}

			$hs = new HoSoCanBo($maCV,$maPB,$trinhDo,$ngayVao,$ngayRa,$lyDo);
			
			$db -> updateHoSo($hs,$maHS);
			unset($_SESSION['cv']);
		// $this->xemDsCanBo();
			header("location: qlCanBo.php?cv=dsCanBo");

		}

	}
	// function btnluuLuong(){
	// 	if($_SERVER['REQUEST_METHOD']=='GET'){
	// 		$maLuong = $_SESSION['maLuong'];
	// 		unset($_SESSION['maLuong']);
	// 		$maCB = $_SESSION['maCB'];
	// 		unset($_SESSION['maCB']);
	// 		$thang = $_GET['thang'];
	// 		$nam = $_GET['nam'];
	// 		$luongCoBan = $_GET['luongCoBan'];
	// 		$tienThuong = $_GET['tienThuong'];
	// 		$tienPhat = $_GET['tienPhat'];
	// 		$heSoLuong = $_GET['heSoLuong'];
	// 		$tienLuong = $luongCoBan*$heSoLuong+$tienThuong;
	// 		$luongThucNhan = $tienLuong-$tienPhat;
	// 		$luong = new Luong($maCB, $thang, $nam, $luongCoBan, $tienThuong, $tienPhat, $heSoLuong, $tienLuong, $luongThucNhan);
	// 		$db = new DB_driver();
	// 		$db -> updateBangLuong($luong,$maLuong)

	// 		unset($_SESSION['cv']);
	//         header("location: qlCanBo.php?cv=dsCanBo");


	// 	}
	// }
	function btn_luuLuong(){
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$maLuong = $_SESSION['maLuong'];
			unset($_SESSION['maLuong']);
			$maCB = $_SESSION['maCBL'];
			unset($_SESSION['maCBL']);
			$thang = $_GET['thang'];
			$nam = $_GET['nam'];
			$luongCoBan = $_GET['luongCoBan'];
			$tienThuong = $_GET['tienThuong'];
			$tienPhat = $_GET['tienPhat'];
			$heSoLuong = $_GET['heSoLuong'];
			$tienLuong = $luongCoBan*$heSoLuong+$tienThuong;
			$luongThucNhan = $tienLuong-$tienPhat;
			$luong = new Luong($maCB, $thang, $nam, $luongCoBan, $tienThuong, $tienPhat, $heSoLuong, $tienLuong, $luongThucNhan);
			$db = new DB_driver();
			if ($db -> updateBangLuong($luong,$maLuong)) {
				unset($_SESSION['cv']);
				header("location: qlCanBo.php?cv=dsCanBo");
			}else{
				echo "Lỗi ";
			}


			

		}


	}

	function btnXoaCanBo(){
		$this->m_canbo() -> xoaCanBo($_GET['maCB']);
		$_SESSION['thongbao']="Xóa thành công";
		header("location: qlCanBo.php?cv=dsCanBo");
	}

}


if(isset($_GET['cv'])){
	$_SESSION['cv'] = $_GET['cv'];
}
if(isset($_POST['cv'])){
	$_SESSION['cv'] = $_POST['cv'];

}
if (isset($_SESSION["cv"])) {
	$cv = $_SESSION['cv'];
}else{
	$cv = "";
}
$ql = new qlCanBo();


if($cv=="dsCanBo") {
	$ql->xemDsCanBo();
}
if ($cv=="themCanBo") {
	include_once("../view/ThemCanBo.php");
}
if ($cv=="capNhatCanBo") {
	$ql->capNhatCanBo();
}
if ($cv=="btnThemCanBo") {
	$ql->btnThemCanBo();
}
if ($cv=="xoaCanBo") {
	$ql->btnXoaCanBo();
}
if ($cv =="hoSoCanBo") {
	$ql->hoSoCanBo();
}
if ($cv =="btnluuHoSo") {
	$ql -> btnluuHoSo();
}
if ($cv =="btnluuLuong") {
	$ql -> btn_luuLuong();
}
if ($cv=="btncapNhatCanBo") {
	$ql->btncapNhatCanBo();
}
if ($cv == "luongCanBo") {
	$ql->luongCanBo();
}
if ($cv == "btnLogin") {
	$ql->login();
}
if ($cv == "dsHoSo") {
	$ql->dsHoSo();
}
if ($cv=="xoaFile") {
	$ql->xoaFile();
}
if ($cv=="pL") {
	$ql->pL();
}
if ($cv=="tab") {
	$ql->tab();
}
if ($cv=="Đăng xuất") {
	$ql->logout();
}
if ($cv=="read") {
	$ql->read();
}
// if ($cv="dsBangLuong") {
// 	$ql->dsBangLuong();
// }



?>