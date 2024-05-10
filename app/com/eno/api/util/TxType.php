<?php 
namespace com\eno\api\util;

/**
 * @author KR
 * @date July 18,2016
 */
interface TxType {

	const AUTHORIZATION = "1";
	const CAPTURE = "2";
	const PURCHASE = "3";
	const REVERSAL = "4";
	const REFUND = "5";
	const CREDIT_FUND = "6";
	const REFERRAL_CREDIT_FUND = "7";
	const ORIGINAL_CREDIT = "8";
	const REFERRAL_ORIGINAL_CREDIT = "9";
	const CHARGEBACK = "10";
}
