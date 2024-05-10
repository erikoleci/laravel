<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class MerchantTxView extends POJOBase{

	public $id;
	public $cardType;
	public $cardTypeId;
	public $ccNumber;
	public $cardHolderName;
	public $expirationYear;
	public $expirationMonth;
	
	public $orderId;
	public $parentTxId;
	public $requestId;
	
	public $txResult;
	public $txResultId;
	public $txType;
	public $txTypeId;
	public $recurrentType;
    public $recurrentTypeId;
    public $isMOTO; //boolean
    public $merchantUserId; 
    public $remoteIP; 

	public $amount;//FEAmount
	public $sourceAmount;//FEAmount
	public $requestTime;
	public $createTime;
	public $finishTime;

    //public $acquirerName;
    public $billingFirstname;
    public $billingLastname;
    public $billingAddress1;
    public $billingAddress2;
    public $billingCity;
    public $billingZipcode;
    public $billingStatecode;
    public $billingCountrycode;
    public $billingMobile;
    public $billingPhone;
    public $billingEmail;
    public $remoteIpCountrycode;
    public $remoteIpCity;
    
	public $remoteIpCountry;
    public $bankCountryCode;
    public $bankName;

    //public $modificationReason;
    public $cbCategoryId;
    public $cbReasonDescId;
    public $cbReasonCode;
    public $cbReasonDesc;
    //public $cvvRespId;
    //public $avsRespId;
    public $avsStatus;
    public $cvvStatus;
    public $isCascaded;//boolean
    public $ccBin;
    public $txResultReasonId;
	public $status3D;
	public $status3DId;
    public $authCode;
    public $bankCountryName;
    //public $acquirerId;
	public $merchantReturnUrl;

	
    public $shippingFirstname;
    public $shippingLastname;
    public $shippingAddress1;
    public $shippingAddress2;
    public $shippingCity;
    public $shippingZipcode;
    public $shippingStatecode;
    public $shippingCountrycode;
    public $shippingMobile;
    public $shippingPhone;
    public $shippingEmail;

    public $txResultReasonDesc;
	public $riskFactorPercent; //BigDecimal
    
//     public function getExpirationYear() {
// 		return $this->expirationYear;
// 	}
// 	public function setExpirationYear($expirationYear) {
// 		$this->expirationYear = $expirationYear;
// 	}
// 	public function getExpirationMonth() {
// 		return $this->expirationMonth;
// 	}
// 	public function setExpirationMonth($expirationMonth) {
// 		$this->expirationMonth = $expirationMonth;
// 	}
// 	public function getMerchantReturnUrl() {
// 		return $this->merchantReturnUrl;
// 	}
// 	public function setMerchantReturnUrl($merchantReturnUrl) {
// 		$this->merchantReturnUrl = $merchantReturnUrl;
// 	}
	
// 	public function getCardTypeId() {
// 		return $this->cardTypeId;
// 	}

// 	public function setCardTypeId($cardTypeId) {
// 		$this->cardTypeId = $cardTypeId;
// 	}

// 	public function getId() {
// 		return $this->id;
// 	}

// 	public function setId($id) {
// 		$this->id = $id;
// 	}

// 	public function getOrderId() {
// 		return $this->orderId;
// 	}

// 	public function setOrderId($orderId) {
// 		$this->orderId = $orderId;
// 	}

// 	public function getParentTxId() {
// 		return $this->parentTxId;
// 	}

// 	public function setParentTxId($parentTxId) {
// 		$this->parentTxId = $parentTxId;
// 	}

// 	public function getRequestId() {
// 		return $this->requestId;
// 	}

// 	public function setRequestId($requestId) {
// 		$this->requestId = $requestId;
// 	}

// 	public function getTxResult() {
// 		return $this->txResult;
// 	}

// 	public function setTxResult($txResult) {
// 		$this->txResult = $txResult;
// 	}

// 	public function getTxResultId() {
// 		return $this->txResultId;
// 	}

// 	public function setTxResultId($txResultId) {
// 		$this->txResultId = $txResultId;
// 	}

// 	public function getTxType() {
// 		return $this->txType;
// 	}

// 	public function setTxType($txType) {
// 		$this->txType = $txType;
// 	}

// 	public function getTxTypeId() {
// 		return $this->txTypeId;
// 	}

// 	public function setTxTypeId($txTypeId) {
// 		$this->txTypeId = $txTypeId;
// 	}

// 	public function getAmount() {//FEAmount
// 		return $this->amount;
// 	}

// 	public function setAmount($txAmount) {//FEAmount
// 		$this->amount = $txAmount;
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

// 	public function getRequestTime() {
// 		return $this->requestTime;
// 	}

// 	public function setRequestTime($requestTime) {
// 		$this->requestTime = requestTime;
// 	}

// 	public function getCcNumber() {
// 		return $this->ccNumber;
// 	}

// 	public function setCcNumber($ccNumber) {
// 		$this->ccNumber = $ccNumber;
// 	}

// 	public function getCardType() {
// 		return $this->cardType;
// 	}

// 	public function setCardType($cardType) {
// 		$this->cardType = $cardType;
// 	}

// 	public function getSourceAmount() {//FEAmount
// 		return $this->sourceAmount;
// 	}

// 	public function setSourceAmount($sourceAmount) {//FEAmount
// 		$this->sourceAmount = $sourceAmount;
// 	}

// 	public function getCardHolderName() {
// 		return $this->cardHolderName;
// 	}

// 	public function setCardHolderName($cardHolderName) {
// 		$this->cardHolderName = $cardHolderName;
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

// 	public function getIsMOTO() {//boolean
// 		return $this->isMOTO;
// 	}

// 	public function setIsMOTO($isMOTO) {//boolean
// 		$this->isMOTO = $isMOTO;
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

// //	public function getAcquirerName() {
// //		return $this->acquirerName;
// //	}
// //	public function setAcquirerName($acquirerName) {
// //		$this->acquirerName = acquirerName;
// //	}
// 	public function getBillingFirstname() {
// 		return $this->billingFirstname;
// 	}
// 	public function setBillingFirstname($billingFirstname) {
// 		$this->billingFirstname = $billingFirstname;
// 	}
// 	public function getBillingLastname() {
// 		return $this->billingLastname;
// 	}
// 	public function setBillingLastname($billingLastname) {
// 		$this->billingLastname = $billingLastname;
// 	}
// 	public function getBillingAddress1() {
// 		return $this->billingAddress1;
// 	}
// 	public function setBillingAddress1($billingAddress1) {
// 		$this->billingAddress1 = $billingAddress1;
// 	}
// 	public function getBillingAddress2() {
// 		return $this->billingAddress2;
// 	}
// 	public function setBillingAddress2($billingAddress2) {
// 		$this->billingAddress2 = $billingAddress2;
// 	}
// 	public function getBillingCity() {
// 		return $this->billingCity;
// 	}
// 	public function setBillingCity($billingCity) {
// 		$this->billingCity = $billingCity;
// 	}
// 	public function getBillingZipcode() {
// 		return $this->billingZipcode;
// 	}
// 	public function setBillingZipcode($billingZipcode) {
// 		$this->billingZipcode = $billingZipcode;
// 	}
// 	public function getBillingStatecode() {
// 		return $this->billingStatecode;
// 	}
// 	public function setBillingStatecode($billingStatecode) {
// 		$this->billingStatecode = $billingStatecode;
// 	}
// 	public function getBillingCountrycode() {
// 		return $this->billingCountrycode;
// 	}
// 	public function setBillingCountrycode($billingCountrycode) {
// 		$this->billingCountrycode = $billingCountrycode;
// 	}
// 	public function getBillingMobile() {
// 		return $this->billingMobile;
// 	}
// 	public function setBillingMobile($billingMobile) {
// 		$this->billingMobile = $billingMobile;
// 	}
// 	public function getBillingPhone() {
// 		return $this->billingPhone;
// 	}
// 	public function setBillingPhone($billingPhone) {
// 		$this->billingPhone = $billingPhone;
// 	}
// 	public function getBillingEmail() {
// 		return $this->billingEmail;
// 	}
// 	public function setBillingEmail($billingEmail) {
// 		$this->billingEmail = $billingEmail;
// 	}
// 	public function getRemoteIpCountrycode() {
// 		return $this->remoteIpCountrycode;
// 	}
// 	public function setRemoteIpCountrycode($remoteIpCountrycode) {
// 		$this->remoteIpCountrycode = $remoteIpCountrycode;
// 	}
// 	public function getRemoteIpCity() {
// 		return $this->remoteIpCity;
// 	}
// 	public function setRemoteIpCity($remoteIpCity) {
// 		$this->remoteIpCity = $equestIpCity;
// 	}
// 	public function getRemoteIpCountry() {
// 		return $this->remoteIpCountry;
// 	}
// 	public function setRemoteIpCountry($remoteIpCountry) {
// 		$this->remoteIpCountry = $remoteIpCountry;
// 	}
// 	public function getBankCountryCode() {
// 		return $this->bankCountryCode;
// 	}
// 	public function setBankCountryCode($bankCountryCode) {
// 		$this->bankCountryCode = $bankCountryCode;
// 	}
// 	public function getBankName() {
// 		return $this->bankName;
// 	}
// 	public function setBankName($bankName) {
// 		$this->bankName = $bankName;
// 	}

// 	public function getCbCategoryId() {
// 		return $this->cbCategoryId;
// 	}
// 	public function setCbCategoryId($cbCategoryId) {
// 		$this->cbCategoryId = $cbCategoryId;
// 	}
// 	public function getCbReasonDescId() {
// 		return $this->cbReasonDescId;
// 	}
// 	public function setCbReasonDescId($cbReasonDescId) {
// 		$this->cbReasonDescId = $cbReasonDescId;
// 	}
// 	public function getCbReasonCode() {
// 		return $this->cbReasonCode;
// 	}
// 	public function setCbReasonCode($cbReasonCode) {
// 		$this->cbReasonCode = $cbReasonCode;
// 	}
// 	public function getCbReasonDesc() {
// 		return $this->cbReasonDesc;
// 	}
// 	public function setCbReasonDesc($cbReasonDesc) {
// 		$this->cbReasonDesc = $cbReasonDesc;
// 	}

// 	public function getAvsStatus() {
// 		return $this->avsStatus;
// 	}
// 	public function setAvsStatus($avsStatus) {
// 		$this->avsStatus = $avsStatus;
// 	}
// 	public function getCvvStatus() {
// 		return $this->cvvStatus;
// 	}
// 	public function setCvvStatus($cvvStatus) {
// 		$this->cvvStatus = $cvvStatus;
// 	}
// 	public function isCascaded() {//boolean
// 		return $this->isCascaded;
// 	}
// 	public function setCascaded($isCascaded) {//boolean 
// 		$this->isCascaded = $isCascaded;
// 	}
// 	public function getCcBin() {
// 		return $this->ccBin;
// 	}
// 	public function setCcBin($ccBin) {
// 		$this->ccBin = $ccBin;
// 	}
// 	public function setMOTO($isMOTO) {//boolean
// 		$this->isMOTO = $isMOTO;
// 	}
    
// 	public function getBankCountryName() {
// 		return $this->bankCountryName;
// 	}
// 	public function setBankCountryName($bankCountryName) {
// 		$this->bankCountryName = $bankCountryName;
// 	}

// 	public function getAuthCode() {
// 		return $this->authCode;
// 	}
// 	public function setAuthCode($authCode) {
// 		$this->authCode = $authCode;
// 	}
// 	public function getStatus3D() {
// 		return $this->status3D;
// 	}
// 	public function setStatus3D($status3d) {
// 		$this->status3D = $status3d;
// 	}
// 	public function getStatus3DId() {
// 		return $this->status3DId;
// 	}
// 	public function setStatus3DId($status3dId) {
// 		$this->status3DId = $status3dId;
// 	}
	
// 	public function getShippingFirstname() {
// 		return $this->shippingFirstname;
// 	}
// 	public function setShippingFirstname($shippingFirstname) {
// 		$this->shippingFirstname = $shippingFirstname;
// 	}
// 	public function getShippingLastname() {
// 		return $this->shippingLastname;
// 	}
// 	public function setShippingLastname($shippingLastname) {
// 		$this->shippingLastname = $shippingLastname;
// 	}
// 	public function getShippingAddress1() {
// 		return $this->shippingAddress1;
// 	}
// 	public function setShippingAddress1($shippingAddress1) {
// 		$this->shippingAddress1 = $shippingAddress1;
// 	}
// 	public function getShippingAddress2() {
// 		return $this->shippingAddress2;
// 	}
// 	public function setShippingAddress2($shippingAddress2) {
// 		$this->shippingAddress2 = $shippingAddress2;
// 	}
// 	public function getShippingCity() {
// 		return $this->shippingCity;
// 	}
// 	public function setShippingCity($shippingCity) {
// 		$this->shippingCity = $shippingCity;
// 	}
// 	public function getShippingZipcode() {
// 		return $this->shippingZipcode;
// 	}
// 	public function setShippingZipcode($shippingZipcode) {
// 		$this->shippingZipcode = $shippingZipcode;
// 	}
// 	public function getShippingStatecode() {
// 		return $this->shippingStatecode;
// 	}
// 	public function setShippingStatecode($shippingStatecode) {
// 		$this->shippingStatecode = $shippingStatecode;
// 	}
// 	public function getShippingCountrycode() {
// 		return $this->shippingCountrycode;
// 	}
// 	public function setShippingCountrycode($shippingCountrycode) {
// 		$this->shippingCountrycode = $shippingCountrycode;
// 	}
// 	public function getShippingMobile() {
// 		return $this->shippingMobile;
// 	}
// 	public function setShippingMobile($shippingMobile) {
// 		$this->shippingMobile = $shippingMobile;
// 	}
// 	public function getShippingPhone() {
// 		return $this->shippingPhone;
// 	}
// 	public function setShippingPhone($shippingPhone) {
// 		$this->shippingPhone = $shippingPhone;
// 	}
// 	public function getShippingEmail() {
// 		return $this->shippingEmail;
// 	}
// 	public function setShippingEmail( $shippingEmail) {
// 		$this->shippingEmail = $shippingEmail;
// 	}
// 	public function getTxResultReasonDesc() {
// 		return $this->txResultReasonDesc;
// 	}
// 	public function setTxResultReasonDesc( $txResultReasonDesc) {
// 		$this->txResultReasonDesc = $txResultReasonDesc;
// 	}
	
// 	public function getTxResultReasonId() {
// 		return $this->txResultReasonId;
// 	}

// 	public function setTxResultReasonId( $txResultReasonId) {//String
// 		$this->txResultReasonId = $txResultReasonId;
// 	}

// 	public function getRiskFactorPercent() {//BigDecimal
// 		return $this->riskFactorPercent;
// 	}

// 	public function setRiskFactorPercent( $riskFactorPercent) {//BigDecimal
// 		$this->riskFactorPercent = $riskFactorPercent;
// 	}

}