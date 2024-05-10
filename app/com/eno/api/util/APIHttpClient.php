<?php 

namespace com\eno\api\util;

use com\eno\api\exception\APIException;
use com\eno\api\pojo\Response;
use com\eno\api\exception\InvalidRequestException;

/**
 * @author KR
 * @date July 18,2016
 */
class APIHttpClient {


	public static function sendRequest($env,$urlString,$method,$reqContent,$acceptType,$contentType,
			$returnClassObj) 
	{
	       if(APISettings::$DEBUG_MODE)
	       {
	       	 error_log("APIHttpClient_sendRequest:URL=>$urlString");
	       	 error_log("APIHttpClient_sendRequest:Request=>$reqContent");
		   }
		   
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $urlString);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: $contentType","Accept: $acceptType"));
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$reqContent);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,APISettings::$CONNECT_TIMEOUT);
			curl_setopt($ch, CURLOPT_TIMEOUT, APISettings::$READ_TIMEOUT);
			
			if( Environment::LIVE == $env)
			{
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
			}
			else if(substr($urlString,0,5)=='https')
			{
				curl_setopt($ch, CURLOPT_SSLVERSION,3);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			}
			
			if (!defined('CURL_SSLVERSION_TLSv1')) {
				define('CURL_SSLVERSION_TLSv1', 1); // constant not defined in PHP < 5.5
			}
			//if (!defined('CURL_SSLVERSION_TLSv1_2')) {
			//	define('CURL_SSLVERSION_TLSv1_2', 1.2); // constant not defined in PHP < 5.5
			//}
			
			curl_setopt($ch, CURLOPT_SSLVERSION,CURL_SSLVERSION_TLSv1);

			
			$rbody  = curl_exec($ch);
			$responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			$rContentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
			$response = NULL;
			if( $responseCode == 200 )
			{
				//success
				if(APISettings::$DEBUG_MODE)
				{
					error_log("APIHttpClient_sendRequest:Response code=>$responseCode");
					error_log("APIHttpClient_sendRequest:Response=>$rbody");
				}

				CommonUtil::jsonToResultObject($rbody, $returnClassObj);
				$response = new Response($returnClassObj);
				$response->httpStatus = $responseCode;
			}
			else
			{
				//error
				$errno = curl_errno($ch);
				$message = curl_error($ch);
				
		    	if(APISettings::$DEBUG_MODE)
		    	{
		    		error_log("APIHttpClient_sendRequest:Response code=>$responseCode");
		    		error_log("APIHttpClient_sendRequest:Response=>$errno $message");
		    	}
				
		    	
				if($responseCode >= 300 && $responseCode <500 )
				{
			    	if(MediaType::APPLICATION_JSON == $rContentType)
	    			{
						CommonUtil::jsonToResultObject($rbody, $returnClassObj);
						$response = new Response($returnClassObj);
						$response->httpStatus = $responseCode;
	    			}
			    	else
			    	{
			    		curl_close($ch);
			    		throw new InvalidRequestException("Error No:$errno, ErrorMessage:$message",$responseCode);
			    	}
				}
				else
				{
					curl_close($ch);
					throw new APIException("Error No:$errno, ErrorMessage:$message",$responseCode);
				}
			}

			curl_close($ch);
			return $response;
	   }
	   
// 	   private static function caBundle()
// 	   {
// 	   		return dirname(__FILE__) . '/../../ca-cert.crt';
// 	   }
}
