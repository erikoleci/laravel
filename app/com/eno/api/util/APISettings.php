<?php 
namespace com\eno\api\util;

/**
 * @author KR
 * @date July 18,2016
 */
class APISettings {

	const VERSION = "1.0.1";//its gateway api version..not lib version
	const LIVE_DOMAIN = "https://api.certus.finance";
	const SANDBOX_DOMAIN = "http://sandbox.certus.finance";

	static $DEBUG_MODE=false;
	static $CONNECT_TIMEOUT=60;//seconds
	static $READ_TIMEOUT=120;//seconds

	const TLS_VERSION="TLSv1.2";

}
