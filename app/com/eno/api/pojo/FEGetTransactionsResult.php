<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEGetTransactionsResult extends FEResponse{
	
	public $pagination;
	public $transactions;//List<MerchantTxView>

// 	public function getPagination() {
// 		return $this->pagination;
// 	}

// 	public function setPagination($pagination) {
// 		$this->pagination = $pagination;
// 	}

// 	public function getTransactions() {
// 		return $this->transactions;
// 	}

// 	public function setTransactions($transactions) {
// 		$this->transactions = $transactions;
// 	}

}
