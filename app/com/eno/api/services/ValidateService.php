<?php
namespace com\eno\api\services;

use com\eno\api\exception\APIException;
use com\eno\api\util\APISettings;
use com\eno\api\util\CommonUtil;
use com\eno\api\pojo\FEErrorDetail;
use com\eno\api\pojo\FEPaymentSyncTxResult;
use com\eno\api\pojo\Response;

/**
 * @author KR
 * @date July 18,2016
 */
class ValidateService extends BaseService{

	public function __construct($credentials) {//Credentials
		parent::__construct($credentials);
	}

	/**
	 * @desc To validate url reponse signature, pass url's key-value params like below
	 *       responseTime=2016-06-23+16%3A03%3A16&txId=26ffa8ff-3988-4ecb-9565-531b31de4246&txTypeId=3&recurrentTypeId=1&requestId=DEMO_REQUEST1466677970065&orderId=DEMO_ORDER1466677970065&sourceAmount=10.000&sourceCurrencyCode=RUB&amount=0.160&currencyCode=USD&resultCode=1&message=Transaction+completed+successfully.&resultReasonCode=1&ccNumber=401200xxxxxx1003&cardId=8e890c96-548a-4c82-99af-b6bea23a4138&signature=jbff60f5jwNcPcC6fLZMhxPxd3wMzg95qn06DdglapY%3D
	 *       Return result from url into class-Response<FEPaymentSyncTxResult>. Also add signature validation status in Response.
	 * @param urlKeyValueParams
	 * @return Response<FEPaymentSyncTxResult>
	 * @throws APIException
	 */
	public function validateURLResponseSignature($urlKeyValueParams)//string
	{
		$params = NULL;//key-value array
		try
		{
			$params = CommonUtil::getMAPFromKeyValueString($urlKeyValueParams);
		}catch(\Exception $e)
		{
			$msg = "Validate_validateURLResponseSignature: Failed to process URL key-value response.";
			if(APISettings::$DEBUG_MODE)
			{
				error_log("$msg Code:".$e->getCode().' Message:'.$e->getMessage().' Stack:'.$e->getTraceAsString(),0);
			}
			throw new APIException($msg." ".$e->getMessage(),0);
		}

		$errorDetails = array();//List<FEErrorDetail>
		$errorDetail = NULL;//FEErrorDetail


		$params["responseTime"] = isset($params["responseTime"]) ? $params["responseTime"] : '';
		$params["txId"] = isset($params["txId"]) ? $params["txId"] : '';
		$params["txTypeId"] = isset($params["txTypeId"]) ? $params["txTypeId"] : '';
		$params["recurrentTypeId"] = isset($params["recurrentTypeId"]) ? $params["recurrentTypeId"] : '';
		$params["requestId"] = isset($params["requestId"]) ? $params["requestId"] : '';
		$params["orderId"] = isset($params["orderId"]) ? $params["orderId"] : '';
		$params["sourceAmount"] = isset($params["sourceAmount"]) ? $params["sourceAmount"] : '';
		$params["sourceCurrencyCode"] = isset($params["sourceCurrencyCode"]) ? $params["sourceCurrencyCode"] : '';
		$params["amount"] = isset($params["amount"]) ? $params["amount"] : '';
		$params["currencyCode"] = isset($params["currencyCode"]) ? $params["currencyCode"] : '';
		$params["resultCode"] = isset($params["resultCode"]) ? $params["resultCode"] : '';
		$params["message"] = isset($params["message"]) ? $params["message"] : '';
		$params["resultReasonCode"] = isset($params["resultReasonCode"]) ? $params["resultReasonCode"] : '';
		$params["ccNumber"] = isset($params["ccNumber"]) ? $params["ccNumber"] : '';
		$params["cardId"] = isset($params["cardId"]) ? $params["cardId"] : '';
		$params["signature"] = isset($params["signature"]) ? $params["signature"] : '';

		for($index=0;$index< sizeof($params);$index++)
		{
			$params['errorCode'.$index] = isset($params['errorCode'.$index]) ? $params['errorCode'.$index] : '';
			$errCode = $params['errorCode'.$index];
			if($errCode==null)
			{
				break;
			}
			$errorDetail = new FEErrorDetail();
			$errorDetail->errorCode = $errCode;
			$errorDetail->errorMessage = $params["errorMessage".$index];
			$errorDetail->advice = $params["errorAdvice".$index];
			array_push($errorDetails, $errorDetail);
		}

		//FEPaymentSyncTxResult
		$txResult = new FEPaymentSyncTxResult($params["responseTime"],$params["txId"], $params["txTypeId"], $params["recurrentTypeId"], $params["requestId"],
				$params["orderId"], $params["sourceAmount"], $params["sourceCurrencyCode"], $params["amount"], $params["currencyCode"], $params["resultCode"],
				$params["message"], $params["resultReasonCode"],$params["ccNumber"], $params["cardId"],$params["signature"], $errorDetails);

		$response = new Response($txResult);//FEPaymentSyncTxResult
		$response->httpStatus = 200;
		$response->isValidSignature  = $this->isResponseSignMatch($txResult->paramValueString(), $txResult->signature);
		return $response;
	}

	/**
	 *  @desc Validate notification response & return Response<FEPaymentSyncTxResult> with signature status.
	 */
	public function validateNotificationResponseSignature($jsonNotificationdata)//string
	{
		$txResult = new FEPaymentSyncTxResult();
		CommonUtil::jsonToResultObject($jsonNotificationdata, $txResult);

		//Response<FEPaymentSyncTxResult>
		$response = new Response($txResult);
		$response->httpStatus = 200;
		$response->isValidSignature  = $this->isResponseSignMatch($txResult->paramValueString(), $txResult->signature);
		return $response;
	}
}
