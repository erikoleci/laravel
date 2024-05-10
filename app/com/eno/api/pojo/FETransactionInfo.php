<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FETransactionInfo extends POJOBase {

	public $apiVersion = NULL;
	public $requestId = NULL;//unique transaction reference number, it should be	unique per transaction per merchant account.
	//public $txSource = NULL;//1 for PAYMENT_PAGE 2 for SERVER
	public $recurrentType = NULL;//1. single(can not perform recurrent) 2. initial 3. repeated.
	public $perform3DS = NULL;//1. Enable(yes) 0.Disable(no). If not sent then getting value for merchant account.
    public $isMOTO = NULL;
	public $orderData = NULL;//FEOrderData
	public $statement = NULL;//display on card holder statment
	public $cancelUrl = NULL;//User cancel transaction
	public $returnUrl = NULL;// return $this->payment response
	public $notificationUrl;//instant payment event notification post
	
	public function paramsValueString()
	{
		$paramsValueString = !isset($this->apiVersion)?"":trim($this->apiVersion);
		$paramsValueString .= !isset($this->requestId)?"":trim($this->requestId);
		//$paramsValueString .= !isset($this->txSource)?"":trim($this->txSource);
		$paramsValueString .= !isset($this->recurrentType)?"":trim($this->recurrentType);
		$paramsValueString .= !isset($this->isMOTO)?"":trim($this->isMOTO);
		$paramsValueString .= !isset($this->perform3DS)?"":trim($this->perform3DS);
		$paramsValueString .= !isset($this->orderData)?"":trim($this->orderData->paramsValueString());
		$paramsValueString .= !isset($this->statement)?"":trim($this->statement);
		$paramsValueString .= !isset($this->cancelUrl)?"":trim($this->cancelUrl);
		$paramsValueString .= !isset($this->returnUrl)?"":trim($this->returnUrl);
		$paramsValueString .= !isset($this->notificationUrl)?"":trim($this->notificationUrl);
		return $paramsValueString;
	}
	
// 	public function getIsMOTO() {
// 		return $this->isMOTO;
// 	}
// 	public function setIsMOTO($isMOTO) {
// 		$this->isMOTO = $isMOTO;
// 	}
// 	public function getApiVersion() {
		 
// 		return $this->apiVersion;
// 	}
// 	public function setApiVersion($apiVersion) {
// 		$this->apiVersion = $apiVersion;
// 	}
	
// 	public function getRequestId() {
// 		return $this->requestId;
// 	}
// 	public function setRequestId($requestId) {
// 		$this->requestId = $requestId;
// 	}
// //	public function getTxSource() {
// //		return $this->txSource;
// //	}
// //	public function setTxSource($txSource) {
// //		$this->txSource = txSource;
// //	}
	
// 	public function getOrderData() {//FEOrderData
// 		return $this->orderData;
// 	}
// 	public function setOrderData($orderData) {//FEOrderData
// 		$this->orderData = $orderData;
// 	}
// 	public function getStatement() {
// 		return $this->statement;
// 	}
// 	public function setStatement($statement) {
// 		$this->statement = $statement;
// 	}
// 	public function getReturnUrl() {
// 		return $this->returnUrl;
// 	}
// 	public function setReturnUrl($returnUrl) {
// 		$this->returnUrl = $returnUrl;
// 	}
// 	public function getCancelUrl() {
// 		return $this->cancelUrl;
// 	}
// 	public function setCancelUrl($cancelUrl) {
// 		$this->cancelUrl = $cancelUrl;
// 	}
	
// 	public function getNotificationUrl() {
// 		return $this->notificationUrl;
// 	}
// 	public function setNotificationUrl($notificationUrl) {
// 		$this->notificationUrl = $notificationUrl;
// 	}
	
// 	public function getRecurrentType() {
// 		return $this->recurrentType;
// 	}
// 	public function setRecurrentType($recurrentType) {
// 		$this->recurrentType = $recurrentType;
// 	}
// 	public function getPerform3DS() {
// 		return $this->perform3DS;
// 	}
// 	public function setPerform3DS($perform3ds) {
// 		$this->perform3DS = $perform3ds;
// 	}
	

}
