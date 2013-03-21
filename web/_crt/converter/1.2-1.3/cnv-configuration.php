<?php
/**
*	Configuration converter, v1.2 to v1.3
*/

function PHASEMODULES(){foreach(func_get_args()as$c)define($c,true);}
PHASEMODULES(
			_PHASE_DEF_URLIO_,
			_PHASE_DEF_ADODB_
		  );
require('../../../../libs/phase/p14init.inc.php');

$phase = new phase("../../../../libs/cmmp.cfg.php");
$phase->init();

if ($phase->urlio->get_param("run",0) == 0) {
	echo "PLEASE NOTE:<br>";
	echo "Create fields IDS (Varchar255)<br>";
	die("run with run=1");
}

// 1
echo "convert configuration...<br>";
$rs = $phase->adodb->Execute("SELECT * FROM cmmp_configuration");
while (!$rs->EOF) {
	$id = $rs->fields("ID");
	$subsystem = $rs->fields("SUBSYSTEM");
	$name = $rs->fields("NAME");
	echo "subsystem:".$subsystem." name:".$name."<br>";
	$sql = "UPDATE cmmp_configuration SET IDS='".$subsystem.".".$name."' WHERE ID=".$id;
	$phase->adodb->Execute($sql);
	$rs->MoveNext();
}
$rs->Close();

