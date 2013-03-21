<?php
//
// eXtended Email Distributor
//  check project syntax
//
// COPYRIGHT (c) exsys GbR Emden
// ALL RIGHTS RESERVED
//
define("_PHASE_DEF_URLIO_", true);
define("_PHASE_DEF_ADODB_", true);
define("_PHASE_DEF_SMARTY_", true);
define("_PHASE_DEF_SAFESQL_", true);
define("_PHASE_DEF_DBLISTER_", true);
define("_PHASE_DEF_PAGER_", true);

define("CMMP",true);

$bootPath = str_repeat("../", substr_count($_SERVER["PHP_SELF"],"/"))."cmmp";
require($bootPath."/libs/phase/p14init.inc.php");
require($bootPath."/libs/subsys/newsletter/program/newsletterboot.inc.php");
require($bootPath."/libs/const.inc.php");
require($bootPath."/libs/cmmp.class.php");
require($bootPath."/libs/cmmp.smarty.class.php");
require($bootPath."/libs/cmmp.urlio.class.php");
require($bootPath."/libs/iplock.class.php");
require($bootPath."/libs/event.class.php");
require($bootPath."/libs/services.class.php");
require($bootPath."/libs/user.class.php");
require($bootPath."/libs/lctext.class.php");
require($bootPath."/libs/permissions.class.php");
require($bootPath."/libs/derived/ud.cmmp.class.php");
require($bootPath."/libs/derived/ud.cmmp.smarty.class.php");
require($bootPath."/libs/derived/ud.cmmp.urlio.class.php");
require($bootPath."/libs/derived/ud.iplock.class.php");
require($bootPath."/libs/derived/ud.event.class.php");
require($bootPath."/libs/derived/ud.services.class.php");
require($bootPath."/libs/derived/ud.user.class.php");
require($bootPath."/libs/derived/ud.lctext.class.php");
require($bootPath."/libs/derived/ud.permissions.class.php");

$myPhase = new udCmmp($bootPath."/libs/".CONFIGURATION_FILE);
$myPhase->init_urlio();
$myPhase->init_adodb();
$myPhase->init_smarty();
$myPhase->init_services();
$myPhase->init_permissions();

$myNewsletter = new cmmpNewsletter($myPhase);
$myNewsletter->init_subsystem();

//$pid = $myPhase->urlio->get_param($myNewsletter->get_urlParameterName("PID"),0);
$pid= $_GET["pid28"];
if (!$pid) return;

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">';
echo '<html>';
echo '<head>';
echo '<link rel="STYLESHEET" type="text/css" href="/svc/c4s.php?m=a">';
echo '</head>';
echo '<body>';

echo '<table border="0" width="500" cellpadding="0" cellspacing="0" class="ex_DefaultTable">';
echo '<tr><td>';

// SYNTAX_OK = 0
$myNewsletter->set_project_syntaxok($pid,0);
echo '<div id="textSyntaxOk"><span class="ex_WarningSymbol ex_ErrorColor">Projekt enth&auml;lt Smarty-Syntax-Fehler.</span></div>';

try {
	// Fehler provozieren
	$subject = @$myPhase->smarty->fetch("admin/newsletter/content/".$pid."s.tpl");
	$body = @$myPhase->smarty->fetch("admin/newsletter/content/".$pid."b.tpl");

	// SYNTAX_OK = 1
	$myNewsletter->set_project_syntaxok($pid,1);
	echo '
	<script language="JavaScript">
	document.getElementById("textSyntaxOk").innerHTML = \'<span class="ex_OkSymbol ex_OkColor">Projekt enth&auml;lt keine Smarty-Syntax-Fehler.</span>\';
	</script>
	';

	echo '</td></tr></table>';

	echo '</body>';
	echo '</html>';

} catch (exception $e) {
}

?>
