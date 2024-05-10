<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class CC extends POJOBase {

	public $cvv;
	public $expirationMonth;
	public $expirationYear;
	public $cardHolderName;
	public $ccNumber;

// 	public function  getCvv() {
// 		return $this->cvv;
// 	}

// 	public function setCvv($cvv) {
// 		$this->cvv = $cvv;
// 	}

// 	public function getExpirationMonth() {
// 		return $this->expirationMonth;
// 	}

// 	public function setExpirationMonth($expirationMonth) {
// 		$this->expirationMonth = $expirationMonth;
// 	}

// 	public function getExpirationYear() {
// 		return $this->expirationYear;
// 	}

// 	public function setExpirationYear($expirationYear) {
// 		$this->expirationYear = $expirationYear;
// 	}

// 	public function getCardHolderName() {
// 		return $this->cardHolderName;
// 	}

// 	public function setCardHolderName($cardHolderName) {
// 		$this->cardHolderName = $cardHolderName;
// 	}

// 	public function getCcNumber() {
// 		return $this->ccNumber;
// 	}

// 	public function setCcNumber($ccNumber) {
// 		$this->ccNumber = $ccNumber;
// 	}
	
	public function paramsValueString()
	{
		$paramsValueString = !isset($this->ccNumber) ? "": trim($this->ccNumber) ;
		$paramsValueString .= !isset($this->cardHolderName) ? "" : trim($this->cardHolderName);
		$paramsValueString .= !isset($this->cvv) ? "": trim($this->cvv);
		$paramsValueString .= !isset($this->expirationMonth) ? "": trim($this->expirationMonth);
		$paramsValueString .= !isset($this->expirationYear) ? "": trim($this->expirationYear);
		return $paramsValueString;
	}

}