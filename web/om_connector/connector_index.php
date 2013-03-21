<?php
try{
	ini_set('error_reporting', E_ALL);
	$path_om_connector = $_SERVER['DOCUMENT_ROOT']."../cmmp/libs/subsys/om_connector/";
	require_once($path_om_connector."program/om_recaller.class.php");

	$connect = new OmRecaller(true);
	$connect->execute();


}catch(Exception $e){
	echo($e);
}



?>