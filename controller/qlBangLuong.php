
<?php 
session_start();
include_once("../model/m_CanBo.php");
include_once("../model/DB_driver.php");
class qlBangLuong{
	function m_CanBo(){
		return new m_CanBo();
	}
	function __construct(){

	}
	function dsBangLuong(){
		$bangluong = $this->m_CanBo()->dsBangLuong();
		include_once("../view/BangLuong.php");
	}
	function dsBangLuongYou(){
		$bangluong = $this->m_CanBo()->dsBangLuongYou($_SESSION['you']['maCB']);
		include_once("../view/BangLuong.php");
	}
	
    
}

$cv = "";
if (isset($_GET['cv'])) {
	$cv = $_GET['cv'];
}

$ql = new qlBangLuong();
if ($cv=="dsBangLuong") {
	$ql -> dsBangLuong();
}
if ($cv=="dsBangLuongYou") {
	$ql -> dsBangLuongYou();
}

 ?> 
 