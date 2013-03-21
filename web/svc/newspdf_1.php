<?php 
/**
*	cmmp news subsystem (pdf-viewer)
*
*	Copyright (c) exsys GbR Emden
*	ALL RIGHTS RESERVED
*/


/**
*	Security flag
*/
define("CMMP",true);

$bootPath = str_repeat("../", substr_count($_SERVER["PHP_SELF"],"/"))."cmmp";

/**
*	phase14 active modules
*/
define("_PHASE_DEF_URLIO_", true);
define("_PHASE_DEF_SESSION_", true);
define("_PHASE_DEF_ADODB_", true);
define("_PHASE_DEF_SMARTY_", true);
define("_PHASE_DEF_SAFESQL_", true);
define("_PHASE_DEF_H2P_", true);
require($bootPath."/libs/phase/p14init.inc.php");


/**
*	cmmp related
*/
require($bootPath."/libs/const.inc.php");
require($bootPath."/libs/cmmp.class.php");
require($bootPath."/libs/event.class.php");
require($bootPath."/libs/cmmp.urlio.class.php");
require($bootPath."/libs/cmmp.smarty.class.php");
require($bootPath."/libs/status.class.php");
require($bootPath."/libs/services.class.php");
require($bootPath."/libs/user.class.php");
require($bootPath."/libs/iplock.class.php");
require($bootPath."/libs/order.class.php");
require($bootPath."/libs/lctext.class.php");
require($bootPath."/libs/permissions.class.php");
require($bootPath."/libs/derived/ud.cmmp.class.php");
require($bootPath."/libs/derived/ud.event.class.php");
require($bootPath."/libs/derived/ud.cmmp.urlio.class.php");
require($bootPath."/libs/derived/ud.cmmp.smarty.class.php");
require($bootPath."/libs/derived/ud.status.class.php");
require($bootPath."/libs/derived/ud.services.class.php");
require($bootPath."/libs/derived/ud.iplock.class.php");
require($bootPath."/libs/derived/ud.user.class.php");
require($bootPath."/libs/derived/ud.order.class.php");
require($bootPath."/libs/derived/ud.lctext.class.php");
require($bootPath."/libs/derived/ud.permissions.class.php");


/**
*	news related
*/
require($bootPath."/libs/subsys/news/program/xns.class.php");
require($bootPath."/libs/subsys/news/program/cmmp.news.class.php");


/**
*	setup cmmp
*/
$cmmp = new udCmmp($bootPath."/libs/".CONFIGURATION_FILE);
$cmmp->cfgData["SESSION"]["autostart"]=false;
$cmmp->init();
$cmmp->extend_phase_cfgData("Core");
$cmmp->extend_phase_cfgData("News");


/**
*	news
*/
$cmmpNews = new cmmpNews($cmmp);
$cmmpNews->set_media(true,$cmmp->services->readCfg("News.MediaDIR"),$cmmp->services->readCfg("News.MediaWWW"),"","");
$cmmpNews->set_tableNames("-,".PREFIX_TN."_news_category,".PREFIX_TN."_news_category_lc,".PREFIX_TN."_news_entry,".PREFIX_TN."_news_entry_lc,".TN_SESSIONS);
$cmmpNews->set_lang($cmmp->services->readCfg("Core.Language"));
$cmmpNews->set_caching(0);
$cmmpNews->set_urlParameterNames($cmmp->services->readCfg("News.UrlParameterNames"));
$cmmpNews->set_sessionParameterNames($cmmp->services->readCfg("News.SessionParameterNames"));
$cmmpNews->set_template_dir("admin/news/","public/news/","");
$cmmpNews->set_htmldoc($cmmp->services->readCfg("News.HTMLDoc"));
$cmmpNews->init();

$pnEID = $cmmpNews->get_urlParameterName("EID");
$entryID = $cmmp->urlio->get_param($pnEID,0);

$pnPDF = $cmmpNews->get_urlParameterName("PDF");
$pdfValue = $cmmp->urlio->get_param($pnPDF,0);

$cmmpNews->draw_news(0,0,0,$entryID,0,"",$pdfValue);
?>
