<?php
/**
*	User password converter, v1.1 to v1.2
*/

function PHASEMODULES(){foreach(func_get_args()as$c)define($c,true);}
PHASEMODULES(
			_PHASE_DEF_URLIO_,
			_PHASE_DEF_ADODB_
		  );
require('../../../libs/phase/p14init.inc.php');

$phase = new phase("../../../libs/cmmp.cfg.php");
$phase->init();

if ($phase->urlio->get_param("run",0) == 0) {
	die("run with run=1");
}

echo "convert cmmp_users...<br>";
$rs = $phase->adodb->Execute("SELECT * FROM cmmp_users");
while (!$rs->EOF) {
	$id = $rs->fields("ID");
	$pwd = sha1($rs->fields("LOGIN_PASSWORD"));
	echo "id:".$id." pwd:".$pwd."<br>";
	$sql = "UPDATE cmmp_users SET LOGIN_PASSWORD='".$pwd."' WHERE ID=".$id;
	$phase->adodb->Execute($sql);
	$rs->MoveNext();
}
$rs->Close();

echo "<br>convert cmmp_users_register...";
$rs = $phase->adodb->Execute("SELECT * FROM cmmp_users_register");
while (!$rs->EOF) {
	$id = $rs->fields("ID");
	$pwd = sha1($rs->fields("LOGIN_PASSWORD"));
	echo "id:".$id." pwd:".$pwd."<br>";
	$sql = "UPDATE cmmp_users_register SET LOGIN_PASSWORD='".$pwd."' WHERE ID=".$id;
	$phase->adodb->Execute($sql);
	$rs->MoveNext();
}
$rs->Close();

echo "<br><br>done.";

?>
