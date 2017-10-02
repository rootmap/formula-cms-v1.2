<?php 
session_start();
include_once ('plugin/plugin.php');
$plugin = new cmsPlugin();
$id=$_SESSION['SESS_FORMULA_APPS_ID'];
if($id==!"")
{
	unset($_SESSION['SESS_FORMULA_APPS_ID']);
	unset($_SESSION['SESS_FORMULA_APPS_NAME']);
	$plugin->Error("Account Has Been logged Out","login.php");
}
else
{
	unset($_SESSION['SESS_FORMULA_APPS_ID']);
	unset($_SESSION['SESS_FORMULA_APPS_NAME']);
	$plugin->Error("Account Has Been logged Out","login.php");
}
?>