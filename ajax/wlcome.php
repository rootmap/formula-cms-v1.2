<?php 
include("../class/auth.php");
include("../plugin/plugin.php");
$plugin=new cmsPlugin();
$table="welcome_title"; ?>
<?php 

if(isset($_POST['create'])){
	extract($_POST);
	// print_r($_POST);
	// exit();
	if(!empty($title) && !empty($short_details))
	{  

		$insert=array('title'=>$title,'short_details'=>$short_details,'date'=>date('Y-m-d'),'status'=>1);
		if($obj->insert($table,$insert)==1)
		{
			// $plugin->Success("Successfully Saved",$obj->filename());
			// echo 1;
			header("Location: ../welcome_title.php");
		}
		else 
		{
			$plugin->Error("Failed",$obj->filename());
		}
	}
	else 
	{
		$plugin->Error("Fields is Empty",$obj->filename());
	}   
}
elseif(isset($_POST['update'])) 
{
	extract($_POST);if(!empty($title) && !empty($short_details))
	{$updatearray=array("id"=>$id);$upd2=array('title'=>$title,'short_details'=>$short_details,'date'=>date('Y-m-d'),'status'=>1);
	$update_merge_array=array_merge($updatearray,$upd2);
	if($obj->update($table,$update_merge_array)==1)
	{ 
		$plugin->Success("Successfully Updated",$obj->filename());
	} 
	else 
	{ 
		$plugin->Error("Failed",$obj->filename()); 
	}}}
?>