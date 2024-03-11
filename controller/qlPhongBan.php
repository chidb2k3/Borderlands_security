<?php 
session_start();
include_once("../model/m_PhongBan.php");
include_once("../model/DB_driver.php");
class qlPhongBan{
	function m_PhongBan(){
		return new m_PhongBan();
	}
	function __construct(){

	}
	function dsPhongBan(){
		$dsPhongBan = $this->m_PhongBan()->dsPhongBan();
		include_once("../view/DsPhongBan.php");
	}
	function btnXoaPhongBan(){
			$this->m_PhongBan() -> xoaPhongBan($_GET['maPB']);
		$_SESSION['thongbao']="Xóa thành công";
		header("location: qlPhongBan.php?cv=dsPhongBan");
	}
	function btnThemPhongBan(){
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$tenPB = $_GET['tenPB'];
			$diaChi = $_GET['diaChi'];
			$sDT = $_GET['sDT'];
			$email = $_GET['email'];
			$pb = new PhongBan($tenPB,$diaChi,$sDT,$email);
			$db = new DB_driver();
			$db -> themPhongBan($pb);
		
			header("location: qlPhongBan.php?cv=dsPhongBan");

		}
    }
   function capNhatPhongBan(){
   	$phongban = $this->m_PhongBan()->phongBan($_GET['maPB']);
   	$_SESSION['maPB']=$_GET['maPB'];
   	include_once("../view/CapNhatPhongBan.php");
   }
   function btncapNhatPhongBan(){
   	if($_SERVER['REQUEST_METHOD']=='GET'){
   		$maPB = $_SESSION['maPB'];
   		unset($_SESSION['maPB']);
			$tenPB = $_GET['tenPB'];
			$diaChi = $_GET['diaChi'];
			$sDT = $_GET['sDT'];
			$email = $_GET['email'];
			$pb = new PhongBan($tenPB,$diaChi,$sDT,$email);
			$db = new DB_driver();
			$db -> updatePhongBan($pb,$maPB);
		
			header("location: qlPhongBan.php?cv=dsPhongBan");

		}
   }
}

$cv = "";
if (isset($_GET['cv'])) {
	$cv = $_GET['cv'];
}

$ql = new qlPhongBan();
if ($cv=="dsPhongBan") {
	$ql -> dsPhongBan();
}
if ($cv =="xoaPhongBan") {
	$ql -> btnXoaPhongBan();
}
if ($cv =="themPhongBan") {
	include_once("../view/ThemPhongBan.php");
}
if ($cv == "btnThemPhongBan") {
   $ql ->btnThemPhongBan();
}
if ($cv == "capNhatPhongBan") {
   $ql ->capNhatPhongBan();
}
if ($cv=="btncapNhatPhongBan") {
	$ql->btncapNhatPhongBan();
}
 ?>