<?php
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FETxDetailRequest extends FERequest{
	public $apiVersion;
	public $txId;

	/**
	 *  ********* DO NOT USE. THIS CLASS IS FOR INTERNAL PURPOSE. *****************
	 */
	public function __construct($credentials)
	{
		$this->mId = $credentials->getmId();
		$this->maId = $credentials->getMaId();
		$this->userName = $credentials->getUserName();
		$this->password = $credentials->getPassword();
	}

	public function paramsValueString()
	{
		$paramsValueString = !isset($this->requestTime)?"":trim($this->requestTime);
		$paramsValueString .= !isset($this->mId)?"":trim($this->mId);
		$paramsValueString .= !isset($this->maId)?"":trim($this->maId);
		$paramsValueString .= !isset($this->userName)?"":trim($this->userName);
		$paramsValueString .= !isset($this->password)?"":trim($this->password);
		$paramsValueString .= !isset($this->apiVersion)?"":trim($this->apiVersion);
		//$paramsValueString .= !isset($this->requestId)?"":trim($this->requestId);
		$paramsValueString .= !isset($this->txId)?"":trim($this->txId);
		return $paramsValueString;
	}

// 	public function getTxId() {
// 		return $this->txId;
// 	}

// 	public function setTxId($txId) {
// 		$this->txId = $txId;
// 	}



}
