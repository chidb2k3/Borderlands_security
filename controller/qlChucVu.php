
<?php 
session_start();
include_once("../model/m_ChucVu.php");
include_once("../model/DB_driver.php");
class qlChucVu{
	function m_ChucVu(){
		return new m_ChucVu();
	}
	function __construct(){

	}
	function dsChucVu(){
		$dsChucVu = $this->m_ChucVu()->dsChucVu();
		include_once("../view/DsChucVu.php");
	}
	function capNhatChucVu(){
		$_SESSION['maCV']=$_GET['maCV'];
		$tenCV = $this->m_ChucVu()->tenChucVu($_GET['maCV']);
		include_once("../view/CapNhatChucVu.php");
	}
	function btnCapNhatChucVu(){
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$tenCV = $_GET['tenCV'];
			$maCV= $_SESSION['maCV'];
			unset($_SESSION['maCV']);
			$chucVu = new ChucVu($tenCV);
			$db = new DB_driver();
			$db -> updateChucVu($chucVu,$maCV);
		
			header("location: qlChucVu.php?cv=dsChucVu");

		}
	}

	function btnXoaChucVu(){
			$this->m_ChucVu() -> xoaChucVu($_GET['maCV']);
		$_SESSION['thongbao']="Xóa thành công";
		header("location: qlChucVu.php?cv=dsChucVu");
	}
	function btnThemChucVu(){
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$tenCV = $_GET['tenCV'];
			
			$chucVu = new ChucVu($tenCV);
			$db = new DB_driver();
			$db -> themChucVu($chucVu);
		
			header("location: qlChucVu.php?cv=dsChucVu");

		}
    }
}

$cv = "";
if (isset($_GET['cv'])) {
	$cv = $_GET['cv'];
}

$ql = new qlChucVu();
if ($cv=="dsChucVu") {
	$ql -> dsChucVu();
}
if ($cv =="xoaChucVu") {
	$ql -> btnXoaChucVu();
}
if ($cv =="themChucVu") {
	include_once("../view/ThemChucVu.php");
}
if ($cv == "btnThemChucVu") {
   $ql ->btnThemChucVu();
}
if ($cv == "capNhatChucVu") {
	$ql->capNhatChucVu();
}
if ($cv == "btncapNhatChucVu") {
	$ql->btncapNhatChucVu();
}
 ?> 
 