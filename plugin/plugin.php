<?php

class cmsPlugin {

    public function GeneralBodyCss() {
        $content = '<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />

	<!--
	**********************************************************
	In development, use the LESS files and the less.js compiler
	instead of the minified CSS loaded by default.
	**********************************************************
	<link rel="stylesheet/less" href="' . $this->baseUrl("assets/less/admin/module.admin.page.login.less") . '" />
	-->

		<!--[if lt IE 9]><link rel="stylesheet" href="' . $this->baseUrl("assets/components/library/bootstrap/css/bootstrap.min.css") . '" /><![endif]-->
	<link rel="stylesheet" href="' . $this->baseUrl("assets/css/admin/module.admin.page.login.min.css") . '" />

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	<script src="' . $this->baseUrl("assets/components/library/jquery/jquery.min.js?v=v1.2.3") . '"></script>
	<script src="' . $this->baseUrl("assets/components/library/jquery/jquery-migrate.min.js?v=v1.2.3") . '"></script>
    <script src="' . $this->baseUrl("assets/components/library/modernizr/modernizr.js?v=v1.2.3") . '"></script>
    <script src="' . $this->baseUrl("assets/components/plugins/less-js/less.min.js?v=v1.2.3") . '"></script>
    <script src="' . $this->baseUrl("assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.2.3") . '"></script>
    <script src="' . $this->baseUrl("assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.2.3") . '"></script>';

        return $content;
    }

    public function GeneralBodyJs() {
        $content = '<script>
			var basePath = "' . $this->baseUrl() . '",
				commonPath = "' . $this->baseUrl("assets/") . '",
				rootPath = "' . $this->baseUrl() . '",
				DEV = false,
				componentsPath = "' . $this->baseUrl("assets/components/") . '";

			var primaryColor = "#72af46",
				dangerColor = "#b55151",
				infoColor = "#466baf",
				successColor = "#8baf46",
				warningColor = "#ab7a4b",
				inverseColor = "#45484d";

			var themerPrimaryColor = primaryColor;
			</script>

			<script src="' . $this->baseUrl("assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.2.3") . '"></script>
		<script src="' . $this->baseUrl("assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.2.3") . '"></script>
		<script src="' . $this->baseUrl("assets/components/plugins/breakpoints/breakpoints.js?v=v1.2.3") . '"></script>
		<script src="' . $this->baseUrl("assets/components/core/js/animations.init.js?v=v1.2.3") . '"></script>
		<script src="' . $this->baseUrl("assets/components/helpers/themer/assets/plugins/cookie/jquery.cookie.js?v=v1.2.3") . '"></script>
		<script src="' . $this->baseUrl("assets/components/core/js/core.init.js?v=v1.2.3") . '"></script>';

        return $content;
    }
    
    

    public function TextAreaCss() {
        $content = '<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> ';
        $content .= '<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" />';
        $content .= '<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>';
        $content .= '<link rel="stylesheet" href="' . $this->baseUrl("editor/summernote-master/dist/summernote.css") . '" />';
        return $content;
    }
    
    public function TextAreaJS() {
        $content = '<script type="text/javascript" src="' . $this->baseUrl("editor/summernote-master/dist/summernote.js") . '"></script>';
        $content .= '<script type="text/javascript">
                        $(document).ready(function () {
                            $(".summernote").summernote({
                                height: 300,
                                tabsize: 2
                            });
                        });
                    </script>';
        return $content;
    }
    
    public function CheckBoxJS() {
        $content = '<script type="text/javascript" src="' . $this->baseUrl("assets/components/modules/admin/forms/elements/uniform/assets/lib/js/jquery.uniform.min.js?v=v1.2.3") . '"></script>';
        $content .= '<script type="text/javascript" src="' . $this->baseUrl("assets/components/modules/admin/forms/elements/uniform/assets/custom/js/uniform.init.js?v=v1.2.3") . '"></script>';
        $content .= '<script type="text/javascript" src="' . $this->baseUrl("assets/components/modules/admin/forms/elements/fuelux-checkbox/fuelux-checkbox.js?v=v1.2.3") . '"></script>';
        return $content;
    }
    
    public function FileUploadCss() {
        $content = '<link rel="stylesheet" href="' . $this->baseUrl("assets/css/admin/module.admin.page.form_elements.min.css") . '" />';
        return $content;
    }

