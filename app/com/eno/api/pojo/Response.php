<?php 

namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class Response extends POJOBase{

	public $httpStatus;//int
	public $data;// T - generic
	public $isValidSignature;//Boolean

	public function __construct($data) { //T - class object
		$this->data = $data;
	}
}
