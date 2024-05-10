<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEReferralTxResult extends FEPaymentTxResult {

	public $previousTxId;
	
	public function paramValueString()
	{
		$sb  = !isset($this->responseTime)?"":trim($this->responseTime);
		$sb .= !isset($this->txId)?"":trim($this->txId);
		$sb .= !isset($this->txTypeId)?"":trim($this->txTypeId);
		$sb .= !isset($this->recurrentTypeId)?"":trim($this->recurrentTypeId);
		$sb .= !isset($this->requestId)?"":trim($this->requestId);
		$sb .= !isset($this->orderId)?"":trim($this->orderId);
		$sb .= !isset($this->sourceAmount)?"":trim($this->sourceAmount->paramValueString());
		$sb .= !isset($this->amount)?"":trim($this->amount->paramValueString());
		$sb .= !isset($this->result)?"":trim($this->result->paramValueString());
		$sb .= !isset($this->ccNumber)?"":trim($this->ccNumber);
		$sb .= !isset($this->cardId)?"":trim($this->cardId);
		$sb .= !isset($this->previousTxId)?"":trim($this->previousTxId);
		return $sb;
	}
	
// 	public function getPreviousTxId() {
// 		return $this->previousTxId;
// 	}

// //	public void setPreviousTxId(String previousTxId) {
// //		this.previousTxId = previousTxId;
// //	}
	

	
}
