<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEAmount extends POJOBase
{
	public $amount;
	public $currencyCode;//Alpha-3 currency code per ISO 4217.
	
	public function __construct($amount=NULL,$currencyCode=NULL)
	{
		$this->amount = $amount;
		$this->currencyCode = $currencyCode;
	}
	
// 	public function getAmount() {
// 		return $this->amount;
// 	}
// 	public function setAmount($amount) {
// 		$this->amount = $amount;
// 	}
// 	public function getCurrencyCode() {
// 		return $this->currencyCode;
// 	}
// 	public function setCurrencyCode($currencyCode) {
// 		$this->currencyCode = $currencyCode;
// 	}
	
	public function paramValueString()
	{
		$sb = !isset($this->amount) ? "" : trim($this->amount);
		$sb .= !isset($this->currencyCode) ? "": trim($this->currencyCode);
		return $sb;
	}

}
