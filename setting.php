<?php 
include('class/auth.php');
include('plugin/plugin.php');
$plugin=new cmsPlugin(); 
$table="employee";
if(isset($_POST['submit']))
{
	 include('cms/create.php');
	 exit();
}

if(isset($_GET['query']))
{
	 include('cms/query.php');
	 exit();
}
elseif(isset($_GET['del']))
{
	 $file_del=$obj->SelectAllByVal("page_info","id",$_GET['del'],"page_name");
	 $drop_table_name=$obj->SelectAllByVal("page_info","id",$_GET['del'],"name");
	 @unlink("./".$file_del);
	 $obj->delete("custom_table_field",array("table_id"=>$_GET['del']));
	 $array_del=array("id"=>$_GET['del']);
	 include('class/migrate_Class.php');
	 $db=new migrate_class();
	 $db->DropTable($drop_table_name);
	 if($obj->delete("page_info",$array_del)==1)
	 {
		$obj->Success("Table Info Successfully Deleted.",$obj->filename()); 
	 }
	 else
	 {
		 $obj->Error("Table Deletion Failed.",$obj->filename()); 
	 }
	 exit();
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
		<?php 
		echo $plugin->softwareTitle();
		echo $plugin->TableCss(); ?>
    </head>
    <body class="">
		<?php include('include/topnav.php'); include('include/mainnav.php'); ?>
        




        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Admin Access Page</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Page</a></li>
                    <li><a href="setting_list.php">Page List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
				<?php echo $plugin->ShowMsg(); ?>
                <!-- Widget -->

                        <!-- Widget -->
                        <div class="widget widget-inverse" >
							<?php 
							if(isset($_GET['edit']))
							{
							?>
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading">Edit / Update - Programmer/User Info</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body">
                                <form class="form-horizontal" method="post" action="" role="form">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
                                            <input type="text" value="<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"name"); ?>" name="table" class="form-control" id="inputEmail3" placeholder="Page Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
                                        <div class="col-sm-3">
                                            <?php $gender=$obj->SelectAllByVal("employee","id",$_GET['edit'],"gender"); ?>
                                            <select class="form-control" name="gender">
                                            	<option value="0">Select</option>
                                                <option <?php if($gender==1){ ?> selected="selected" <?php } ?> value="1">Male</option>
                                                <option <?php if($gender==2){ ?> selected="selected" <?php } ?> value="2">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
                                        <div class="col-sm-10">
                                            <input type="text"  value="<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"contactnumber"); ?>" name="contact_number" class="form-control" id="inputEmail3" placeholder="Contact Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">User Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="user_name"  value="<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"username"); ?>" class="form-control" id="inputPassword3" placeholder="User Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password"  value="<?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"password"); ?>" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="update" class="btn btn-primary">Save Change</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
							<?php }else{ ?>
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading">Create Page &amp; Feature Info</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body">
                                <form class="form-horizontal" method="post" action="" role="form">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Page Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="table" class="form-control" id="inputEmail3" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    	<div class="col-sm-offset-2 col-sm-10">
                                        <table class="mws-table" id="productmore">
                                        <thead>
                                        <tr>
                                            <td align="center">Name</td>
                                            <td align="center">Type</td>
                                            <td align="center">Existing Table / Feature</td>
                                            <td align="center">Option (Value, Text)</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                        <td>
                                        <input type="text" name="field[]"  class="form-control" id="inputEmail3"  />  
                                        
                                        </td>
                                        <td>
                                        <select name="field_type[]"  class="form-control" id="inputEmail3" style="margin-left:5px;">
                                        	<option value="0">Small Text</option>
                                            <option value="1">Large Text / Text Editor / Textarea</option>
                                            <option value="2">Number</option>
                                            <option value="3">Image</option>
                                            <option value="4">File</option>
                                            <option value="5">Existing Table/Feature ID</option>
                                            <option value="6">Static Dropdown</option>
                                            <option value="7">Checkbox</option>
                                            <option value="8">Radio Button</option>
                                        </select>
                                        </td>
                                        <td>
                                        <select name="field_table[]"  class="form-control" id="inputEmail3" style="margin-left:5px;">
                                            <option value="0">Select A Table/Feature/Page</option>
                                            <?php 
                                            $sqlPages=$obj->SelectAll('page_info');
                                            if(!empty($sqlPages))
                                            {
                                                foreach($sqlPages as $page):
                                                ?>
                                                <option value="<?=$page->name?>"><?=$page->menu_name?></option>
                                                <?php
                                                endforeach;
                                            }
                                            ?>
                                        </select>
                                        </td>
                                        <td>
                                            <input type="text" name="field_option[]" placeholder="Type Comma(,) Separated" class="form-control" id="inputEmail3"  />  
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                        	<button class="btn btn-danger"  onclick="return addTableRow('#productmore');return false;" id="btn2" type="button" name="morerows"><i class="icon-ok bigger-110"></i>Add More Rows</button>
                                        &nbsp; &nbsp; &nbsp;
                                            <button type="submit" name="submit" class="btn btn-info">Save</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- // Widget END -->


                        
                        
              <!-- // Widget END -->
            </div>
        </div>
        <!-- // Content END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & content wrapper END -->
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    
    <?php echo $plugin->TableJs(); ?>
    <script type="text/javascript">
		function addTableRow(table)
		{
			var $tr = $(table+' tbody:first').children("tr:last").clone();
				$tr.find("input[type!='hidden'][name*=first_name],select,button").clone();
				$tr.find("button[name*='ViewButton']").remove();
			$(table+' tbody:first').children("tr:last").after($tr);
		}
	</script>
</body>
</html>