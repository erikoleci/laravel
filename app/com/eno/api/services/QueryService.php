<?php
namespace com\eno\api\services;


use com\eno\api\pojo\FETxDetailRequest;
use com\eno\api\util\CommonUtil;
use com\eno\api\util\APISettings;
use com\eno\api\util\APIUrls;
use com\eno\api\pojo\FETxDetailResult;
use com\eno\api\pojo\FEGetTransactionsRequest;
use com\eno\api\util\APIHttpClient;
use com\eno\api\util\APIConstant;
use com\eno\api\util\MediaType;
use com\eno\api\pojo\FEGetTransactionsResult;
use com\eno\api\pojo\FETxStatusRequest;
use com\eno\api\pojo\FEPaymentSyncTxResult;
use com\eno\api\exception\InvalidRequestException;


/**
 * @author KR
 * @date July 18,2016
 */
class QueryService extends BaseService{

	public function __construct($credentials) {//Credentials
		parent::__construct($credentials);
	}
	
	
	/**
	 * @author kr
	 * @date 11 July, 2016
	 * @param request
	 * @return Response<FETxDetailResult>
	 * @throws Exception
	 * @desc Get transaction detail. It contain transaction result, card detail, billing address, 
	 *       related transaction etc.
	 **/
	public function getTxDetail($request) //TxDetailRequest
	{
		if($request == NULL)
		{
			throw new InvalidRequestException("Request is empty.");
		}
		$detailRequest = new FETxDetailRequest($this->credentials);//FETxDetailRequest
		//copy all $request into $detailRequest
		foreach ($request as $key => $value)
		{
			$detailRequest->{$key} = $value;
		}
		
		if(CommonUtil::isEmpty($detailRequest->requestTime))
		{
			$detailRequest->requestTime = CommonUtil::getSysDateTime();
		}
		$detailRequest->apiVersion = APISettings::VERSION;
		
		
		//calculate signature
		$parmsVal = $detailRequest->paramsValueString();
		$detailRequest->signature = CommonUtil::createSignature($parmsVal, $this->credentials->getAccountKey());
		
		$jsonRequest = json_encode($detailRequest);
		$requestUrl = $this->credentials->getDomain().APIUrls::GET_TX_DETAIL;
		
		//Response<FETxDetailResult>
		$response = APIHttpClient::sendRequest($this->credentials->getEnv(),$requestUrl, APIConstant::HTTP_METHOD_POST,
		 		$jsonRequest, MediaType::APPLICATION_JSON,MediaType::APPLICATION_JSON,new FETxDetailResult());
		$paramsval = $response->data->paramValueString();
		$sign = $response->data->signature;
		$response->isValidSignature  = $this->isResponseSignMatch($paramsval,$sign);
		return $response;
	}
	
	/**
	 * @author kr
	 * @date 11 July, 2016
	 * @param request
	 * @return Response<FETxDetailResult>
	 * @throws Exception
	 * @desc Search transaction as per criteria like tx id, orderid, date , amount etc. 
	 *       related transaction etc.
	 **/
	public function searchTx($request) //GetTransactionsRequest
	{
		if($request == NULL)
		{
			throw new InvalidRequestException("Request is empty.");
		}
		$getTransactionsRequest = new FEGetTransactionsRequest($this->credentials);
		//copy all $request into $getTransactionsRequest
		foreach ($request as $key => $value)
		{
			if(CommonUtil::isEmpty($value))
			{
				$value = NULL;
			}
			$getTransactionsRequest->{$key} = $value;
		}
		
		if(CommonUtil::isEmpty($getTransactionsRequest->requestTime))
		{
			$getTransactionsRequest->requestTime = CommonUtil::getSysDateTime();
		}
		$getTransactionsRequest->apiVersion = APISettings::VERSION;
		
		$jsonRequest = json_encode($getTransactionsRequest);
		$requestUrl = $this->credentials->getDomain().APIUrls::SEARCH_TX;
		//Response<FEGetTransactionsResult>
		$response = APIHttpClient::sendRequest($this->credentials->getEnv(),$requestUrl, APIConstant::HTTP_METHOD_POST,
				$jsonRequest, MediaType::APPLICATION_JSON,MediaType::APPLICATION_JSON,new FEGetTransactionsResult());
		return $response;
	}
	
	/**
	 * @author kr
	 * @date 06 July, 2017
	 * @param request
	 * @return Response<FEPaymentSyncTxResult>
	 * @throws Exception
	 * @desc Get transaction status. It contain basic transaction info like transaction result etc.
	 **/
	public function getTxStatus($request) //FEPaymentSyncTxResult
	{
		if($request == NULL)
		{
			throw new InvalidRequestException("Request is empty.");
		}
		$detailRequest = new FETxStatusRequest($this->credentials);//FETxStatusRequest
		//copy all $request into $detailRequest
		foreach ($request as $key => $value)
		{
			$detailRequest->{$key} = $value;
		}
	
		if(CommonUtil::isEmpty($detailRequest->requestTime))
		{
			$detailRequest->requestTime = CommonUtil::getSysDateTime();
		}
		$detailRequest->apiVersion = APISettings::VERSION;
	
	
		//calculate signature
		$parmsVal = $detailRequest->paramsValueString();
		$detailRequest->signature = CommonUtil::createSignature($parmsVal, $this->credentials->getAccountKey());
	
		$jsonRequest = json_encode($detailRequest);
		$requestUrl = $this->credentials->getDomain().APIUrls::GET_TX_STATUS;
	
		//Response<FEPaymentSyncTxResult>
		$response = APIHttpClient::sendRequest($this->credentials->getEnv(),$requestUrl, APIConstant::HTTP_METHOD_POST,
				$jsonRequest, MediaType::APPLICATION_JSON,MediaType::APPLICATION_JSON,new FEPaymentSyncTxResult());
		$paramsval = $response->data->paramValueString();
		$sign = $response->data->signature;
		$response->isValidSignature  = $this->isResponseSignMatch($paramsval,$sign);
		return $response;
	}
}
