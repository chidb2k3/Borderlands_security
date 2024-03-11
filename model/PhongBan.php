<?php 
class PhongBan{
	public $maPB, $tenPB, $diaChi, $sDT, $email;
	public function __construct($tenPB,$diaChi,$sDT,$email){
		
		$this->tenPB = $tenPB;
		$this->diaChi = $diaChi;
		$this->sDT = $sDT;
		$this->email = $email;
	}
}


 ?>