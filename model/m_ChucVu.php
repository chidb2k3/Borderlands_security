<?php 
include_once("DB_driver.php");
include_once("ChucVu.php");
class m_ChucVu{
	public function __construct(){

	}
	public function dsChucVu(){
		$db = new DB_driver();
		$sql = "SELECT * from chucvu";
		return $db->get_list($sql);

	}
	public function dsTaiLieu(){
		$db = new DB_driver();
		$sql = "SELECT * from hoso";
		return $db->get_list($sql);

	}
	function tenChucVu($maCV){
		$db = new DB_driver();
		$sql = "SELECT * from chucvu where maCV = $maCV ";
	  
	   if ( $chucvu = $db->get_list($sql)) {
	   	return $chucvu[0]['tenCV'];
	   }
	   return "";
	   
	}
	function tenTaiLieu($maTaiLieu){
		$db = new DB_driver();
		$sql = "SELECT * from hoso where idLoaiHoSo = $maTaiLieu ";
	  
	   if ( $tailieu= $db->get_list($sql)) {
	   	return $tailieu[0]['tenLoaiHoSo'];
	   }
	   return "";
	   
	}
	function xoaChucVu($maCV){
		$db = new DB_driver();
		$db ->updatemaCV($maCV);
		$db->remove("chucvu", "maCV={$maCV}");
		
	}


}

?>
