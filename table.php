<?php 
include('class/auth.php');
include('plugin/plugin.php');
$plugin=new cmsPlugin(); 
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
        	<h1 class="content-heading bg-white border-bottom">Page Name</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create Info</a></li>
                    <li><a href="#">Data List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">

                <!-- Widget -->
                <div class="widget widget-inverse">
                    <div class="widget-head">
                        <h4 class="heading">DataTable with TableTools</h4>
                    </div>
                    <div class="widget-body padding-bottom-none">
                        <!-- Table -->
                        <table class="dynamicTable colVis table">

                            <!-- Table heading -->
                            <thead>
                                <tr>
                                    <th class="text-center">
                            <div class="checkbox checkbox-single margin-none">
                                <label class="checkbox-custom">
                                    <i class="fa fa-fw fa-square-o"></i>
                                    <input type="checkbox">
                                </label>
                            </div>
                            </th>
                            <th>Rendering eng.</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Eng. vers.</th>
                            <th>CSS grade</th>
                            </tr>
                            </thead>
                            <!-- // Table heading END -->

                            <!-- Table body -->
                            <tbody>

                                <!-- Table row -->
                                <tr class="gradeX">
                                    <td class="text-center">
                                        <div class="checkbox checkbox-single margin-none">
                                            <label class="checkbox-custom">
                                                <i class="fa fa-fw fa-square-o"></i>
                                                <input type="checkbox" checked="checked">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Trident</td>
                                    <td>Internet Explorer 4.0</td>
                                    <td>Win 95+</td>
                                    <td class="center">4</td>
                                    <td class="center">X</td>
                                </tr>
                                <!-- // Table row END -->

                                <!-- Table row -->
                                <tr class="gradeC">
                                    <td class="text-center">
                                        <div class="checkbox checkbox-single margin-none">
                                            <label class="checkbox-custom">
                                                <i class="fa fa-fw fa-square-o"></i>
                                                <input type="checkbox" checked="checked">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Trident</td>
                                    <td>Internet Explorer 5.0</td>
                                    <td>Win 95+</td>
                                    <td class="center">5</td>
                                    <td class="center">C</td>
                                </tr>
                                <!-- // Table row END -->

                                <!-- Table row -->
                                <tr class="gradeA">
                                    <td class="text-center">
                                        <div class="checkbox checkbox-single margin-none">
                                            <label class="checkbox-custom">
                                                <i class="fa fa-fw fa-square-o"></i>
                                                <input type="checkbox" checked="checked">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Trident</td>
                                    <td>Internet Explorer 5.5</td>
                                    <td>Win 95+</td>
                                    <td class="center">5.5</td>
                                    <td class="center">A</td>
                                </tr>
                                <!-- // Table row END -->

                                <!-- Table row -->
                                <tr class="gradeA">
                                    <td class="text-center">
                                        <div class="checkbox checkbox-single margin-none">
                                            <label class="checkbox-custom">
                                                <i class="fa fa-fw fa-square-o"></i>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </td>
                                    <td>Trident</td>
                                    <td>Internet Explorer 6</td>
                                    <td>Win 98+</td>
                                    <td class="center">6</td>
                                    <td class="center">A</td>
                                </tr>
                                <!-- // Table row END -->


                            </tbody>
                            <!-- // Table body END -->

                        </table>
                        <!-- // Table END -->

                    </div>
                </div>
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
    
</body>
</html>