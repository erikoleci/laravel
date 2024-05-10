<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEResult extends POJOBase{

	public $resultCode;
	public $resultMessage;
	public $errorId;
	public $error;//List<FEErrorDetail> 
	public $reasonCode;//Exact reason of transaction.
	
	public function paramValueString()
	{
		$sb = !isset($this->resultCode)?"": trim($this->resultCode);
		$sb .= !isset($this->reasonCode)?"": trim($this->reasonCode);
		return $sb;
	}
	
// 	public function getResultCode() {
// 		return $this->resultCode;
// 	}

// 	public function setResultCode($resultCode) {
// 		$this->resultCode = $resultCode;
// 	}

// 	public function getResultMessage() {
// 		return $this->resultMessage;
// 	}

// 	public function setResultMessage($resultMessage) {
// 		$this->resultMessage = $resultMessage;
// 	}

// 	public function getError() { //List<FEErrorDetail>
// 		return $this->error;
// 	}

// 	public function setError($error) {//List<FEErrorDetail> 
// 		$this->error = $error;
// 	}

// 	public function getErrorId() {
// 		return $this->errorId;
// 	}

// 	public function setErrorId($errorId) {
// 		$this->errorId = $errorId;
// 	}

// 	public function getReasonCode() {
// 		return $this->reasonCode;
// 	}

// 	public function setReasonCode($reasonCode) {
// 		$this->reasonCode = $reasonCode;
// 	}


	
}
