<?php
$table="spare_parts"; ?><?php 
include('class/auth.php');
include('plugin/plugin.php');
$plugin=new cmsPlugin(); 
if(isset($_GET['del']))
{
	 //$file_del=$obj->SelectAllByVal("page_info","id",$_GET['del'],"name");
	 $drop_table_name=$obj->SelectAllByVal("page_info","id",$_GET['del'],"name");
	 @unlink("./".$drop_table_name.".php");
         @unlink("./".$drop_table_name."_data.php");
         @unlink("./controller/".$drop_table_name."_controller.php");
         //@unlink("./".$file_del);
	 $obj->delete("custom_table_field",array("table_id"=>$_GET['del']));
	 $array_del=array("id"=>$_GET['del']);
	 include('class/migrate_Class.php');
	 $db=new migrate_class();
	 $db->DropTable($drop_table_name);
	 if($obj->delete("page_info",$array_del)==1)
	 {
		$plugin->Success("Table Info Successfully Deleted.",$obj->filename()); 
	 }
	 else
	 {
		 $plugin->Error("Table Deletion Failed.",$obj->filename()); 
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
		echo $plugin->TableCss();
		echo $plugin->KendoCss();
		 ?>
    </head>
    <body class="">
		<?php 
		include('include/topnav.php'); 
		include('include/mainnav.php'); 
		?>
        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Page List</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="setting.php">Create New Page</a></li>
                    <li class="active"><a href="#">Page List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="spare_parts_5"></div>
            </div>
        </div>
        <!-- // Spare Parts END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Spare Parts wrapper END -->
        
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="query_Spare_Parts" type="text/x-kendo-template">
             <a class="k-button k-button-icontext k-grid-query" href="setting.php?query=#= name#"><span class="k-icon k-query"></span>Query</a>
            </script>
    <script id="edit_Spare_Parts" type="text/x-kendo-template">
             <a class="k-button k-button-icontext k-grid-edit" href="spare_parts.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
            </script>
    <script id="delete_Spare_Parts" type="text/x-kendo-template">
                    <a class="k-button k-button-icontext k-grid-delete"  href="setting_list.php?del=#= id#"><span class="k-icon k-delete"></span>Delete</a>
            </script>        
    <script type="text/javascript">
                function deleteClick(spare_parts_id) {
                    var c = confirm("Do you want to delete?");
                    if (c === true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "./json_data/banner_list.php",
                            data: {id: spare_parts_id,table:"page_info",acst:3},
                            success: function (result) {
								$(".k-i-refresh").click();
                            }
                        });
                    }
                }

            </script>
            <script type="text/javascript">
                jQuery(document).ready(function () {
					var postarray={"id":1};
                    var dataSource = new kendo.data.DataSource({
                        pageSize: 15,
                        transport: {
                            read: {
                                url: "./json_data/banner_list.php",
                                type: "POST",
								data:
								{
									"acst":1, //action status sending to json file
									"table":"page_info",
									"cond":0,
									"multi":postarray
									
								}
                            }
                        },
                        autoSync: false,
                        schema: {
                            data: "data",
                            total: "data.length",
                            model: {
                                id: "id",
                                fields: {
                                    id: {nullable: true},
									menu_name: {type: "string"},
									page_name: {type: "string"},
									name: {type: "string"},
									date: {type: "string"}
                                }
                            }
                        }
                    });
                    jQuery("#spare_parts_5").kendoGrid({
                        dataSource: dataSource,
                        filterable: true,
                        pageable: {
                            refresh: true,
                            input: true,
                            numeric: false,
                            pageSizes: true,
                            pageSizes: [5, 10, 20, 50],
                        },
                        sortable: true,
                        groupable: true,
                        columns: [
							{field: "menu_name", title: "Menu Name"},
							{field: "page_name", title: "Page Name"},
							{field: "name", title: "Name"},
							{field: "date", title: "Record Added", width: "150px"},
							{
                                title: "Query",
                                template: kendo.template($("#query_Spare_Parts").html())
                            },
							{
                                title: "Edit",
                                template: kendo.template($("#edit_Spare_Parts").html())
                            },
							{
                                title: "Delete",
                                template: kendo.template($("#delete_Spare_Parts").html())
                            }
                        ]
                    });
                });

            </script>    
    <?php 
	echo $plugin->TableJs(); 
	echo $plugin->KendoJS(); 
	?>
    
</body>
</html>