<?php
include("class/auth.php");
include("plugin/plugin.php");
$plugin = new cmsPlugin();
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
            <h1 class="content-heading bg-white border-bottom">Dashboard</h1>
            <!--                        <div class="innerAll bg-white border-bottom">
                                        <ul class="menubar">
                                            <li class="active"><a href="#">Create Info</a></li>
                                            <li><a href="#">Data List</a></li>
                                        </ul>
                                    </div>-->
            <div class="innerAll spacing-x2">
                <?php echo $plugin->ShowMsg(); ?>
                <!---------------------------- Start Here Box Design-------------------->
                <div class="row">

                    <?php
                    $sqlmenu_custom = $obj->SelectAll("page_info");
                    if (!empty($sqlmenu_custom))
                        foreach ($sqlmenu_custom as $custom):
                            ?>

                            <div class="col-md-3 col-sm-6">
                                <div class="panel-3d">
                                    <div class="front">

                                        <div class="widget text-center">
                                            <div class="widget-body padding-none">
                                                <div>
                                                    <div class="innerAll bg-info innerAll">
                                                        <p class="lead text-white strong margin-none"><i class="icon-user-1"></i></p>
                                                    </div>
                                                    <div class="innerAll">
                                                        <a href="<?php echo $custom->page_name; ?>"><b style="color: brown;"> View <?php echo $custom->menu_name; ?> </b></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <?php
                        endforeach;
                    ?>





                </div>













            </div>
            <!------------------------------End Here Boxed design--------------------------->


            <!--start table-->

            <?php
            //include('include/topnav.php');
            //include('include/mainnav.php');
            ?>
            <div id="content" style="margin-left: -2px;">
                <div class="innerAll spacing-x2">
                    <h3 class="content-heading">Log</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12 col-sm-12" id="spare_parts_5"></div>
                            <!--<div class="col-sm-6" id="spare_parts_5"></div>-->
                        </div>
                    </div>
                </div>
            </div> 
            <!-- // Spare Parts END -->

            <!--                <div class="clearfix"></div>-->
            <!-- // Sidebar menu & Spare Parts wrapper END -->

            <?php include('include/footer.php'); ?>
            <!-- // Footer END -->

            <!-- // Main Container Fluid END -->
            <!-- Global -->

            <script type="text/javascript">
                function deleteClick(spare_parts_id) {
                    var c = confirm("Do you want to delete?");
                    if (c === true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "./json_data/banner_list.php",
                            data: {id: spare_parts_id, table: "page_info", acst: 3},
                            success: function (result) {
                                $(".k-i-refresh").click();
                            }
                        });
                    }
                }

            </script>
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    var postarray = {"id": 1};
                    var dataSource = new kendo.data.DataSource({
                        pageSize: 5,
                        transport: {
                            read: {
                                url: "./json_data/banner_list.php",
                                type: "POST",
                                data:
                                        {
                                            "acst": 1, //action status sending to json file
                                            "table": "page_info",
                                            "cond": 0,
                                            "multi": postarray

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
                            {field: "page_name", title: "Page Name"},
                            {field: "name", title: "Name"},
                            {field: "date", title: "Record Added", width: "120px"}

                        ]
                    });
                });

            </script>
            <?php
            echo $plugin->TableJs();
            echo $plugin->KendoJS();
            ?>

            <!--end table-->
        </div>
        <!-- // Content END -->
        <div class="clearfix"></div>
        <!-- // Sidebar menu & content wrapper END -->

        <!-- // Footer END -->
        <!-- // Main Container Fluid END -->
        <!-- Global -->

    </body>
</html>