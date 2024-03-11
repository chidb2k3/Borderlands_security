<?php 
include_once("DB_driver.php");
class Luong{
	public $maLuong, $maCB, $thang, $nam, $luongCoBan, $tienThuong, $tienPhat, $heSoLuong, $tienLuong, $luongThucNhan;
	public function __construct($maCB, $thang, $nam, $luongCoBan, $tienThuong, $tienPhat, $heSoLuong, $tienLuong, $luongThucNhan){
		$this->maCB = $maCB;
		$this->thang = $thang;
		$this->nam = $nam;
		$this->luongCoBan = $luongCoBan;
		$this->tienThuong = $tienThuong;
		$this->tienPhat = $tienPhat;
		$this->heSoLuong = $heSoLuong;
		$this->tienLuong = $tienLuong;
		$this->luongThucNhan = $luongThucNhan;


	}
	
}

 ?>