<?php 

namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class POJOBase
{
	public function __toString() 
	{
		return json_encode($this,JSON_PRETTY_PRINT);
	}
		

}
