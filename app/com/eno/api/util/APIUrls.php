<?php 
namespace com\eno\api\util;

/**
 * @author KR
 * @date July 18,2016
 */
interface APIUrls {

	const SERVER_PURCHASE = "/FE/rest/tx/sync/purchase";
	const WEB_PURCHASE = "/FE/rest/tx/purchase/w/execute";
	const SERVER_AUTHORIZATION = "/FE/rest/tx/sync/authorization";
	const WEB_AUTHORIZATION = "/FE/rest/tx/authorization/w/execute";

	const CREDIT_FUND = "/FE/rest/tx/sync/creditFund";
	const REF_CREDIT_FUND = "/FE/rest/tx/sync/refCreditFund";
	const ORIGINAL_CREDIT_FUND = "/FE/rest/tx/sync/originalCredit";
	const REF_ORIGINAL_CREDIT_FUND = "/FE/rest/tx/sync/refOriginalCredit";

	
	const CAPTURE = "/FE/rest/tx/sync/capture";
	const REFUND = "/FE/rest/tx/sync/refund";
	const REVERSE = "/FE/rest/tx/sync/reverse";
	const RECURRENT = "/FE/rest/tx/sync/recurrent";
	
	const GET_TX_DETAIL = "/FE/rest/tx/getDetail";
	const SEARCH_TX = "/FE/rest/tx/advanceSearch";
	const GET_TX_STATUS = "/FE/rest/tx/getStatus";
}
