<?php 
include_once("PhongBan.php");
include_once("DB_driver.php");
class m_PhongBan{
	public function __construct(){

	}
	public function dsPhongBan(){
		$db = new DB_driver();
		$sql = "SELECT * from phongban";
		return $db->get_list($sql);

	}
	function tenPhongBan($maPB){
		$db = new DB_driver();
		$sql = "SELECT * from phongban where maPB = $maPB ";
	  
	   if ( $phongban = $db->get_list($sql)) {
	   	return $phongban[0]['tenPB'];
	   }
	   return "";
	   
	}
	function phongBan($maPB){
		$db = new DB_driver();
		$sql = "SELECT * from phongban where maPB = $maPB";
		return $db->get_list($sql);
	}
	function xoaPhongBan($maPB){
		$db = new DB_driver();
		$db->updatemaPB($maPB);
		$db->remove("phongban", "maPB={$maPB}");
		
	}
}


 ?>