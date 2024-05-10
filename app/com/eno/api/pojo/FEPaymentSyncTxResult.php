<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEPaymentSyncTxResult extends FEPaymentTxResult {
	
	public $redirect3DUrl;//Gateway service url which redirect user to issuer for 3D authentication.

	public function __construct($responseTime=NULL,$txId=NULL,$txTypeId=NULL,$recurrentTypeId=NULL,$requestId=NULL,$orderId=NULL,
			$sourceAmount=NULL,$sourceCurrencyCode=NULL,$amount=NULL,$currencyCode=NULL,$resultCode=NULL,$message=NULL,
			$resultReasonCode=NULL,$ccNumber=NULL,$cardId=NULL,$signature=NULL,$errorDetails=NULL)//List<FEErrorDetail> 
	{
        //parent::__construct();
        
		$this->responseTime = $responseTime;
		$this->txId = $txId;
		$this->txTypeId = $txTypeId;
		$this->recurrentTypeId = $recurrentTypeId;
		$this->requestId = $requestId;
		$this->orderId = $orderId;
		$this->sourceAmount = new FEAmount($sourceAmount, $sourceCurrencyCode);
		$this->amount = new FEAmount($amount, $currencyCode);
		$this->result = new FEResult();
		$this->result->resultCode = $resultCode;
		$this->result->resultMessage = $message;
		$this->result->reasonCode = $resultReasonCode;
		$this->result->error = $errorDetails;
		$this->ccNumber = $ccNumber;
		$this->cardId = $cardId;
		$this->signature = $signature;
	}
	
// 	public function getRedirect3DUrl() {
// 		return $this->redirect3DUrl;
// 	}

//	public void setRedirect3DUrl(String redirect3DUrl) {
//		this.redirect3DUrl = redirect3DUrl;
//	}


	public function paramValueString()
	{
		$sb =  !isset($this->responseTime)?"": trim($this->responseTime);
		$sb .= !isset($this->txId)?"":trim($this->txId);
		$sb .= !isset($this->txTypeId)?"":trim($this->txTypeId);
		$sb .= !isset($this->recurrentTypeId)?"":trim($this->recurrentTypeId);
		$sb .= !isset($this->requestId)?"":trim($this->requestId);
		$sb .= !isset($this->orderId)?"":trim($this->orderId);
		$sb .= !isset($this->sourceAmount)?"":trim($this->sourceAmount->paramValueString());
		$sb .= !isset($this->amount)?"":trim($this->amount->paramValueString());
		$sb .= !isset($this->result)?"":trim($this->result->paramValueString());		
		$sb .= !isset($this->redirect3DUrl)?"":trim($this->redirect3DUrl);
		$sb .= !isset($this->ccNumber)?"":trim($this->ccNumber);
		$sb .= !isset($this->cardId)?"":trim($this->cardId);
		return $sb;
	}
	

}
