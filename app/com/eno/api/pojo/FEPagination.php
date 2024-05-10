<?php 
namespace com\eno\api\pojo;

/**
 * @author KR
 * @date July 12,2016
 */
class FEPagination extends POJOBase {
	const DEFAULT_COUNT = 10;
	const MAXIMUM_COUNT = 50;
    const DEFAULT_INDEX = 0;
    const MAXIMUM_COUNT_FOR_FILE_DOWNLOAD = 65000;
	public $count;//Number of items to return.Default - 10 . Maximum - 50
	public $startIndex;//Start index of item from number of  items returned as per 'count' field.
	
	//THIS FIELD USED ONLY IN RESPONSE.
	public $totalCount;//Total number items exist in database.
	
	public function __construct()
	{
		$count = FEPagination::DEFAULT_COUNT;
		$startIndex = FEPagination::DEFAULT_INDEX;
	}
	
// 	public function getCount() {
// 		return $this->count;
// 	}
// 	public function setCount($count) {
// 		$this->count = $count;
// 	}
// 	public function getStartIndex() {
// 		return $this->startIndex;
// 	}
// 	public function setStartIndex($startIndex) {
// 		$this->startIndex = $startIndex;
// 	}
// 	public function getTotalCount() {
// 		return $this->totalCount;
// 	}
// 	public function setTotalCount($totalCount) {
// 		$this->totalCount = $totalCount;
// 	}

}