    public function FileUploadJS() {
        $content = '

        <script src="' . $this->baseUrl("assets/components/modules/admin/forms/elements/jasny-fileupload/assets/js/bootstrap-fileupload.js?v=v1.2.3") . '" > </script>
<script src="' . $this->baseUrl("assets/components/modules/admin/forms/elements/inputmask/assets/lib/jquery.inputmask.bundle.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/forms/elements/inputmask/assets/custom/inputmask.init.js?v=v1.2.3") . '"></script>';
        return $content;
    }

    public function FileUploadBox($st = 0, $filename = '', $field = '') {
        if ($st == 0) {
            $content = '<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                            <span class="btn btn-default btn-file"><span class="fileupload-new">Select Image / File</span><span class="fileupload-exists">Change</span>
                                                <input type="file" name="' . $field . '" class="margin-none" /></span>
                                            <span class="fileupload-preview"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a>
                                        </div>';
        } else {
            if (!empty($filename)) {
                $content = '<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                            <span class="btn btn-default btn-file"><span class="fileupload-new">Update/Change Photo</span><span class="fileupload-exists">Change</span>
                                                <input type="file" name="' . $field . '" class="margin-none" /></span>
                                            <span class="fileupload-preview"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a>
                                        </div><input type="hidden" name="ex_' . $field . '" value="' . $filename . '" /><br /><img src="./upload/' . $filename . '" height="150" class="img-responsive">';
            } else {
                $content = '<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                            <span class="btn btn-default btn-file"><span class="fileupload-new">Select Image / File</span><span class="fileupload-exists">Change</span>
                                                <input type="file" name="' . $field . '" class="margin-none" /></span>
                                            <span class="fileupload-preview"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a>
                                        </div><input type="hidden" name="ex_' . $field . '" value="" />';
            }
        }
        return $content;
    }

    public function FileUploadBox2($st = 0, $filename = '', $field = '') {
        if ($st == 0) {
            $content = '<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                            <span class="btn btn-default btn-file"><span class="fileupload-new">Select Image / File</span><span class="fileupload-exists">Change</span>
                                                <input type="file" name="' . $field . '" class="margin-none" /></span>
                                            <span class="fileupload-preview"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a>
                                        </div>';
        } else {
            if (!empty($filename)) {
                $content = '<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                            <span class="btn btn-default btn-file"><span class="fileupload-new">Update/Change Photo</span><span class="fileupload-exists">Change</span>
                                                <input type="file" name="' . $field . '" class="margin-none" /></span>
                                            <span class="fileupload-preview"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a>
                                        </div><input type="hidden" name="ex_photo2" value="' . $filename . '" /><br /><img src="./upload/' . $filename . '" height="150" class="img-responsive">';
            } else {
                $content = '<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                            <span class="btn btn-default btn-file"><span class="fileupload-new">Select Image / File</span><span class="fileupload-exists">Change</span>
                                                <input type="file" name="' . $field . '" class="margin-none" /></span>
                                            <span class="fileupload-preview"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">&times;</a>
                                        </div><input type="hidden" name="ex_photo2" value="" />';
            }
        }
        return $content;
    }

    public function TableCss() {
        $content = '<!-- Meta -->
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />

<!--
**********************************************************
In development, use the LESS files and the less.js compiler
instead of the minified CSS loaded by default.
**********************************************************
<link rel="stylesheet/less" href="' . $this->baseUrl("/assets/less/admin/module.admin.page.tables.less") . '" />
-->

<!--[if lt IE 9]><link rel="stylesheet" href="' . $this->baseUrl("../assets/components/library/bootstrap/css/bootstrap.min.css") . '" /><![endif]-->
<link rel="stylesheet" href="' . $this->baseUrl("assets/css/admin/module.admin.page.tables.min.css") . '" />

      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->

<script src="' . $this->baseUrl("assets/components/library/jquery/jquery.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/library/jquery/jquery-migrate.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/library/modernizr/modernizr.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/plugins/less-js/less.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/library/jquery-ui/js/jquery-ui.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js?v=v1.2.3") . '"></script>';

        return $content;
    }

