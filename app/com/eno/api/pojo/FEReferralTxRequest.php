<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEReferralTxRequest extends FERequest {

	public $apiVersion;
	public $requestId;//unique transaction reference number, it should be unique per transaction per merchant account id.
	public $previousTxId;//ENO server transaction id.
	public $amount;//Not needed in case of reversal.
	public $recurrentType;//3. repeated.
	public $statement = NULL;//display on card holder statement used for recurrent,OCT etc.

	/**
	 *  ********* DO NOT USE. THIS CLASS IS FOR INTERNAL PURPOSE. *****************
	 */
	public function __construct($credentials)//Credentials
	{
		$this->mId = $credentials->getmId();
		$this->maId = $credentials->getMaId();
		$this->userName = $credentials->getUserName();
		$this->password = $credentials->getPassword();
	}

	
	public function paramsValueString()
	{
		$paramsValueString  =!isset($this->requestTime)?"":trim($this->requestTime);
		$paramsValueString .=!isset($this->mId)?"":trim($this->mId);
		$paramsValueString .=!isset($this->maId)?"":trim($this->maId);
		$paramsValueString .=!isset($this->userName)?"":trim($this->userName);
		$paramsValueString .=!isset($this->password)?"":trim($this->password);
		$paramsValueString .=!isset($this->apiVersion)?"":trim($this->apiVersion);
		$paramsValueString .=!isset($this->requestId)?"":trim($this->requestId);
		//$paramsValueString .=!isset($this->recurrentType)?"":trim($this->recurrentType);
		$paramsValueString .=!isset($this->previousTxId)?"":trim($this->previousTxId);
		$paramsValueString .=!isset($this->amount)?"":trim($this->amount);
		$paramsValueString .=!isset($this->statement)?"":trim($this->statement);
		return $paramsValueString;
	}
	
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
// 	public function getApiVersion() {
// 		return $this->apiVersion;
// 	}
// 	public function setApiVersion($apiVersion) {
// 		$this->apiVersion = $apiVersion;
// 	}

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
	



}
