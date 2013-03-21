<?php

error_reporting(E_ERROR | E_PARSE );


/**
*	Run normal
*/
$handle = fopen($_SERVER['DOCUMENT_ROOT']."../cmmp/tmp/debugg.txt", "a+");
fwrite ($handle ,"TEST - COUPONS VON OM\n" );
fclose($handle);
$handle = fopen($_SERVER['DOCUMENT_ROOT']."../cmmp/tmp/debugg.txt", "a+");

require_once($_SERVER['DOCUMENT_ROOT']."../cmmp/libs/phase/core/adodb/adodb-exceptions.inc.php");
require($_SERVER['DOCUMENT_ROOT']."../cmmp/libs/phase/core/adodb/adodb.inc.php");

$db = NewADOConnection("mysqlt");
$db->Connect("127.0.0.1", "site1db5", "inkQwaXA", "site1db5");
//$db->Execute("set names 'utf8'");

/*
 * Created on 04.11.2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

ini_set('display_startup_errors', true);
ini_set('log_errors', 'On');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('ignore_repeated_errors', false);
ini_set('report_memleaks', true);
ini_set('warn_plus_overloading', true);
date_default_timezone_set('Europe/Berlin');

$path= $_SERVER['DOCUMENT_ROOT']."../cmmp/libs/subsys/om_connector/";
require_once($path . "xmlapi/Settings.php");
require_once($path . "xmlapi/data_objects/coupons/OM_Coupon.php");

$debugg = 1;
// data = XML-Struktur von OM_Coupon

$data = (isset($_POST["data"]) ? urldecode($_POST["data"]) : null);
if($debugg){
	$handle = fopen($_SERVER['DOCUMENT_ROOT']."../cmmp/tmp/debugg.txt", "a+");
	fwrite ($handle ,"[".date("Y-m-d H:i:s",time())."]:COUPONS VON OM\n" );
	fwrite ($handle ,$data."\n" );
}

ob_start();

if ($data != null) {
	try {
		$ar_data = array();
		$couponList = OM_Coupon::getCouponListFromXml($data);
		foreach($couponList as $newcoupon){
			$ar_data = array();
			$ar_data[0] = $db->qstr($newcoupon->getCouponCode());//$ids
			$ids = $newcoupon->getCouponCode();
			$ar_data[1] = 3; //$idTax
			$ar_data[2] =  $db->qstr(utf8_decode($newcoupon->getTitle())); // $designation
			$ar_data[3] = $db->qstr(date("Y-m-d",time())); //$buydate
			if ($newcoupon->getEndDateTimestamp()){
				$ar_data[4] =  $db->qstr(date("Y-m-d",$newcoupon->getEndDateTimestamp()));//$expirdate
			}else{
				$ar_data[4] =  $db->qstr("0000-00-00"); //$expirdate
			}
			$ar_data[5] = $newcoupon->getBaseValue();//$starValue
			$ar_data[6] = $newcoupon->getEffectValue(); //$currentValue
			$ar_data[7] = $newcoupon->getIsMultipleUse(); //$unchange
			$ar_data[8] = $newcoupon->getIsUnique();//$cmpaign
			$ar_data[9] = 0;//$orderCount
			$ar_data[10] = 1; //$verified
			$ar_data[11] = $db->qstr("Created by OM 2");//$drawLog
			$ar_data[12] = $db->qstr("");//$recipientLog
			$ar_data[13] = 0;//$in_progess
			$ar_data[14] = $db->qstr("");//$session_key
			$ar_data[15] = 0;//$userbuyId
			$typCode = $newcoupon->getTypeCode();
			switch ($typCode){
				case Settings::MYMUESLI_PRODUCT_TYPE_CODE_COUPON_PAY:{$coupontyp = 0;break;}
				case Settings::MYMUESLI_PRODUCT_TYPE_CODE_COUPON_FREE_MIX:{$coupontyp = 2;break;}
				case Settings::MYMUESLI_PRODUCT_TYPE_CODE_COUPON_PRESENT:{$coupontyp = 3;break;}
				case Settings::MYMUESLI_PRODUCT_TYPE_CODE_COUPON_X_FOR_Y:{$coupontyp = 4;break;}
				case Settings::MYMUESLI_PRODUCT_TYPE_CODE_COUPON_DISCOUNT_AMOUNT:{$coupontyp = 2; $ar_data[1] = 2; break;}
				case Settings::MYMUESLI_PRODUCT_TYPE_CODE_COUPON_DISCOUNT_PERCENT:{$coupontyp = 1; $ar_data[1] = 2; break;}
				//case Settings::MYMUESLI_PRODUCT_TYPE_CODE_COUPON_TYPE_7:{$coupontyp = 7;break;}
				case Settings::MYMUESLI_PRODUCT_TYPE_CODE_COUPON_SERVICE:{$coupontyp = 0;$ar_data[1] = 2; break;}
				case Settings::MYMUESLI_PRODUCT_TYPE_CODE_COUPON_AMOUNT:{$coupontyp = 0;break;}
				default: {$coupontyp = 0; break;}			
			}
			$ar_data[16] = $coupontyp; //$coupontyp
			$ar_data[17] = $db->qstr("de"); //$Content LC
			
			

			if($debugg){
				$test = "";		
				foreach ($ar_data as $data_str){
					$test = $test." , ".$data_str;
				}
				fwrite ($handle ,$test."\n" );
			}
//			$sql = "INSERT INTO cmmp__mm_coupon_active SET IDS=%s,ID_TAX=%d,DESIGNATION=%s,BUY_DATE=%s,";
			$sql = "INSERT INTO cmmp__coupon_active SET IDS=%s,ID_TAX=%d,DESIGNATION=%s,BUY_DATE=%s,";
			$sql = $sql."EXPIRY_DATE=%s,ORIGINAL_VALUE=%f,CURRENT_VALUE=%f,UNCHANGEABLE_VALUE=%d,";
			$sql = $sql."CAMPAIGN_FLAG=%d,ORDER_COUNT=%d,VERIFIED=%d,DRAWER_LOG=%s,";
			$sql = $sql."RECIPIENT_LOG=%s,IN_PROGRESS=%d,SESSKEY=%s,COUPON_TYP=%d,CONTENT_LC=%s";
//			$sql = $sql."RECIPIENT_LOG=%s,IN_PROGRESS=%d,SESSKEY=%s,USER_BUY_ID=%d,COUPON_TYPE=%d";
			$safsql = sprintf($sql,$ar_data[0],$ar_data[1],$ar_data[2],$ar_data[3],$ar_data[4],$ar_data[5],$ar_data[6],$ar_data[7],$ar_data[8],
								$ar_data[9],$ar_data[10],$ar_data[11],$ar_data[12],$ar_data[13],$ar_data[14],$ar_data[16],$ar_data[17]);
//								$ar_data[9],$ar_data[10],$ar_data[11],$ar_data[12],$ar_data[13],$ar_data[14],$ar_data[15],$ar_data[16]);
			if($debugg){
				fwrite ($handle ,$safsql."\n" );
			}
			$db->Execute($safsql);
		}
	}
	catch (Exception $e) {
		if($debugg===0){
			$handle = fopen($_SERVER['DOCUMENT_ROOT']."../cmmp/tmp/debugg.txt", "a+");
			fwrite ($handle ,"[".date("Y-m-d H:i:s",time())."]:COUPONS VON OM\n".$e."\n" );
		}
		fwrite ($handle ,$e);
		if($debugg===0){
			fclose($handle);	
		}
		$couponList = null;
	}


}

ob_end_flush();
if($debugg){
	fclose($handle);	
} 
?>
