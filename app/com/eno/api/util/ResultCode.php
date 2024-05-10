<?php 
namespace com\eno\api\util;

/**
 * @author KR
 * @date July 18,2016
 */
interface ResultCode {

	const THREE_D_ENROLLED = "-2";//"Transaction has 3D enrolled or checking for 3D enrollment. Redirect to issuer for 3D authentication."),
	const PROCESSING = "-1";//,"Transaction is in process."),
	const FAILED = "0"; //,"Transaction failed."),
	const COMPLETED = "1"; //,"Transaction completed successfully."),
	const PENDING = "2"; //,"Transaction was successfully received and is now queued for transmittion to the provider."),
	const CREATED = "3"; //,"Transaction created successfully."),
	const CANCELLED = "4";//,"Transaction cancelled."),
	const EXPIRED = "5"; //,"Transaction expired."),
	const INCOMPLETE = "6"; //,"Transaction is incomplete."),
}
