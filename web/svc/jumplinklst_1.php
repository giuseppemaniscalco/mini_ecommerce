<?php
/**
*	jumplink tinymce link list
*
*	Copyright (c) exsys GbR Emden
*	ALL RIGHTS RESERVED
*/
define("_PHASE_DEF_URLIO_", true);
define("_PHASE_DEF_SESSION_", true);
define("_PHASE_DEF_ADODB_", true);
define("_PHASE_DEF_SMARTY_", true);
define("_PHASE_DEF_SAFESQL_", true);
define("_PHASE_DEF_SYSLOGGER_", true);

$bootPath = str_repeat("../", substr_count($_SERVER["PHP_SELF"],"/"))."cmmp";
require($bootPath."/libs/phase/p14init.inc.php");

define("CMMP",true);

require($bootPath."/libs/const.inc.php");
require($bootPath."/libs/cmmp.class.php");
require($bootPath."/libs/cmmp.smarty.class.php");
require($bootPath."/libs/cmmp.urlio.class.php");
require($bootPath."/libs/iplock.class.php");
require($bootPath."/libs/services.class.php");
require($bootPath."/libs/user.class.php");
require($bootPath."/libs/event.class.php");
require($bootPath."/libs/status.class.php");
require($bootPath."/libs/order.class.php");
require($bootPath."/libs/lctext.class.php");
require($bootPath."/libs/permissions.class.php");
require($bootPath."/libs/derived/ud.cmmp.class.php");
require($bootPath."/libs/derived/ud.cmmp.smarty.class.php");
require($bootPath."/libs/derived/ud.cmmp.urlio.class.php");
require($bootPath."/libs/derived/ud.iplock.class.php");
require($bootPath."/libs/derived/ud.services.class.php");
require($bootPath."/libs/derived/ud.user.class.php");
require($bootPath."/libs/derived/ud.event.class.php");
require($bootPath."/libs/derived/ud.status.class.php");
require($bootPath."/libs/derived/ud.order.class.php");
require($bootPath."/libs/derived/ud.lctext.class.php");
require($bootPath."/libs/derived/ud.permissions.class.php");

$myCmmp = new udCmmp($bootPath."/libs/".CONFIGURATION_FILE);
$myCmmp->init();
//new
$myCmmp->cfgData["URLIO"]["mode"] = 0;
$myCmmp->extend_phase_cfgData("Media");
//new

if ($_SESSION["LOGINID"] == 0) {
	die("");
}

/**
*	=========================================================================================
*/

/**
*
*/
function fetch_jumplinks($cmmp) {
	$cnt = 0;
	$resReal=array();		// Realwert
	$resInfo=array();		// Infowert

	$installPath = INSTALL_PATH;
	if ($installPath) $installPath = "/".$installPath;

	$sql = "SELECT * FROM ".PREFIX_TN."_jumplink WHERE JUMP_PARAMETER<>'' ORDER BY DESIGNATION";
	$rs = $cmmp->adodb->Execute($sql);
	while (!$rs->EOF) {
		$resReal[$cnt] = $installPath."/".INDEX_PUBLIC."?".UPN_VIEW."=jumplink&".UPN_EXEC."=".$rs->fields("DESIGNATION").'{$SessionParticulars}';
		$resInfo[$cnt] = "JL - ".$rs->fields("DESIGNATION");
		$cnt++;
		$rs->MoveNext();
	}
	$rs->Close();

	return array($resReal,$resInfo);
}


/**
*	=========================================================================================
*/


//new
function read_dir($dir) {
   $array = array();
   $d = dir($dir);
   while (false !== ($entry = $d->read())) {
       if($entry!='.' && $entry!='..') {
           $entry = $dir.'/'.$entry;
           if(is_dir($entry)) {
               $array[] = $entry;
               $array = array_merge($array, read_dir($entry));
           }
       }
   }
   $d->close();
   return $array;
}


/**
*
*/
function fetch_file_selector($dirRead,$dirWrite,$filefilter,$realPrefix) {

	$arDir = read_dir($dirRead);
	if (!count($arDir)) {
		$arDir[0] = $dirRead;
	} else {
		$arDir = array_merge($arDir,array($dirRead));
	}
	sort($arDir,SORT_STRING);	

	$cnt = 0;
	$resReal=array();		// Realwert
	$resInfo=array();		// Infowert

	for ($i=0;$i<count($arDir);$i++) {
		if (substr($arDir[$i],strlen($dirRead)+1)) {
		$resReal[$cnt] = "";
		$resInfo[$cnt] = substr($arDir[$i],strlen($dirRead)+1);
			$cnt++;
		}
		$dirGlob = glob($arDir[$i]."/".$filefilter);
		if (is_array($dirGlob) && count($dirGlob) > 0) {
			foreach ($dirGlob as $filename) {
				$tmpPath = $dirWrite.substr($filename,strlen($dirRead));
				$resReal[$cnt] = $realPrefix.$tmpPath;
				$resInfo[$cnt] = substr($filename,strlen($dirRead)+1);
				$cnt++;
			}
		}
	}

	return array($resReal,$resInfo);
}




$services = new udServices($myCmmp);

$prefixMedia = $myCmmp->cfgData["URLIO"]["server_url"];
if (INSTALL_PATH != "") $prefixMedia.="/".INSTALL_PATH;

$pathMedia = "../".$services->readCfg("Media.Path");
$urlMedia = "/".$services->readCfg("Media.Path");

/**
*	=========================================================================================
*/

$dirRead = $pathMedia;
$dirWrite = $urlMedia;
$ar_media = fetch_file_selector($dirRead,$dirWrite,"*.*",$prefixMedia);
//new

$output = '';
$delimiter = "\n";
$output .= 'var tinyMCELinkList = new Array(';

$ar = fetch_jumplinks($myCmmp);

for ($i=0;$i<count($ar[0]);$i++) {
	$output .= $delimiter
			. '["'
			. utf8_encode($ar[1][$i])
			. '", "'
			. utf8_encode($ar[0][$i])
			. '"],';
}

//new
for ($i=0;$i<count($ar_media[0]);$i++) {
	$output .= $delimiter
			. '["'
			. utf8_encode($ar_media[1][$i])
			. '", "'
			. utf8_encode($ar_media[0][$i])
			. '"],';
}
//new

$output = substr($output, 0, -1);
$output .= $delimiter;
$output .= ');';

header('Content-type: text/javascript');
echo $output;
?>
