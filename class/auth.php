<?php 
session_start();
ob_start(); 
if(!isset($_SESSION['SESS_FORMULA_APPS_ID']) || (trim($_SESSION['SESS_FORMULA_APPS_ID']) == '')) 
{
		$error_data[] = 'Login Session Expired Please Login';
		$error_flag = true;
		if($error_flag) 
		{
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: login.php");
			exit();
		}
}
$input_by=$_SESSION['SESS_FORMULA_APPS_ID'];
$input_datetime=date('Y-m-d');
include('db_Class.php');	
$obj = new db_class();
$formula_user=$_SESSION['SESS_FORMULA_APPS_NAME'];
$formula_id=$_SESSION['SESS_FORMULA_APPS_ID'];
?>