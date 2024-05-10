<?php 

namespace com\eno\api\pojo;


/**
 * @author krunal
 * @date Oct 19, 2016
 */
class TxOrder extends POJOBase {

	public $amtCurrencyCode;
	public $invoiceNo;
	public $invoiceDate;
	public $mctAddCity;
	public $mctAddCountry;
	public $mctAddLine1;
	public $mctAddLine2;
	public $mctAddState;
	public $mctAddZipcode;
	public $mctBusinessName;
	public $mctEmail;
	public $mctFirstName;
	public $mctLastName;
	public $mctMemo;
	public $mctPhone;
	public $note;
	public $status; //DRAFT, SENT, PAID, CANCELLED, PAYMENT_PENDING
	public $totalDiscountAmt;
	public $totalGrossAmt;
	public $totalNetAmtTaxInc;
	public $totalShippingAmt;
	public $orderItems;//array
	

}