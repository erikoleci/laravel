<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FERequest extends POJOBase {

	public $requestTime = NULL;
	//public Token authToken = NULL;
	public $mId =NULL; //sha256 hash in base64 encode
	public $maId = NULL;//sha256 hash in base64 encode
	public $userName;//merchant account username - encrypt in base64 encode
	public $password;//merchant account password - encrypt in base64 encode
	//public $txSource = Transaction.TxSourceConst.SERVER.getId();//
	public $signature = NULL;
	public $lang;//ISO 639-1
	
	public function paramsValueString()
	{
		return "";
	}
	
// 	public function getSignature() {
// 		return $this->signature;
// 	}
// 	public function setSignature($signature) {
// 		$this->signature = $signature;
// 	}
// 	public function getRequestTime() {
// 		return $this->requestTime;
// 	}
// 	public function setRequestTime($requestTime) {
// 		$this->requestTime = $requestTime;
// 	}
// //	public function getmId() {
// //		return $this->mId;
// //	}
// //	public function setmId($mId) {
// //		$this->mId = mId;
// //	}
// //	public function getMaId() {
// //		return $this->maId;
// //	}
// //	public function setMaId($maId) {
// //		$this->maId = maId;
// //	}
// //	public function getUserName() {
// //		return $this->userName;
// //	}
// //	public function setUserName($userName) {
// //		$this->userName = userName;
// //	}
// //	public function getPassword() {
// //		return $this->password;
// //	}
// //	public function setPassword($password) {
// //		$this->password = password;
// //	}

// 	public function getLang() {
// 		return $this->lang;
// 	}
// 	public function setLang($lang) {
// 		$this->lang = $lang;
// 	}


}
