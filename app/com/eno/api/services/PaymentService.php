<?php
namespace com\eno\api\services;

use com\eno\api\util\APIUrls;
use com\eno\api\pojo\FEPaymentTxRequest;
use com\eno\api\util\CommonUtil;
use com\eno\api\util\APISettings;
use com\eno\api\util\APIHttpClient;
use com\eno\api\pojo\PaymentTxRequest;
use com\eno\api\pojo\FEReferralTxRequest;
use com\eno\api\pojo\FEReferralTxResult;
use com\eno\api\util\MediaType;
use com\eno\api\util\APIConstant;
use com\eno\api\pojo\FEPaymentSyncTxResult;
use com\eno\api\exception\InvalidRequestException;

/**
 * @author KR
 * @date July 18,2016
 */
class PaymentService extends BaseService
{

	public function __construct($credentials) {//Credentials
		parent::__construct($credentials);
	}
	
	/**
	 * @author kr
	 * @date 13 July, 2016
	 * @param request
	 * @return String
	 * @desc A purchase deduct amount immediately.
	 *       Use this service when "Payment Page Hosted At Gateway Server".
	 *       Merchant provide only order detail and payment card detail will be provided at gateway payment page.
	 *       Here NO need of merchant to be PCI-DSS Compliance.
	 *       This return Request HTML form.
	 */
	public function getGatewayPagePurchaseRequest($request)//PaymentTxRequest
	{
		$htmlRequest = $this->createWebPaymentRequest($request, APIUrls::WEB_PURCHASE);
		return $htmlRequest;
	}
	
	/**
	 * @author kr
	 * @date 1 July, 2016
	 * @param request
	 * @return String
	 * @desc An authorize does not deduct amount immediately instead it reduces the available credit limit for that card.
	 *       So reserved amount can be settled later by a Capture request (Capture on Authorization)
	 *       Use this service when "Payment Page Hosted At Gateway Server".
	 *       Merchant provide only order detail and payment card detail will be provided at gateway payment page.
	 *       Here NO need of merchant to be PCI-DSS Compliance.
	 *       This return Request HTML form.
	 */
	public function getGatewayPageAuthorizationRequest($request) //PaymentTxRequest
	{
		$htmlRequest = $this->createWebPaymentRequest($request, APIUrls::WEB_AUTHORIZATION);
		return $htmlRequest;
	}

    /**
     * @param request
     * @return Response<FEPaymentSyncTxResult>
     * @desc A purchase deduct amount immediately.
     *       Use this service when "Payment Page Hosted At Merchant Server".
     *       Merchant provide order detail along with payment card detail. Here merchant must be PCI-DSS Compliance.
     *       Please check with gateway support for more information.
     * @throws InvalidRequestException
     * @author kr
     * @date 1 July, 2016
     */
	public function purchase($request)//PaymentTxRequest
	{
		$response = $this->payment($request, APIUrls::SERVER_PURCHASE);
		return $response;
	}

	/**
	 * @author kr
	 * @date 1 July, 2016
	 * @param request
	 * @return Response<FEPaymentSyncTxResult>
	 * @desc An authorize does not deduct amount immediately instead it reduces the available credit limit for that card.
	 *       So reserved amount can be settled later by a Capture request (Capture on Authorization)
	 *       Use this service when "Payment Page Hosted At Merchant Server".
	 *       Merchant provide order detail along with payment card detail. Here merchant must be PCI-DSS Compliance.
	 *       Please check with gateway support for more information.
	 */
	public function authorization($request) //PaymentTxRequest
	{
		$response = $this->payment($request, APIUrls::SERVER_AUTHORIZATION);
		return $response;
	}
	
	
	/**
	 * @author kr
	 * @date 1 July, 2016
	 * @param request
	 * @return Response<FEReferralTxResult>
	 * @throws Exception
	 * @desc Captured previously authorized amount.
	 */
	public function capture($request) //ReferralTxRequest
	{
		$response = $this->refPayment($request, APIUrls::CAPTURE);
		return $response;
	}
	
