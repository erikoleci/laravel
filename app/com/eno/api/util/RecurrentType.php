<?php 
namespace com\eno\api\util;

/**
 * @author KR
 * @date July 18,2016
 */
interface RecurrentType {
	const SINGLE = "1" ; //indicate that will not perform recurrent on current tx 
	const INITIAL_RECURRENT = "2"; //indicate that can perform recurrent on current tx in future
	const REPEATED_RECURRENT = "3";//indicate that performing recurrent on previous tx
}
