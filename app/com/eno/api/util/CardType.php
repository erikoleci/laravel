<?php 
namespace com\eno\api\util;

/**
 * @author KR
 * @date July 18,2016
 */
interface CardType {

	const VISA = "1"; 
	const VISA_ELECTRON = "11";
	const DINERS_CLUB = "2";
	const CARTE_BLANCHE = "3";
	const EN_ROUTE = "4";
	const JCB = "5";
	const AMERICAN_EXPRESS = "6";
	const MASTER_CARD = "7";
	const MAESTRO = "77";
	const DISCOVER = "8";
	const UNIONPAY = "9";
}
