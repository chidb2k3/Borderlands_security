<?php 
class HoSoCanBo{
	public $maHS, $maCB, $maCV, $maPB, $trinhDo, $ngayVao, $ngayRa, $lyDo;
	function __construct($maCV, $maPB, $trinhDo, $ngayVao, $ngayRa, $lyDo){
		
		$this->maCV = $maCV;
		$this->maPB = $maPB;
		$this->trinhDo= $trinhDo;
		$this->ngayVao = $ngayVao;
		$this->ngayRa = $ngayRa;
		$this->lyDo = $lyDo;
		
	}
}


 ?>