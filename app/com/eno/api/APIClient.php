<?php

namespace com\eno\api;

use com\eno\api\pojo\Credentials;
use com\eno\api\services\PaymentService;
use com\eno\api\util\APISettings;
use com\eno\api\util\CommonUtil;
use com\eno\api\util\Environment;
use com\eno\api\services\QueryService;
use com\eno\api\services\ValidateService;
use InvalidArgumentException;

/**
 * @author KR
 * @date July 18,2016
 */
class APIClient
{
	private $credentials;
	private $paymentService;
	private $validateService;
	private $queryService;

	public function __construct($merchantId, $merchantAccountId, $accountKey, $accountUserName, $accountPassword, $env,
			                    $debug=FALSE,$connectTimeout=60, $readTimeout=120)
	{

		if( !isset($merchantId) || !isset($merchantId) || !isset($merchantId) || !isset($merchantId) ||
			!isset($merchantId) || !isset($env) )
		{
			throw new InvalidArgumentException("APIClient: One of value from [merchantId,merchantAccountId,accountKey,"
					+ "username,password,env] is missing.");
		}

		APISettings::$CONNECT_TIMEOUT = $connectTimeout;
		APISettings::$READ_TIMEOUT = $readTimeout;
		APISettings::$DEBUG_MODE = $debug;

		$domain = APISettings::LIVE_DOMAIN;
		if($env == Environment::LIVE)
		{
			$domain = APISettings::LIVE_DOMAIN;
		}
		else if($env == Environment::SANDBOX)
		{
			$domain = APISettings::SANDBOX_DOMAIN;
		}
		else
		{
			throw new InvalidArgumentException("APIClient: Invalid Environment values.");
		}

		$mId = CommonUtil::hashDataInBase64($merchantId);
		$maId = CommonUtil::hashDataInBase64($merchantAccountId);
		$userName = CommonUtil::encryptDataInBase64($accountUserName, $accountKey);
		$password = CommonUtil::encryptDataInBase64($accountPassword, $accountKey);
		$this->credentials = new Credentials($env,$domain,$accountKey,$mId, $maId,$userName,
				            $password);

	}

	public function getPaymentService()
	{
		if($this->paymentService == null)
		{
			$this->paymentService = new PaymentService($this->credentials);
		}
		return $this->paymentService;
	}

	public function getValidateService()
	{
		if($this->validateService == null)
		{
			$this->validateService = new ValidateService($this->credentials);
		}
		return $this->validateService;
	}

	public function getQueryService()
	{
		if($this->queryService == null)
		{
			$this->queryService = new QueryService($this->credentials);
		}
		return $this->queryService;
	}

}