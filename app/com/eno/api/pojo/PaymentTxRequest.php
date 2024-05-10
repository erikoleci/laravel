<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class PaymentTxRequest extends POJOBase{
	
	public $requestTime = null;
	public $remoteIP = null;
	public $paymentMode = null;
	public $lang;//ISO 639-1
	public $txDetails;//Class-FETransactionInfo

// 	public function getTxDetails() {//FETransactionInfo
// 		return $this->txDetails;
// 	}

// 	public function setTxDetails( $txDetails) {//FETransactionInfo
// 		$this->txDetails = $txDetails;
// 	}

// 	public function getRequestTime() {
// 		return $this->requestTime;
// 	}

// 	public function setRequestTime($requestTime) {
// 		$this->requestTime = $requestTime;
// 	}

// 	public function getLang() {
// 		return $this->lang;
// 	}

// 	public function setLang($lang) {
// 		$this->lang = $lang;
// 	}
}
