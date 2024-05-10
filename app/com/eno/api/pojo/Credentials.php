<?php
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class Credentials
{
	private $env;
	private $domain;
	private $accountKey;
	private $mId;
	private $maId;
	private $userName;
	private $password;
	
	public function __construct($env,$domain, $accountKey, $mId, $maId, $userName,
			$password)
	{
		$this->env = $env;
		$this->domain = $domain;
		$this->accountKey = $accountKey;
		$this->mId = $mId;
		$this->maId = $maId;
		$this->userName = $userName;
		$this->password = $password;
	}
	
	public function getEnv() {
		return $this->env;
	}
	
	public function getDomain() {
		return $this->domain;
	}
	
	public function getAccountKey() {
		return $this->accountKey;
	}

	public function getmId() {
		return $this->mId;
	}

	public function getMaId() {
		return $this->maId;
	}

	public function getUserName() {
		return $this->userName;
	}

	public function getPassword() {
		return $this->password;
	} 
}