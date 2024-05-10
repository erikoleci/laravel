<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class GetTransactionsRequest extends POJOBase{

	public $txId;
	public $txTypeId;
	public $txResultId;
	public $requestId;
	public $orderId;
	public $startTime;
	public $endTime;
	public $cardTypeId;
	public $currencyCode;
	public $minAmount;
	public $maxAmount;

	public $merchantUserId;
	public $remoteIP; 
	public $ccNumber;
	public $cardHolderName;
	
	public $pagination;//FEPagination
	
// 	public function getOrderId() {
// 		return $this->orderId;
// 	}
// 	public function setOrderId($orderId) {
// 		$this->orderId = $orderId;
// 	}
// 	public function getTxTypeId() {
// 		return $this->txTypeId;
// 	}
// 	public function setTxTypeId($txTypeId) {
// 		$this->txTypeId = $txTypeId;
// 	}
// 	public function getTxId() {
// 		return $this->txId;
// 	}
// 	public function setTxId($txId) {
// 		$this->txId = $txId;
// 	}
// 	public function getTxResultId() {
// 		return $this->txResultId;
// 	}
// 	public function setTxResultId($txResultId) {
// 		$this->txResultId = $txResultId;
// 	}
// 	public function getRequestId() {
// 		return $this->requestId;
// 	}
// 	public function setRequestId($requestId) {
// 		$this->requestId = $requestId;
// 	}
// 	public function getStartTime() {
// 		return $this->startTime;
// 	}
// 	public function setStartTime($startTime) {
// 		$this->startTime = $startTime;
// 	}
// 	public function getEndTime() {
// 		return $this->endTime;
// 	}
// 	public function setEndTime($endTime) {
// 		$this->endTime = $endTime;
// 	}
// 	public function getCardTypeId() {
// 		return $this->cardTypeId;
// 	}
// 	public function setCardTypeId($cardTypeId) {
// 		$this->cardTypeId = $cardTypeId;
// 	}
// 	public function getCurrencyCode() {
// 		return $this->currencyCode;
// 	}
// 	public function setCurrencyCode($currencyCode) {
// 		$this->currencyCode = $currencyCode;
// 	}
// 	public function getMinAmount() {
// 		return $this->minAmount;
// 	}
// 	public function setMinAmount($minAmount) {
// 		$this->minAmount = $minAmount;
// 	}
// 	public function getMaxAmount() {
// 		return $this->maxAmount;
// 	}
// 	public function setMaxAmount($maxAmount) {
// 		$this->maxAmount = $maxAmount;
// 	}
// 	public function getPagination() {//FEPagination
// 		return $this->pagination;
// 	}
// 	public function setPagination($pagination) {//FEPagination
// 		$this->pagination = $pagination;
// 	}
// 	public function getCcNumber() {
// 		return $this->ccNumber;
// 	}
// 	public function setCcNumber($ccNumber) {
// 		$this->ccNumber = $ccNumber;
// 	}
// 	public function getCardHolderName() {
// 		return $this->cardHolderName;
// 	}
// 	public function setCardHolderName($cardHolderName) {
// 		$this->cardHolderName = $cardHolderName;
// 	}
// 	public function getMerchantUserId() {
// 		return $this->merchantUserId;
// 	}
// 	public function setMerchantUserId($merchantUserId) {
// 		$this->merchantUserId = $merchantUserId;
// 	}
	
// 	public function getRemoteIP() {
// 		return $this->remoteIP;
// 	}
// 	public function setRemoteIP($remoteIP) {
// 		$this->remoteIP = $remoteIP;
// 	}
	
	
	 
 
}