// 2
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='News.EppEdit' WHERE IDS='News.EppNewsEdit'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='News.EppNormal' WHERE IDS='News.EppNewsNormal'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='News.EntryDateDetails' WHERE IDS='News.NewsEntryDateDetails'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='News.HTMLDoc' WHERE IDS='News.NewsHTMLDoc'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='News.MediaDIR' WHERE IDS='News.NewsMediaDIR'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='News.MediaWWW' WHERE IDS='News.NewsMediaWWW'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='News.PDFFile' WHERE IDS='News.NewsPDFFile'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='News.SessionParameterNames' WHERE IDS='News.NewsSessionParameterNames'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='News.UrlParameterNames' WHERE IDS='News.NewsUrlParameterNames'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.Bcc' WHERE IDS='EMail.EMailBcc'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.BccName' WHERE IDS='EMail.EMailBccName'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.From' WHERE IDS='EMail.EMailFrom'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.FromName' WHERE IDS='EMail.EMailFromName'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.SmtpAuth' WHERE IDS='EMail.EMailSmtpAuth'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.SmtpHost' WHERE IDS='EMail.EMailSmtpHost'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.SmtpPass' WHERE IDS='EMail.EMailSmtpPass'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.SmtpUse' WHERE IDS='EMail.EMailSmtpUse'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.SmtpUser' WHERE IDS='EMail.EMailSmtpUser'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='EMail.Wordwrap' WHERE IDS='EMail.EMailWordwrap'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Favorite.AnonymousPost' WHERE IDS='Favorite.FavoriteAnonymousPost'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Favorite.ImageHeight' WHERE IDS='Favorite.FavoriteImageHeight'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Favorite.ImageWidth' WHERE IDS='Favorite.FavoriteImageWidth'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Coupon.AutoVerified' WHERE IDS='Coupon.CouponAutoVerified'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Coupon.ClearOldActive' WHERE IDS='Coupon.CouponClearOldActive'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Coupon.DraftReserveCount' WHERE IDS='Coupon.CouponDraftReserveCount'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Coupon.FNCreateID' WHERE IDS='Coupon.CouponFNCreateID'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Coupon.Period' WHERE IDS='Coupon.CouponPeriod'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Coupon.TaxID' WHERE IDS='Coupon.CouponTaxID'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Contact.EMailFrom' WHERE IDS='Contact.ContactEMailFrom'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Contact.EMailFromName' WHERE IDS='Contact.ContactEMailFromName'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Contact.EMailSubject' WHERE IDS='Contact.ContactEMailSubject'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Contact.SelectDesc' WHERE IDS='Contact.ContactSelectDesc'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Contact.SelectEmail' WHERE IDS='Contact.ContactSelectEmail'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Contact.SelectTemplate' WHERE IDS='Contact.ContactSelectTemplate'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Media.MaxDirectorysize' WHERE IDS='Media.MediaMaxDirectorysize'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Media.MaxFilesize' WHERE IDS='Media.MediaMaxFilesize'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Media.Path' WHERE IDS='Media.MediaPath'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Menu.MediaPath' WHERE IDS='Menu.MenuMediaPath'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.EppEMail' WHERE IDS='Newsletter.EppNewsletterEMail'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.EppProject' WHERE IDS='Newsletter.EppNewsletterProject'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ContentDIR' WHERE IDS='Newsletter.NewsletterContentDIR'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.EMailsPerBulk' WHERE IDS='Newsletter.NewsletterEMailsPerBulk'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.From' WHERE IDS='Newsletter.NewsletterFrom'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.FromName' WHERE IDS='Newsletter.NewsletterFromName'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.MaxDirSize' WHERE IDS='Newsletter.NewsletterMaxDirSize'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.MaxFileSize' WHERE IDS='Newsletter.NewsletterMaxFileSize'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.MediaDIR' WHERE IDS='Newsletter.NewsletterMediaDIR'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.MediaWWW' WHERE IDS='Newsletter.NewsletterMediaWWW'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.Ready' WHERE IDS='Newsletter.NewsletterReady'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ReadyName' WHERE IDS='Newsletter.NewsletterReadyName'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.RegisterkeyTTL' WHERE IDS='Newsletter.NewsletterRegisterkeyTTL'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.RemoveUrl' WHERE IDS='Newsletter.NewsletterRemoveUrl'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ReturnHost' WHERE IDS='Newsletter.NewsletterReturnHost'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ReturnPass' WHERE IDS='Newsletter.NewsletterReturnPass'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ReturnPath' WHERE IDS='Newsletter.NewsletterReturnPath'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ReturnUser' WHERE IDS='Newsletter.NewsletterReturnUser'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.SessionParameterNames' WHERE IDS='Newsletter.NewsletterSessionParameterNames'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ThresholdClear' WHERE IDS='Newsletter.NewsletterThresholdClear'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ThresholdDME' WHERE IDS='Newsletter.NewsletterThresholdDME'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ThresholdMBE' WHERE IDS='Newsletter.NewsletterThresholdMBE'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.ThresholdMBF' WHERE IDS='Newsletter.NewsletterThresholdMBF'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.UrlParameterNames' WHERE IDS='Newsletter.NewsletterUrlParameterNames'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.XRDocRoot' WHERE IDS='Newsletter.NewsletterXRDocRoot'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.XRExec' WHERE IDS='Newsletter.NewsletterXRExec'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Newsletter.XRSleep' WHERE IDS='Newsletter.NewsletterXRSleep'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Product.MediaPath' WHERE IDS='Product.ProductMediaPath'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Seca.CountLinkFriends' WHERE IDS='Seca.SecaCountLinkFriends'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Seca.DynamicSitemap' WHERE IDS='Seca.SecaDynamicSitemap'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Seca.JSCaller' WHERE IDS='Seca.SecaJSCaller'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Seca.StandardText' WHERE IDS='Seca.SecaStandardText'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Seca.StaticPath' WHERE IDS='Seca.SecaStaticPath'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Seca.StaticSitemap' WHERE IDS='Seca.SecaStaticSitemap'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Seca.SubsysDef' WHERE IDS='Seca.SecaSubsysDef'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Search.EppList' WHERE IDS='Search.EppSearchList'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Search.CacheTTL' WHERE IDS='Search.SearchCacheTTL'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Search.ImageWidth' WHERE IDS='Search.SearchImageWidth'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Search.LogicWords' WHERE IDS='Search.SearchLogicWords'");
$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Search.Sources' WHERE IDS='Search.SearchSources'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Webalizer.Url' WHERE IDS='Webalizer.WebalizerUrl'");

$phase->adodb->Execute("UPDATE cmmp_configuration SET IDS='Allocator.Subject' WHERE IDS='Allocator.AllocatorSubject'");

echo "<br><br>done.";

echo "<br><br>";
echo "PLEASE NOTE:<br>";
echo "Delete ID and Primarykey<br>";
echo "Add Primarykey for IDS<br>";
echo "Delete field SUBSYSTEM<br>";
echo "Delete field NAME";

?>
