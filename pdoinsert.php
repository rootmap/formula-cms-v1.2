<?php 
include('class/db_Class.php');
$obj=new db_class();

print_r($obj->SelectAllByID_Multiple("employee",array("username"=>"cms","id"=>"3")));

/*foreach($sql as $dd)
{
	echo $dd->id."<br>";	
}*/
?>