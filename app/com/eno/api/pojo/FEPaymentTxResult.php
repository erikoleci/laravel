<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEPaymentTxResult extends FEResponse {

	public $txId;
	public $txTypeId;
	public $txType;
	public $recurrentTypeId;
	public $requestId;
	public $orderId;
	public $sourceAmount;// FEAmount - original request amount with currency.
	public $amount;//processed transaction amount with currency.
	public $returnUrl;//only for web transaction.
	//public $failUrl;
	public $ccNumber;//masked cc number.
	public $cardId;
	
// 	public function getOrderId() {
// 		return $this->orderId;
// 	}
// //	public void setOrderId(String orderId) {
// //		this.orderId = orderId;
// //	}
// 	public function getRequestId() {
// 		return $this->requestId;
// 	}
// //	public void setRequestId(String requestId) {
// //		this.requestId = requestId;
// //	}

// 	public function getTxId() {
// 		return $this->txId;
// 	}
// //	public void setTxId(String txId) {
// //		this.txId = txId;
// //	}
	
// 	public function getTxTypeId()
// 	{
// 		return $this->txTypeId;
// 	}
// //	public void setTxTypeId(String txTypeId)
// //	{
// //		this.txTypeId = txTypeId;
// //	}
	
// 	public function getAmount() {//FEAmount
// 		return $this->amount;
// 	}

// 	public function getSourceAmount() { //FEAmount
// 		return $this->sourceAmount;
// 	}

// //	public void setAmount(FEAmount amount) {
// //		this.amount = amount;
// //	}
// //
// //	public void setSourceAmount(FEAmount sourceAmount) {
// //		this.sourceAmount = sourceAmount;
// //	}

// 	public function getReturnUrl() {
// 		return $this->returnUrl;
// 	}

// //	public void setReturnUrl(String returnUrl) {
// //		this.returnUrl = returnUrl;
// //	}

// 	public function getTxType() {
// 		return $this->txType;
// 	}

// //	public void setTxType(String txType) {
// //		this.txType = txType;
// //	}

// 	public function getRecurrentTypeId() {
// 		return $this->recurrentTypeId;
// 	}

// //	public void setRecurrentTypeId(String recurrentTypeId) {
// //		this.recurrentTypeId = recurrentTypeId;
// //	}

// 	public function getCcNumber() {
// 		return $this->ccNumber;
// 	}

// //	public void setCcNumber(String ccNumber) {
// //		this.ccNumber = ccNumber;
// //	}

// 	public function getCardId() {
// 		return $this->cardId;
// 	}

// //	public void setCardId(String cardId) {
// //		this.cardId = cardId;
// //	}
	
// //	public function paramValueString()
// //	{
// //		StringBuffer sb = new StringBuffer();
// //		sb.append((responseTime==null)?"":responseTime.trim());
// //		sb.append((txId==null)?"":txId.trim());
// //		sb.append((txTypeId==null)?"":txTypeId.trim());
// //		sb.append((requestId==null)?"":requestId.trim());
// //		sb.append((orderId==null)?"":orderId.trim());
// //		sb.append((sourceAmount==null)?"":sourceAmount.paramValueString());
// //		sb.append((amount==null)?"":amount.paramValueString());
// //		sb.append((result==null)?"":result.paramValueString());
// //		return $this->sb.toString();
// //	}



}
