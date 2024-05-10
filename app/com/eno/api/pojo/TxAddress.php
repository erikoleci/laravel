<?php 

namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class TxAddress extends POJOBase{

	public $firstName;
	public $lastName;
	public $address1;
	public $address2;
	public $city;
	public $zipcode;
	public $stateCode;
	public $countryCode;
	public $mobile;
	public $phone;
	public $email;
	public $fax;
	
	public function paramsValueString()
	{
		$paramsValueString = !isset($this->firstName)?"": trim($this->firstName);
		$paramsValueString .= !isset($this->lastName)?"": trim($this->lastName);
		$paramsValueString .= !isset($this->address1)?"": trim($this->address1);
		$paramsValueString .= !isset($this->address2)?"": trim($this->address2);
		$paramsValueString .= !isset($this->city)?"": trim($this->city);
		$paramsValueString .= !isset($this->zipcode)?"": trim($this->zipcode);
		$paramsValueString .= !isset($this->stateCode)?"": trim($this->stateCode);
		$paramsValueString .= !isset($this->countryCode)?"": trim($this->countryCode);
		$paramsValueString .= !isset($this->mobile)?"": trim($this->mobile);
		$paramsValueString .= !isset($this->phone)?"": trim($this->phone);
		$paramsValueString .= !isset($this->email)?"": trim($this->email);
		$paramsValueString .= !isset($this->fax)?"": trim($this->fax);
		return $paramsValueString;
	}
	
// 	public function getFirstName() {
// 		return $this->firstName;
// 	}

// 	public function setFirstName($firstName) {
// 		$this->firstName = $firstName;
// 	}

// 	public function getAddress1() {
// 		return $this->address1;
// 	}

// 	public function setAddress1($address1) {
// 		$this->address1 = $address1;
// 	}

// 	public function getAddress2() {
// 		return $this->address2;
// 	}

// 	public function setAddress2($address2) {
// 		$this->address2 = $address2;
// 	}

// 	public function getCity() {
// 		return $this->city;
// 	}

// 	public function setCity($city) {
// 		$this->city = $city;
// 	}

// 	public function getZipcode() {
// 		return $this->zipcode;
// 	}

// 	public function setZipcode($zipcode) {
// 		$this->zipcode = $zipcode;
// 	}

// 	public function getStateCode() {
// 		return $this->stateCode;
// 	}

// 	public function setStateCode($stateCode) {
// 		$this->stateCode = $stateCode;
// 	}

// 	public function getCountryCode() {
// 		return $this->countryCode;
// 	}

// 	public function setCountryCode($countryCode) {
// 		$this->countryCode = $countryCode;
// 	}

// 	public function getMobile() {
// 		return $this->mobile;
// 	}

// 	public function setMobile($mobile) {
// 		$this->mobile = $mobile;
// 	}

// 	public function getPhone() {
// 		return $this->phone;
// 	}

// 	public function setPhone($phone) {
// 		$this->phone = $phone;
// 	}

// 	public function getEmail() {
// 		return $this->email;
// 	}

// 	public function setEmail($email) {
// 		$this->email = $email;
// 	}

// 	public function getFax() {
// 		return $this->fax;
// 	}

// 	public function setFax($fax) {
// 		$this->fax = $fax;
// 	}
	
// 	public function getLastName() {
// 		return $this->lastName;
// 	}

// 	public function setLastName($lastName) {
// 		$this->lastName = $lastName;
// 	}
	


}
