<?php 
namespace com\eno\api\services;

use com\eno\api\util\CommonUtil;
use com\eno\api\util\APISettings;

/**
 * @author KR
 * @date July 18,2016
 */
class BaseService
{
	protected $credentials;
	
	public function __construct($credentials)
	{
		$this->credentials = $credentials;
	}
	
	protected function isResponseSignMatch($responseContent, $responseSign)
	{
		try
		{
			if(isset($responseSign))
			{
				$calculatedSign = CommonUtil::createSignature($responseContent,$this->credentials->getAccountKey());
				if( strtolower($responseSign) == strtolower($calculatedSign))
				{
					return true;
				}
			}
			else
			{
				//in case of signature is not set.
				return true;
			}
		}catch(\Exception $e)
		{
			if(APISettings::$DEBUG_MODE)
			{
				error_log("BaseService_isResponseSignMatch: Failed to calculate response signature. Code:".$e->getCode().' Message:'.$e->getMessage().' Stack:'.$e->getTraceAsString(),0);
			}
		}
		return false;
	}
}