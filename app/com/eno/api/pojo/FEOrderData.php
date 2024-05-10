<?php
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEOrderData extends POJOBase{

	public $orderId = NULL;//unique per order per merchant
	public $orderDescription = NULL;//product service short information
	public $amount = NULL;
	public $currencyCode = NULL;//Alpha-3 currency code per ISO 4217.
	public $cc = NULL; //CC
	public $cardId = NULL;//Stored cc identifier
	public $billingAddress = NULL;//TxAddress
	public $shippingAddress = NULL;
	public $personalAddress = NULL;
    public $orderDetail = NULL;//TxOrder

	public function paramsValueString()
	{
		$paramsValue = '';
		$paramsValue .= !isset($this->orderId)?"": trim($this->orderId);
		$paramsValue .= !isset($this->orderDescription)?"": trim($this->orderDescription);
		$paramsValue .= !isset($this->amount)?"": trim($this->amount);
		$paramsValue .= !isset($this->currencyCode)?"":trim($this->currencyCode);
		$paramsValue .= !isset($this->cc)?"":$this->cc->paramsValueString();
		$paramsValue .= !isset($this->cardId)?"": trim($this->cardId);
		$paramsValue .= !isset($this->billingAddress)?"":$this->billingAddress->paramsValueString();
		$paramsValue .= !isset($this->shippingAddress)?"":$this->shippingAddress->paramsValueString();
		$paramsValue .= !isset($this->personalAddress)?"":$this->personalAddress->paramsValueString();
		return $paramsValue;
	}

// 	public function getOrderId() {
// 		return $this->orderId;
// 	}
// 	public function setOrderId($orderId) {
// 		$this->orderId = $orderId;
// 	}

// 	public function getOrderDescription() {
// 		return $this->orderDescription;
// 	}
// 	public function setOrderDescription($orderDescription) {
// 		$this->orderDescription = $orderDescription;
// 	}

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
// 		$this->currencyCode =$currencyCode;
// 	}
// 	public function getCc() {
// 		return $this->cc;
// 	}
// 	public function setCc($cc) {
// 		$this->cc = $cc;
// 	}
// 	public function getBillingAddress() {
// 		return $this->billingAddress;
// 	}
// 	public function setBillingAddress($billingAddress) {
// 		$this->billingAddress = $billingAddress;
// 	}
// 	public function getShippingAddress() {
// 		return $this->shippingAddress;
// 	}
// 	public function setShippingAddress($shippingAddress) {
// 		$this->shippingAddress = $shippingAddress;
// 	}
// 	public function getPersonalAddress() {
// 		return $this->personalAddress;
// 	}
// 	public function setPersonalAddress($personalAddress) {
// 		$this->personalAddress = $personalAddress;
// 	}
// 	public function getCardId() {
// 		return $this->cardId;
// 	}
// 	public function setCardId($cardId) {
// 		$this->cardId = $cardId;
// 	}



}
