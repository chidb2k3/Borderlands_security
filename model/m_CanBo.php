<?php 
include_once("CanBo.php");
include_once("DB_driver.php");
class m_CanBo{
	
	public function __construct(){

	}
	function xoaFile($id){
		$db = new DB_driver();
		$db->remove("binhluan", "idFileHoSo={$id}");
		$db->remove("filehoso", "idFileHoSo={$id}");

	}
	
	function dsHoSo(){
		$db = new DB_driver();
		$sql = "SELECT * FROM filehoso";
		return $db->get_list($sql);
	}
	function pL($ma){
		$db = new DB_driver();
		$sql = "SELECT * FROM `filehoso` WHERE idLoaiHoSo = {$ma}";
		return $db->get_list($sql);
	}
	function pLL($ma,$tk){
		$db = new DB_driver();
		$sql = "SELECT * FROM `filehoso` WHERE idLoaiHoSo = {$ma}  AND tenFileHoSo LIKE '%{$tk}%'";
		return $db->get_list($sql);
	}
	function TaiLieu($ma){
		$db = new DB_driver();
		$sql = "SELECT * FROM `tailieu_loai` WHERE maHS = {$ma}";
		return $db->get_list($sql);
	}
	function dsCanBo(){
		// return array(
		// 	"1"=> new CanBo(1,"Chí","28/03/2003","Nam","VN",113,"dangbachi345@gmail.com"),
		// 	"2"=> new CanBo(2,"Phương","28/03/2003","Nam","VN",113,"dangbachi345@gmail.com"),
		// 	"3"=> new CanBo(3,"Đạt","28/03/2003","Nam","VN",113,"dangbachi345@gmail.com")
		// );
		$db = new DB_driver();
		$sql = "SELECT * FROM canbo";
		return $db->get_list($sql);
	}
	function dsCanBoTimKiem($tk){
		// return array(
		// 	"1"=> new CanBo(1,"Chí","28/03/2003","Nam","VN",113,"dangbachi345@gmail.com"),
		// 	"2"=> new CanBo(2,"Phương","28/03/2003","Nam","VN",113,"dangbachi345@gmail.com"),
		// 	"3"=> new CanBo(3,"Đạt","28/03/2003","Nam","VN",113,"dangbachi345@gmail.com")
		// );
		$db = new DB_driver();
		$sql = "SELECT * FROM canbo where hoTen LIKE '%{$tk}%'";
		return $db->get_list($sql);
	}
	function checkIn($username, $password){
        $db = new DB_driver();
        $sql = "SELECT * FROM `canbo` WHERE username = '$username' && password ='$password'";
        $canBo = $db->get_list($sql);
        if (sizeof($canBo) != 0 ) {
        	$_SESSION['maCB']=$canBo[0]['maCB'];
        	$_SESSION['hoTen']=$canBo[0]['hoTen'];
        	$_SESSION['you'] = $canBo[0];
        	return $canBo[0]['role'];
        }else{
        	return 2;
        }
	}
	function dsBangLuong(){
		$db = new DB_driver();
		$sql = "SELECT * FROM bangluong";
		return $db->get_list($sql);
	}
	function dsBangLuongYou($maCB){
		$db = new DB_driver();
		$sql = "SELECT * FROM bangluong where maCB = {$maCB}";
		return $db->get_list($sql);
	}
	function chiTietCanBo($maCB){
		$db = new DB_driver();
		$sql = "SELECT * FROM canbo where maCB = $maCB";
		return $db->get_list($sql);

	}
	function luongCanBo($maCB){
		$db = new DB_driver();
		$sql = "SELECT * FROM bangluong where maCB = $maCB";
		return $db->get_list($sql);
	}

	function HoSoCanBo($maCB){
		$db = new DB_driver();
		$sql = "SELECT * FROM hosocanbo where maCB = $maCB";
		return $db->get_list($sql);

	}
	function you($maCB){
		$db = new DB_driver();
		$sql = "SELECT * FROM `canbo`, `hosocanbo` WHERE canbo.maCB = hosocanbo.maCB AND canbo.maCB = $maCB";
		return $db->get_list($sql);

	}
	function xoaCanBo($maCB){
		$db = new DB_driver();
		$db->delBinhLuan($maCB);
		$db->delBangLuong($maCB);
		$db->delHoSo($maCB);
		$db->remove("canbo", "maCB={$maCB}");
		
	}
}
// $test = new m_CanBo();
// $test -> xoaCanBo(2);
;
// print($a);


 ?>