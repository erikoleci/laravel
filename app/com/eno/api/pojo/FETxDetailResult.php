<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FETxDetailResult extends FEResponse
{
	public $apiVersion = NULL;
	public $paymentGatwayId;
	public $txId;
	public $txTypeId;
	public $txType;
	public $recurrentTypeId;
	public $recurrentType;
	public $txResultId;
	public $txResult;
	public $createTime;
	public $finishTime;
	public $txSourceId;//1 for PAYMENT_PAGE 2 for SERVER	
	public $txSource;
	public $status3D;
	public $feeAmount;// FEAmount - charges applied on transaction 
	public $sourceAmount;//FEAmount - original request amount
	public $parentTxId;
	public $isMOTO;
	//Order data
	public $requestId;
	public $orderId;//unique per order per merchant
	public $orderDescription;//product service short information
	public $amount;//FEAmount - transaction amount
	public $cc;//FECC
	public $billingAddress;//TxAddress
	public $shippingAddress;//TxAddress
	public $personalAddress;//TxAddress
	public $cancelUrl;//User cancel transaction
	public $returnUrl;// return $this->payment response
	public $notificationUrl;//instant payment event notification post
	public $possibleTxTypeIds;//List<String>
	public $relatedTxList;//List<RelatedTxView> all(max 25) related transaction tree.
	public $errorDetail; //Ronak for transactionDetails screen
	public $riskFactorPercent; //BigDecimal value from maxmind fraud system
	
	public $remoteIP;
	public $acquirerTxId;
	public $merchantId;
	public $merchantAccountId;
	public $paymentMethod;
	public $authCode;
	public $avsResponseId;
	
	public function paramValueString()
	{
		$sb  = !isset($this->responseTime)?"": trim($this->responseTime);
		$sb .= !isset($this->txId)?"": trim($this->txId);
		$sb .= !isset($this->txTypeId)?"": trim($this->txTypeId);
		$sb .= !isset($this->txResultId)?"": trim($this->txResultId);
		$sb .= !isset($this->requestId)?"": trim($this->requestId);
		$sb .= !isset($this->orderId)?"": trim($this->orderId);
		$sb .= !isset($this->sourceAmount)?"": trim($this->sourceAmount->paramValueString());
		$sb .= !isset($this->amount)?"": trim($this->amount->paramValueString());
		$sb .= !isset($this->result)?"": trim($this->result->paramValueString());//request code
		return $sb;
	}
	
// 	public function getTxId() {
// 		return $this->txId;
// 	}
// 	public function setTxId($txId) {
// 		$this->txId = $txId;
// 	}

// 	public function getApiVersion() {
// 		return $this->apiVersion;
// 	}

// 	public function setApiVersion($apiVersion) {
// 		$this->apiVersion = $apiVersion;
// 	}

// 	public function getPaymentGatwayId() {
// 		return $this->paymentGatwayId;
// 	}

// 	public function setPaymentGatwayId($paymentGatwayId) {
// 		$this->paymentGatwayId = $paymentGatwayId;
// 	}

// 	public function getTxTypeId() {
// 		return $this->txTypeId;
// 	}

// 	public function setTxTypeId($txTypeId) {
// 		$this->txTypeId = $txTypeId;
// 	}

// 	public function getTxType() {
// 		return $this->txType;
// 	}

// 	public function setTxType($txType) {
// 		$this->txType = $txType;
// 	}

// 	public function getTxResultId() {
// 		return $this->txResultId;
// 	}

// 	public function setTxResultId($txResultId) {
// 		$this->txResultId = $txResultId;
// 	}

// 	public function getTxResult() {
// 		return $this->txResult;
// 	}

// 	public function setTxResult($txResult) {
// 		$this->txResult = $txResult;
// 	}

// 	public function getCreateTime() {
// 		return $this->createTime;
// 	}

// 	public function setCreateTime($createTime) {
// 		$this->createTime = $createTime;
// 	}

// 	public function getFinishTime() {
// 		return $this->finishTime;
// 	}

// 	public function setFinishTime($finishTime) {
// 		$this->finishTime = $finishTime;
// 	}

// 	public function getTxSourceId() {
// 		return $this->txSourceId;
// 	}

// 	public function setTxSourceId($txSourceId) {
// 		$this->txSourceId = $txSourceId;
// 	}

// 	public function getTxSource() {
// 		return $this->txSource;
// 	}

// 	public function setTxSource($txSource) {
// 		$this->txSource = $txSource;
// 	}

// 	public function getStatus3D() {
// 		return $this->status3D;
// 	}

// 	public function setStatus3D($status3D) {
// 		$this->status3D = $status3D;
// 	}

// 	public function getRequestId() {
// 		return $this->requestId;
// 	}

// 	public function setRequestId($requestId) {
// 		$this->requestId = $requestId;
// 	}

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

// 	public function getBillingAddress() {//TxAddress
// 		return $this->billingAddress;
// 	}

// 	public function setBillingAddress( $billingAddress) {//TxAddress
// 		$this->billingAddress = $billingAddress;
// 	}

// 	public function getShippingAddress() { //TxAddress
// 		return $this->shippingAddress;
// 	}

// 	public function setShippingAddress($shippingAddress) {//TxAddress
// 		$this->shippingAddress = $shippingAddress;
// 	}

// 	public function getPersonalAddress() {//TxAddress
// 		return $this->personalAddress;
// 	}

// 	public function setPersonalAddress($personalAddress) {//TxAddress
// 		$this->personalAddress = $personalAddress;
// 	}

// 	public function getCancelUrl() {
// 		return $this->cancelUrl;
// 	}

// 	public function setCancelUrl($cancelUrl) {
// 		$this->cancelUrl = $cancelUrl;
// 	}

// 	public function getReturnUrl() {
// 		return $this->returnUrl;
// 	}

// 	public function setReturnUrl($returnUrl) {
// 		$this->returnUrl = $returnUrl;
// 	}

// 	public function getNotificationUrl() {
// 		return $this->notificationUrl;
// 	}

// 	public function setNotificationUrl($notificationUrl) {
// 		$this->notificationUrl = $notificationUrl;
// 	}
// 	public function getErrorDetail() {
// 		return $this->errorDetail;
// 	}

// 	public function setErrorDetail($errorDetail) {
// 		$this->errorDetail = $errorDetail;
// 	}

// 	public function getFeeAmount() {//FEAmount
// 		return $this->feeAmount;
// 	}

// 	public function setFeeAmount($feeAmount) {//FEAmount
// 		$this->feeAmount = $feeAmount;
// 	}

// 	public function getParentTxId() {
// 		return $this->parentTxId;
// 	}

// 	public function setParentTxId($parentTxId) {
// 		$this->parentTxId = $parentTxId;
// 	}

// 	public function getAmount() {//FEAmount
// 		return $this->amount;
// 	}

// 	public function setAmount($txAmount) { //FEAmount
// 		$this->amount = $txAmount;
// 	}

// 	public function getRelatedTxList() {//List<RelatedTxView>
// 		return $this->relatedTxList;
// 	}

// 	public function setRelatedTxList($relatedTxList) {//List<RelatedTxView>
// 		$this->relatedTxList = $relatedTxList;
// 	}

// 	public function getPossibleTxTypeIds() {//List<String>
// 		return $this->possibleTxTypeIds;
// 	}

// 	public function setPossibleTxTypeIds( $possibleTxTypeIds) {//List<String>
// 		$this->possibleTxTypeIds = $possibleTxTypeIds;
// 	}

// 	public function getCc() {//FECC
// 		return $this->cc;
// 	}

// 	public function setCc($cc) {//FECC
// 		$this->cc = $cc;
// 	}

// 	public function  getSourceAmount() {//FEAmount
// 		return $this->sourceAmount;
// 	}

// 	public function setSourceAmount($sourceAmount) {//FEAmount
// 		$this->sourceAmount = $sourceAmount;
// 	}

// 	public function getRecurrentTypeId() {
// 		return $this->recurrentTypeId;
// 	}

// 	public function setRecurrentTypeId($recurrentTypeId) {
// 		$this->recurrentTypeId = $recurrentTypeId;
// 	}

// 	public function getRecurrentType() {
// 		return $this->recurrentType;
// 	}

// 	public function setRecurrentType($recurrentType) {
// 		$this->recurrentType = $recurrentType;
// 	}

// 	public function getIsMOTO() {
// 		return $this->isMOTO;
// 	}

// 	public function setIsMOTO($isMOTO) {//boolean
// 		$this->isMOTO = $isMOTO;
// 	}

// 	public function getRiskFactorPercent() { //BigDecimal
// 		return $this->riskFactorPercent;
// 	}

// 	public function setRiskFactorPercent($riskFactorPercent) {//BigDecimal
// 		$this->riskFactorPercent = $riskFactorPercent;
// 	}

// 	public function getRemoteIP() {
// 		return $this->remoteIP;
// 	}

// 	public function setRemoteIP($remoteIP) {
// 		$this->remoteIP = $remoteIP;
// 	}

// 	public function getAcquirerTxId() {
// 		return $this->acquirerTxId;
// 	}

// 	public function setAcquirerTxId($acquirerTxId) {
// 		$this->acquirerTxId = $acquirerTxId;
// 	}

// 	public function getMerchantId() {
// 		return $this->merchantId;
// 	}

// 	public function setMerchantId($merchantId) {
// 		$this->merchantId = $merchantId;
// 	}

// 	public function getMerchantAccountId() {
// 		return $this->merchantAccountId;
// 	}

// 	public function setMerchantAccountId($merchantAccountId) {
// 		$this->merchantAccountId = $merchantAccountId;
// 	}

// 	public function getPaymentMethod() {
// 		return $this->paymentMethod;
// 	}

// 	public function setPaymentMethod($paymentMethod) {
// 		$this->paymentMethod = $paymentMethod;
// 	}

// 	public function getAuthCode() {
// 		return $this->authCode;
// 	}

// 	public function setAuthCode($authCode) {
// 		$this->authCode = $authCode;
// 	}

// 	public function getAvsResponseId() {
// 		return $this->avsResponseId;
// 	}

// 	public function setAvsResponseId($avsResponseId) {
// 		$this->avsResponseId = $avsResponseId;
// 	}
	

}
