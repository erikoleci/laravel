<?php
namespace com\eno\api\exception;


/**
 * @author KR
 * @date July 18,2016
 */
class InvalidRequestException extends APIException{


	public function __construct($message, $code = 0, $previous = null) 
	{
		parent::__construct($message, $code, $previous);
	}
	
	public function __toString() 
	{
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}
}