    public function TableJs() {
        $content = '<script>
                var basePath = "",
                commonPath = "' . $this->baseUrl("assets / ") . '",
                rootPath = "",
                DEV = false,
                componentsPath = "' . $this->baseUrl("assets / components / ") . '";
                var primaryColor = "#72af46",
                dangerColor = "#b55151",
                infoColor = "#466baf",
                successColor = "#8baf46",
                warningColor = "#ab7a4b",
                inverseColor = "#45484d";
                var themerPrimaryColor = primaryColor;</script>

<script src="' . $this->baseUrl("assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/plugins/breakpoints/breakpoints.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/core/js/animations.init.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/tables/datatables/assets/lib/js/jquery.dataTables.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/tables/datatables/assets/lib/extras/TableTools/media/js/TableTools.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/tables/datatables/assets/lib/extras/ColVis/media/js/ColVis.min.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/tables/datatables/assets/custom/js/DT_bootstrap.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/tables/datatables/assets/custom/js/datatables.init.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/forms/elements/fuelux-checkbox/fuelux-checkbox.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/forms/elements/bootstrap-select/assets/lib/js/bootstrap-select.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/forms/elements/bootstrap-select/assets/custom/js/bootstrap-select.init.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/modules/admin/tables/classic/assets/js/tables-classic.init.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/plugins/holder/holder.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/core/js/sidebar.main.init.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/core/js/sidebar.collapse.init.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/helpers/themer/assets/plugins/cookie/jquery.cookie.js?v=v1.2.3") . '"></script>
<script src="' . $this->baseUrl("assets/components/core/js/core.init.js?v=v1.2.3") . '"></script>';

        return $content;
    }

    function KendoCss() {
        $content = '<link rel="stylesheet" href="' . $this->baseUrl("kendo/css/kendo.common.min.css") . '"  />
                <link rel="stylesheet" href="' . $this->baseUrl("kendo/css/kendo.metro.min.css") . '"  />';
        return $content;
    }

    function KendoJS() {
        $content = '<script type="text/javascript" src="' . $this->baseUrl("kendo/js/kendo.web.min.js") . '"></script>
';
        return $content;
    }

    function baseUrl($suffix = '') {
        $protocol = strpos($_SERVER['SERVER_SIGNATURE'], '443') !== false ? 'https://' : 'http://';
        $web_root = $protocol . $_SERVER['HTTP_HOST'] . "/" . "formula-cms/";
        $suffix = ltrim($suffix, '/');
        return $web_root . trim($suffix);
    }

    public function softwareTitle($title = '') {
        if ($title != '') {
            $content = '<title>' . $title . ' |  Formula-CMS (CRUD Manager) | By Root Map</title>';
            return $content;
        } else {
            $content = '<title>Formula-CMS (CRUD Manager) | By Root Map</title>';
            return $content;
        }
    }

    public function softwareName($title = '') {
        if ($title != '') {
            $content = $title;
            return $content;
        } else {
            $content = 'Admin CMS';
            return $content;
        }
    }

    function Error($msg, $location) {
        $errmsg_arr[] = "<div class='errors alert alert-danger'> <i class='fa fa-exclamation-triangle'></i> " . $msg . " </div>";
        $error_flag = true;
        if ($error_flag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location:" . $location);
            exit();
        }
    }

    function Error_Generate($msg) {
        $errmsg_arr[] = "<div class='errors alert alert-danger'> <i class='fa fa-exclamation-triangle'></i>  " . $msg . "</div>";
        $error_flag = true;
        if ($error_flag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
        }
    }

    function Success($msg, $location) {
        $errmsg_arr[] = "<div class='success alert alert-success'> <i class='fa fa-check-square'></i> " . $msg . " </div>";
        $error_flag = true;
        if ($error_flag) {
            $_SESSION['SMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location:" . $location);
            exit();
        }
    }

    function Success_Generate($msg, $location) {
        $errmsg_arr[] = "<div class='success alert alert-success'>  <i class='fa fa-check-square'></i>  " . $msg . "</div>";
        $error_flag = true;
        if ($error_flag) {
            $_SESSION['SMSG_ARR'] = $errmsg_arr;
            session_write_close();
        }
    }

    function ShowMsg() {
        if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
            foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
                unset($_SESSION['ERRMSG_ARR']);
                return $msg;
            }
        }

        if (isset($_SESSION['SMSG_ARR']) && is_array($_SESSION['SMSG_ARR']) && count($_SESSION['SMSG_ARR']) > 0) {
            foreach ($_SESSION['SMSG_ARR'] as $msgs) {
                unset($_SESSION['SMSG_ARR']);
                return $msgs;
            }
        }
    }

    function redirect($link) {
        echo "<script> location.href = '$link'</script>";
    }

    function escapesql($col) {
        $obj = new db_class();
        $con = $obj->open();
        $coll = mysqli_real_escape_string($con, $col);
        $obj->close($con);
        return $coll;
    }

    function dates($value) {
//2015-02-28
        $date = substr($value, 8, 2);
        $month = substr($value, 5, 2);
        $year = substr($value, 0, 4);
        return $date . "/" . $month . "/" . $year;
    }

    function escape_empty($value) {
        if ($value == '') {
            return 0;
        } else {
            return $value;
        }
    }

    function filename() {
        return basename($_SERVER['PHP_SELF']);
    }

}

?>