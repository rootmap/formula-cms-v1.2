<?php 
session_start();
include_once ('db_Class.php');
$obj = new db_class();
$id=$_SESSION['SESS_AMSIT_APPS_ID'];
if($id==!"")
{
    
    $obj->insert("loginfo",array("detail"=>"Admin Panel Logged out by ".$_SESSION['SESS_AMSIT_EMP_NAME'],"date"=>date('Y-m-d'),"status"=>1));
unset($_SESSION['SESS_AMSIT_APPS_ID']);
unset($_SESSION['SESS_AMSIT_EMP_NAME']);
unset($_SESSION['SESS_AMSIT_EMP_STATUS']);
		
		$errmsg_arr[] ='Account Has Been logged Out';
		$errflag = true;
		
		if($errflag) 
                {
                    $_SESSION['SMSG_ARR'] = $errmsg_arr;
                    session_write_close();
                    header("location: ../login.php");
                    exit();
                }
}
else
{
unset($_SESSION['SESS_AMSIT_APPS_ID']);
		$errmsg_arr[] ='Account Has Been logged Out';
		$errflag = true;
		
		if($errflag) 
                {
                    $_SESSION['SMSG_ARR'] = $errmsg_arr;
                    session_write_close();
                    header("location: ../login.php");
                    exit();
                }

}
?>