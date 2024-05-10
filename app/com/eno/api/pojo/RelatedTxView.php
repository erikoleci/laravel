<?php 

namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class RelatedTxView extends POJOBase
{
	public $id;
	public $txType;
	public $txTypeId;
	public $recurrentType;
	public $recurrentTypeId;
	public $parentTxId;
	public $txResultId;
	public $txResult;
	public $createTime;
	public $finishTime;
	public $amount;//processing amount FEAmount
	public $sourceAmount;//FEAmount
	public $requestId;

// 	public function getId() {
// 		return $this->id;
// 	}
// 	public function setId($id) {
// 		$this->id = $id;
// 	}
// 	public function getTxType() {
// 		return $this->txType;
// 	}
// 	public function setTxType($txType) {
// 		$this->txType = $txType;
// 	}
// 	public function getTxTypeId() {
// 		return $this->txTypeId;
// 	}
// 	public function setTxTypeId($txTypeId) {
// 		$this->txTypeId = $txTypeId;
// 	}
// 	public function getParentTxId() {
// 		return $this->parentTxId;
// 	}
// 	public function setParentTxId($parentTxId) {
// 		$this->parentTxId = $parentTxId;
// 	}
// 	public function getTxResultId() {
// 		return $this->txResultId;
// 	}
// 	public function setTxResultId($txResultId) {
// 		$this->txResultId = $txResultId;
// 	}
// 	public function getTxResult() {
// 		return $this->txResult;
// 	}
// 	public function setTxResult($txResult) {
// 		$this->txResult = $txResult;
// 	}
// 	public function getAmount() {//FEAmount
// 		return $this->amount;
// 	}
// 	public function setAmount( $txAmount) {//FEAmount
// 		$this->amount = $txAmount;
// 	}

// 	public function getCreateTime() {
// 		return $this->createTime;
// 	}
// 	public function setCreateTime($createTime) {
// 		$this->createTime = $createTime;
// 	}
// 	public function getFinishTime() {
// 		return $this->finishTime;
// 	}
// 	public function setFinishTime($finishTime) {
// 		$this->finishTime = $finishTime;
// 	}

// 	public function getRecurrentType() {
// 		return $this->recurrentType;
// 	}

// 	public function setRecurrentType($recurrentType) {
// 		$this->recurrentType = $recurrentType;
// 	}

// 	public function getRecurrentTypeId() {
// 		return $this->recurrentTypeId;
// 	}

// 	public function setRecurrentTypeId($recurrentTypeId) {
// 		$this->recurrentTypeId = $recurrentTypeId;
// 	}

// 	public function getSourceAmount() {//FEAmount
// 		return $this->sourceAmount;
// 	}

// 	public function setSourceAmount( $sourceAmount) {//FEAmount
// 		$this->sourceAmount = $sourceAmount;
// 	}

// 	public function getRequestId() {
// 		return $this->requestId;
// 	}

// 	public function setRequestId($requestId) {
// 		$this->requestId = $requestId;
// 	}
}
