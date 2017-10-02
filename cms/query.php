<?php
	include('class/migrate_Class.php');
	 $db=new migrate_class();
	 extract($_GET);
	 
	 $query_variable=$db->createFieldItem($query);
	 
	 $content='
	 <?php include("cms-admin/class/db_Class.php"); $obj=new db_class(); ?>
	 
	 <?php 
	 $sql_'.$query_variable.'_flag=false; 
	 $sql'.$query_variable.'=$obj->SelectAll("'.$query_variable.'");
	 if(!empty($sql'.$query_variable.'))
	 {
		$sql_'.$query_variable.'_flag=true;	
	 }
	
	 if($sql_'.$query_variable.'_flag)
	 {
	?>
	 
	 <?php foreach($sql'.$query_variable.' as $'.$query_variable.'): ?>
	 			<?php echo $'.$query_variable.'->id; ?>
	 <?php endforeach; ?>
	 ?>
	 
	 
	 
	 <?php } ?>
	 
	 ';
	 
	 
	 
	 
	 ?>
     
     <textarea cols="60" rows="80">
	 <?php echo $content; ?>
	 </textarea>