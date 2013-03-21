<?php
/**
*	cmmp css server service
*
*	Copyright (c) exsys GbR Emden
*	ALL RIGHTS RESERVED
*/
define("_PHASE_DEF_URLIO_", true);
define("_PHASE_DEF_SESSION_", true);
define("_PHASE_DEF_ADODB_", true);
define("_PHASE_DEF_SMARTY_", true);
define("_PHASE_DEF_SAFESQL_", true);
$bootPath = str_repeat("../", substr_count($_SERVER["PHP_SELF"],"/"))."cmmp";
require($bootPath."/libs/phase/p14init.inc.php");

define("CMMP",true);

require($bootPath."/libs/const.inc.php");
require($bootPath."/libs/cmmp.class.php");
require($bootPath."/libs/event.class.php");
require($bootPath."/libs/cmmp.smarty.class.php");
require($bootPath."/libs/cmmp.urlio.class.php");
require($bootPath."/libs/services.class.php");
require($bootPath."/libs/user.class.php");
require($bootPath."/libs/lctext.class.php");
require($bootPath."/libs/derived/ud.cmmp.class.php");
require($bootPath."/libs/derived/ud.event.class.php");
require($bootPath."/libs/derived/ud.cmmp.smarty.class.php");
require($bootPath."/libs/derived/ud.cmmp.urlio.class.php");
require($bootPath."/libs/derived/ud.services.class.php");
require($bootPath."/libs/derived/ud.user.class.php");
require($bootPath."/libs/derived/ud.lctext.class.php");


if (!function_exists('fnmatch')) {
	function fnmatch($pattern, $string) {
		return @preg_match(
			'/^' . strtr(addcslashes($pattern, '/\\.+^$(){}=!<>|'),
			array('*' => '.*', '?' => '.?')) . '$/i', $string
		);
	}
}


/**
*	Resolve browser-cap
*/
function get_browser_cap($phase,$services,$fileDir,$agent=NULL) {
	static $hu;
	if (!isset($hu)) {
		$agent = $agent ? $agent : $_SERVER['HTTP_USER_AGENT'];
		$yu = array();
		$q_s = array("#\.#","#\*#","#\?#");
		$q_r = array("\.",".*",".?");
		if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
			$brows = parse_ini_file($fileDir.$services->readCfg("Core.C4sBrowscapIni"), true, INI_SCANNER_RAW);
		} else{
			$brows = parse_ini_file($fileDir.$services->readCfg("Core.C4sBrowscapIni"), true);
		}
		foreach($brows as $k=>$t) {
			if (fnmatch($k,$agent)) {
				$yu['browser_name_pattern'] = $k;
				$pat = preg_replace($q_s,$q_r,$k);
				$yu['browser_name_regex'] = strtolower("^$pat$");
				foreach($brows as $g=>$r) {
					if ($t['Parent']==$g) {
						foreach($brows as $a=>$b) {
							if ($r['Parent']==$a) { 
								$yu = array_merge($yu,$b,$r,$t);
								foreach($yu as $d=>$z) {
									$l = strtolower($d);
									$hu[$l] = $z;
								}
							}
						}
					}
				}
				break;
			}
		}
	}
	return $hu;
}

$c4sPhase = new udCmmp($bootPath."/libs/".CONFIGURATION_FILE);
$c4sPhase->init_urlio();
$c4sPhase->init_adodb();
$c4sPhase->init_adodb_session();
$c4sPhase->init_session();
$c4sPhase->init_smarty();
$c4sPhase->init_safesql();
$c4sPhase->extend_phase_cfgData("Core");

$c4sServices = new udServices($c4sPhase);

$c4sPhase->smarty->left_delimiter = $c4sServices->readCfg("Core.C4sLeftDelimiter");
$c4sPhase->smarty->right_delimiter = $c4sServices->readCfg("Core.C4sRightDelimiter");

// BrowserCap Smarty vars
if (ini_get("browscap")) {
	$bc = get_browser(null,true);
} else {
	$bc = get_browser_cap($c4sPhase,$c4sServices,$bootPath."/libs/");
}
$c4sPhase->smarty->assign('BC_Browser',$bc["browser"]);
$c4sPhase->smarty->assign('BC_MajorVer',$bc["majorver"]);
$c4sPhase->smarty->assign('BC_MinorVer',$bc["minorver"]);
$c4sPhase->smarty->assign('BC_Platform',$bc["platform"]);

// InstallPath Smarty vars
if (INSTALL_PATH != "") {
	$c4sPhase->smarty->assign("InstallPath","/".INSTALL_PATH);
} else {
	$c4sPhase->smarty->assign("InstallPath","");
}

// mode public(p), admin(a), editor(e)
$mode = $c4sPhase->urlio->get_param("m","p");
switch ($mode) {
	case "p":{ $cfg="Core.C4sFilesPublic"; break; }
	case "a":{ $cfg="Core.C4sFilesAdmin"; break; }
	case "e":{ $cfg="Core.C4sFilesEditor"; break; }
	default: { $cfg="Core.C4sFilesPublic"; break; }
}

// css files
header("Content-Type: text/css");
$arCssFiles = explode("\r\n",trim($c4sServices->readCfg($cfg)));
for ($i=0;$i<count($arCssFiles);$i++) {
	$cssFile = @$c4sPhase->smarty->fetch('css/'.$arCssFiles[$i]);
	echo $cssFile;
}
?>
