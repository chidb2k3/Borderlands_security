<?php 
class CanBo{
	public $maCB, $hoTen, $ngaySinh, $gioiTinh, $diaChi, $soDT, $email,$username,$password,$role;
	
	public function __construct($hoTen, $ngaySinh, $gioiTinh, $diaChi, $soDT, $email,$username,$password,$role){
		$this->hoTen = $hoTen;
		$this->ngaySinh = $ngaySinh;
		$this->gioiTinh = $gioiTinh;
		$this->diaChi = $diaChi;
		$this->soDT = $soDT;
		$this->email = $email;
		$this->username=$username;
		$this->password=$password;
		$this->role=$role;
	}
	
}

 ?>