	/**
	 * @author kr
	 * @date 1 July, 2016
	 * @param request
	 * @return Response<FEReferralTxResult>
	 * @desc Perform refund on previously purchased or captured transaction.
	 */
	public function refund($request)//ReferralTxRequest
	{
		$response = $this->refPayment($request, APIUrls::REFUND);
		return $response;
	}
	
	/**
	 * @author kr
	 * @date 1 July, 2016
	 * @param request
	 * @return Response<FEReferralTxResult>
	 * @desc Reverse or Void previous transaction. This service not supported by all acquirer's for all services.
	 *       Please check gateway support for more information.
	 */
	public function reverse($request) //ReferralTxRequest
	{
		$response = $this->refPayment($request, APIUrls::REVERSE);
		return $response;
	}
	
	/**
	 * @author kr
	 * @date 1 July, 2016
	 * @param request
	 * @return Response<FEReferralTxResult>
	 * @desc Perform credit fund to payment card.
	 *       This service not supported by all acquirer's for all services.Please check gateway support for more information.
	 */
	public function creditFund($request) //PaymentTxRequest
	{
		$response = $this->payment($request, APIUrls::CREDIT_FUND);
		return $response;
	}
	
	/**
	 * @author kr
	 * @date 1 July, 2016
	 * @param request
	 * @return Response<FEReferralTxResult>
	 * @desc Perform credit fund to card used on previous purchase or authorization or capture transaction.
	 *       This service not supported by all acquirer's for all services.Please check gateway support for more information.
	 */
	public function referalCreditFund($request)//ReferralTxRequest
	{
		$response = $this->refPayment($request, APIUrls::REF_CREDIT_FUND);
		return $response;
	}
	
	/**
	 * @author kr
	 * @date 1 July, 2016
	 * @param request
	 * @return Response<FEReferralTxResult>
	 * @desc Perform original credit fund to payment card.
	 *       This service not supported by all acquirer's for all services.Please check gateway support for more information.
	 */
	public function originalCreditFund($request) //PaymentTxRequest
	{
		$response = $this->payment($request,APIUrls::ORIGINAL_CREDIT_FUND);
		return $response;
	}
	
	/**
	 * @author kr
	 * @date 1 July, 2016
	 * @param request
	 * @return Response<FEReferralTxResult>
	 * @desc Perform original credit fund to card used on previous purchase or authorization or capture transaction.
	 *       This service not supported by all acquirer's for all services.Please check gateway support for more information.
	 */
	public function referalOriginalCreditFund($request) //ReferralTxRequest
	{
		$response = $this->refPayment($request, APIUrls::REF_ORIGINAL_CREDIT_FUND);
		return $response;
	}
	
	/**
	 * @author kr
	 * @date 8 Aug, 2016
	 * @param request
	 * @return Response<FEReferralTxResult>
	 * @desc Perform recurrent transaction on previous payment transaction. This service not supported by all acquirer's for all services.
	 *       Please check gateway support for more information.
	 */
	public function recurrent($request) //ReferralTxRequest
	{
		$response = $this->refPayment($request, APIUrls::RECURRENT);
		return $response;
	}
	/////////////////////////////////////////////////// PRIVATE METHODS /////////////////////////////////////////////////////
	/**
	 *  @desc Return html request which show gateway payment page after loading.
	 */
	private function createWebPaymentRequest($request,$urlPostFix)//PaymentTxRequest
	{
		if($request == NULL)
		{
			throw new InvalidRequestException("Request is empty.");
		}
	
		$paymentReq = new FEPaymentTxRequest($this->credentials);
		//copy all $request into $paymentReq
		foreach ($request as $key => $value) 
		{
			$paymentReq->{$key} = $value;
		}
		
		//basic validation & set required values & signature
		$this->basicPaymentRequestValidation($paymentReq);
	
	
		$jsonRequest = json_encode($paymentReq);
		$base64EncodedJsonRequest = base64_encode($jsonRequest);
		$requestUrl = $this->credentials->getDomain().$urlPostFix;
	
		$htmlRequest = "<html><body OnLoad='AutoSubmitForm();'><form name='downloadForm' action='$requestUrl'"
				       ."method='POST'><input type='hidden' name='request' value='$base64EncodedJsonRequest'>"
				       ."<SCRIPT >function AutoSubmitForm() {   document.downloadForm.submit();}</SCRIPT><h3>Transaction is in progress. Please wait...</h3></form></body></html>";
		return $htmlRequest;
	}
	
