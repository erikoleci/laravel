<?php 

namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class ReferralTxRequest extends POJOBase {

	public $requestTime = NULL;
	public $requestId;//unique transaction reference number, it should be unique per transaction per merchant account id.
	public $previousTxId;//ENO server transaction id.
	public $amount;//Not needed in case of reversal.
	public $recurrentType;//3. repeated.
	public $statement = NULL;//display on card holder statement used for recurrent,OCT etc.

// 	public function getRequestId() {
// 		return $this->requestId;
// 	}
// 	public function setRequestId($requestId) {
// 		$this->requestId = $requestId;
// 	}
// 	public function getAmount() {
// 		return $this->amount;
// 	}
// 	public function setAmount($amount) {
// 		$this->amount = $amount;
// 	}
// 	public function getPreviousTxId() {
// 		return $this->previousTxId;
// 	}
// 	public function setPreviousTxId($previousTxId) {
// 		$this->previousTxId = $previousTxId;
// 	}
// //	public function getApiVersion() {
// //		return $this->apiVersion;
// //	}
// //	public function setApiVersion($apiVersion) {
// //		$this->apiVersion = $apiVersion;
// //	}

// 	public function getRecurrentType() {
// 		return $this->recurrentType;
// 	}
// 	public function setRecurrentType($recurrentType) {
// 		$this->recurrentType = $recurrentType;
// 	}
// 	public function getStatement() {
// 		return $this->statement;
// 	}
// 	public function setStatement($statement) {
// 		$this->statement = $statement;
// 	}
// 	public function getRequestTime() {
// 		return $this->requestTime;
// 	}
// 	public function setRequestTime($requestTime) {
// 		$this->requestTime = $requestTime;
// 	}

}
