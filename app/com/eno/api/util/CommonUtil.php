<?php
namespace com\eno\api\util;

use com\eno\api\pojo\FEResult;
use com\eno\api\pojo\FEAmount;
use com\eno\api\pojo\FEErrorDetail;

/**
 * @author KR
 * @date July 18,2016
 */
class CommonUtil
{
	public static function encryptData($input, $key)
	{
		//KR:30-06-2017 Commented since not supported in php7
		// $alg = MCRYPT_RIJNDAEL_128; // AES
		// $mode = MCRYPT_MODE_ECB; // ECB
		// //padding
		// $block_size = mcrypt_get_block_size($alg, $mode);
		// $pad = $block_size - (strlen($input) % $block_size);
		// $input .= str_repeat(chr($pad), $pad);
		// $crypttext = mcrypt_encrypt($alg, $key, $input , $mode);

		$crypttext = openssl_encrypt($input, 'AES-128-ECB',$key, OPENSSL_RAW_DATA);
		return $crypttext;
	}

	public static function encryptDataInBase64($input, $key)
	{
		$crypttext = CommonUtil::encryptData($input, $key);
		$encryptDataInBase64 = base64_encode($crypttext);
		return $encryptDataInBase64;
	}

	public static function hashDataInBase64($input)
  	{
		$output = hash('sha256',$input,true);
		$hashDataInBase64 = base64_encode($output);
		return $hashDataInBase64;
    }

    public static function createSignature($input,$key)
    {
    	$crypttext = CommonUtil::encryptData($input, $key);
    	$output = hash('sha256',$crypttext,true);
    	//perform base64 on output of digest/hash.
    	$signature = base64_encode($output);
    	return $signature;
    }

    public static function isEmpty($var)
    {
    	$toReturn = false;
    	if($var == NULL)
    	{
    		return true;
    	}
    	if(is_array($var) && empty($var)) {
    		$toReturn = true;
    	}
    	if(is_string($var) && ($var =='' || is_null($var))) {
    		$toReturn = true;
    	}
    	if(is_integer($var) && ($var =='' || is_null($var)) ) {
    		$toReturn = true;
    	}
    	if(is_float($var) && ($var =='' || is_null($var)) ) {
    		$toReturn = true;
    	}
    	return $toReturn;
    }

    public static function getUTCDateTime($datetime)
    {
    	return gmdate('Y-m-d H:i:s', strtotime($datetime)); //'2015-04-10 16:27:24+0530' system will convert to UTC '2015-04-10 10:57:240'.
    }

    public static function getSysDateTime()
    {
    	return date('Y-m-d H:i:s');
    }

    public static function encode($obj)
    {
		$json = array();
		foreach($obj as $key => $value)
		{
		   $json[$key] = $value;
		}
		return json_encode($json);
    }

     public static function getMAPFromKeyValueString($kv) //string
    {
    	$params = array();//Map<String,String>

    	if(!CommonUtil::isEmpty($kv))
    	{
    		$strs = explode("?", $kv);
    		if(sizeof($strs)==1)
    		{
    			$kv = $strs[0];
    		}
    		else
    		{
    			$kv = $strs[1];
    		}

     		foreach (explode("&", $kv) as $param )
    		{
    			$pair = explode("=", $param);
    			$key = urldecode($pair[0]);
    			$value = "";
    			if (sizeof($pair) > 1)
    			{
    				$value = urldecode($pair[1]);
    			}
    			if (CommonUtil::isEmpty($key) && sizeof($pair) == 1)
    			{
    				continue;
    			}
    			$params[$key] = $value;
    		}
    	}
    	return $params;
    }

    public static function jsonToResultObject($rbody,$returnClassObj)
    {
    	$data = json_decode($rbody, false);
    	//TODO Later make generic & optimized method to convert json to custom class object with multi level
        if(isset($data) && $data != ''){
        	foreach ($data as $key => $value)
        	{
        		if(is_object($value)&&get_class($value)==='stdClass')
        		{
        			$innerObj = $value;
        			if(strpos(strtolower($key), 'amount') !== false)
        			{
        				$innerObj = new FEAmount();
        			}
        			else if(strpos(strtolower($key), 'result') !== false)
        			{
        				$innerObj = new FEResult();
        			}

        			if( !(get_class($innerObj)==='stdClass'))
        			{
        				foreach ($value as $key1 => $value1)
        				{
        					if(is_array($value1) && strpos(strtolower($key1), 'error') !== false)
        					{
        						$innerObj1 = array();
    							foreach ($value1 as $value11)
        						{
        							$innerObj11 = new FEErrorDetail();
        							foreach ($value11 as $key2 => $value2) $innerObj11->{$key2} = $value2;
        							array_push($innerObj1, $innerObj11);
        						}
        						$innerObj->{$key1} = $innerObj1;
        					}
        					else
        					{
        						$innerObj->{$key1} = $value1;
        					}
        				}
        			}
        			$returnClassObj->{$key} = $innerObj;
        		}
        		else
        		{
        			$returnClassObj->{$key} = $value;
        		}
        	}
        }
    }
}

?>