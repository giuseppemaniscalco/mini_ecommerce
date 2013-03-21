<?php
//
// Captcha
//  display image
//
// COPYRIGHT (c) exsys GbR Emden
// ALL RIGHTS RESERVED
//
define("_PHASE_DEF_URLIO_", true);
define("_PHASE_DEF_SESSION_", true);
define("_PHASE_DEF_ADODB_", true);
define("_PHASE_DEF_CAPTCHA_", true);

define("CMMP",true);

$bootPath = str_repeat("../", substr_count($_SERVER["PHP_SELF"],"/"))."cmmp";
require($bootPath."/libs/phase/p14init.inc.php");
require($bootPath."/libs/const.inc.php");

$captchaImage = new phase($bootPath."/libs/".CONFIGURATION_FILE);
$captchaImage->init();

$captchaImage->captcha->display_image();
?>