	/**
	 *   return Response<FEPaymentSyncTxResult>
	 */
	private function payment($request,$urlPostFix) //PaymentTxRequest
	{
		if($request == NULL)
		{
			throw new InvalidRequestException("Request is empty.");
		}
	
		$paymentReq = new FEPaymentTxRequest($this->credentials);
		//copy all $request into $paymentReq
		foreach ($request as $key => $value)
		{
			$paymentReq->{$key} = $value;
		}
		
		//basic validation & set required values & signature
		$this->basicPaymentRequestValidation($paymentReq);
		if($paymentReq->txDetails->orderData->cc ==null)
		{
			throw new InvalidRequestException("Field 'txDetails->orderData->cc' is emtpy.");
		}
	
		$jsonRequest = json_encode($paymentReq);
		$requestUrl = $this->credentials->getDomain().$urlPostFix;
	
		 //Response<FEPaymentSyncTxResult>
		 $response = APIHttpClient::sendRequest($this->credentials->getEnv(),$requestUrl, APIConstant::HTTP_METHOD_POST,
		 		$jsonRequest, MediaType::APPLICATION_JSON,MediaType::APPLICATION_JSON,new FEPaymentSyncTxResult());
		 $paramsval = $response->data->paramValueString();
		 $sign = $response->data->signature;
		 $response->isValidSignature  = $this->isResponseSignMatch($paramsval,$sign);
		 return $response;
	}
	
	/**
	 *  return Response<FEReferralTxResult>
	 */
	private function refPayment($request,$urlPostFix)//ReferralTxRequest
	{
		if($request == NULL)
		{
			throw new InvalidRequestException("Request is empty.");
		}
	
		$paymentReq = new FEReferralTxRequest($this->credentials);//FEReferralTxRequest
		//copy all $request into $paymentReq
		foreach ($request as $key => $value)
		{
			$paymentReq->{$key} = $value;
		}
		
		if(CommonUtil::isEmpty($paymentReq->requestTime))
		{
			$paymentReq->requestTime = CommonUtil::getSysDateTime();
		}
		$paymentReq->apiVersion = APISettings::VERSION;

		//calculate signature
		$parmsVal = $paymentReq->paramsValueString();
		$paymentReq->signature = CommonUtil::createSignature($parmsVal, $this->credentials->getAccountKey());
	
		$jsonRequest = json_encode($paymentReq);
		$requestUrl = $this->credentials->getDomain().$urlPostFix;
	
		$response = APIHttpClient::sendRequest($this->credentials->getEnv(),$requestUrl, APIConstant::HTTP_METHOD_POST,
				$jsonRequest, MediaType::APPLICATION_JSON,MediaType::APPLICATION_JSON, new FEReferralTxResult());
		
		$response->isValidSignature  = $this->isResponseSignMatch($response->data->paramValueString(), $response->data->signature);
		return $response;
	}
	
	private function basicPaymentRequestValidation($paymentReq) //FEPaymentTxRequest
	{
		if(CommonUtil::isEmpty($paymentReq->requestTime))
		{
			$paymentReq->requestTime = CommonUtil::getSysDateTime();
		}
		
		$txDetails = $paymentReq->txDetails;//FETransactionInfo
		if($txDetails==NULL)
		{
			throw new InvalidRequestException("Field 'txDetails' is emtpy.");
		}
		$txDetails->apiVersion = APISettings::VERSION;
		$orderData = $txDetails->orderData;//FEOrderData
		if($orderData==NULL)
		{
			throw new InvalidRequestException("Field 'txDetails->orderData' is emtpy.");
		}
		
		//calculate signature
		$parmsVal = $paymentReq->paramsValueString();
		$paymentReq->signature = CommonUtil::createSignature($parmsVal, $this->credentials->getAccountKey());
	}
	
}