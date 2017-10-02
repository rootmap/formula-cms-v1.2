<?php 
include("../class/auth.php");
include("../plugin/plugin.php");
$plugin=new cmsPlugin();
$table="welcome_title"; ?>
<?php 
if(isset($_POST['create'])){
			extract($_POST);
			if(!empty($details))
			{  $insert=array('details'=>$details,'date'=>date('Y-m-d'),'status'=>1);
				if($obj->insert($table,$insert)==1)
				{
					// $plugin->Success("Successfully Saved",$obj->filename());
					header("Location: ../welcome_content.php");
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
			extract($_POST);if(!empty($details))
			{$updatearray=array("id"=>$id);$upd2=array('details'=>$details,'date'=>date('Y-m-d'),'status'=>1);
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