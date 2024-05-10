<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEPaymentTxRequest extends FERequest{
	
	public $txDetails;//FETransactionInfo

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
	
// 	public function getTxDetails() { //FETransactionInfo
// 		return $this->txDetails;
// 	}

// 	public function setTxDetails($txDetails) { //FETransactionInfo
// 		$this->txDetails = $txDetails;
// 	}

    public function paramsValueString()
    {
     	$paramsValueString  = !isset($this->requestTime)?"": trim($this->requestTime);
		$paramsValueString .=!isset($this->mId)?"":trim($this->mId);
		$paramsValueString .=!isset($this->maId)?"":trim($this->maId);
		$paramsValueString .=!isset($this->userName)?"":trim($this->userName);
		$paramsValueString .=!isset($this->password)?"":trim($this->password);
		$paramsValueString .=!isset($this->txDetails)?"":trim($this->txDetails->paramsValueString());
		return $paramsValueString;
    }
	
	
}
