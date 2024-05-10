<?php

namespace com\eno\api\exception;

/**
 * @author KR
 * @date July 18,2016
 */
class APIException extends \Exception
{
	
	public function __construct($message, $code = 0, \Exception $previous = null) 
	{
		parent::__construct($message, $code, $previous);
	}
	
	public function __toString() 
	{
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}
}