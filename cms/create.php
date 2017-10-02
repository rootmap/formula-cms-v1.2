<?php

include('class/migrate_Class.php');
$db = new migrate_class();
extract($_POST);
$con = $obj->open();
$upload_image = false;
$upload_file = false;
$validation_edit_flag = false;
$text_area_flag = false;
$select_option_flag = false;
$checkbox_option_flag = false;
$option_feature_code_content = '';
$upload_image_code_content = '';
$upload_image_code_content_lib = '';
$upload_image_code_content_edited = '';

$table_name = $db->createFieldItem($table);
$count_field = count($field);
$countf = 0;
$fieldsf = "";
$fieldsf3 = "";
if ($count_field != 0) {


    foreach ($field as $index => $val) {

        $col = mysqli_real_escape_string($con, $_POST['field_type'][$index]);
        $col_table = mysqli_real_escape_string($con, $_POST['field_table'][$index]);
        $col_keys = mysqli_real_escape_string($con, $_POST['field_option'][$index]);
        $val = mysqli_real_escape_string($con, $val);

        if ($col == 0) {
            $fval = "varchar(255)";
            $validation[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit_flag = true;
        } elseif ($col == 1) {
            $text_area_flag = true;
            $fval = "text";
            $validation[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit_flag = true;
        } elseif ($col == 2) {
            $fval = "int(20)";
            $validation[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit_flag = true;
        } elseif ($col == 3) {
            if ($upload_image) {
                $fval = "text";
                $upload_image = true;
                $upload_image2 = true;
                $upload_image_field = $db->createFieldItem($val);
                $validation[] = '!empty($_FILES[&#8216;' . $db->createFieldItem($val) . '&#8216;][&#8216;name&#8216;])';
            } else {
                $fval = "text";
                $upload_image = true;
                $upload_image_field = $db->createFieldItem($val);
                $validation[] = '!empty($_FILES[&#8216;' . $db->createFieldItem($val) . '&#8216;][&#8216;name&#8216;])';
            }


            $upload_image_code_content .= ' 
                                          $' . $upload_image_field . '=$imgclassget->upload_fiximage("upload","' . $upload_image_field . '","' . $upload_image_field . '_upload_".$table_name."_".time()); ';

            $upload_image_code_content_edited .= '
                                                    if(!empty($_FILES[&#8216;' . $upload_image_field . '&#8216;][&#8216;name&#8216;]))
                                                    { 
                                                            $' . $upload_image_field . '_1=$imgclassget->upload_fiximage("upload","' . $upload_image_field . '","' . $upload_image_field . '_upload_".$table_name."_".time()); 
                                                            $' . $upload_image_field . '=$' . $upload_image_field . '_1; 
                                                            @unlink("upload/".$ex_' . $upload_image_field . ');      
                                                    }
                                                    else
                                                    { 
                                                            $' . $upload_image_field . '=$ex_' . $upload_image_field . '; 
                                                    }';
        } elseif ($col == 4) {
            $fval = "text";
            $upload_file = true;
            $upload_file_field = $db->createFieldItem($val);
            $validation[] = '!empty($_FILES[&#8216;' . $db->createFieldItem($val) . '&#8216;][&#8216;name&#8216;])';

            $upload_image_code_content .= '
			$' . $upload_file_field . '=$imgclassget->fileUpload("' . $upload_file_field . '","' . $upload_file_field . '_upload_".$table_name."_".time(),"upload"); ';


            $upload_image_code_content_edited .= '
                                                    if(!empty($_FILES[&#8216;' . $upload_file_field . '&#8216;][&#8216;name&#8216;]))
                                                    {
                                                            $' . $upload_file_field . '_1=$imgclassget->fileUpload("' . $upload_file_field . '","' . $upload_file_field . '_upload_".$table_name."_".time(),"upload");
                                                            $' . $upload_file_field . '=$' . $upload_file_field . '_1; 
                                                            @unlink("upload/".$ex_' . $upload_image_field . ');      
                                                    }
                                                    else
                                                    {
                                                            $' . $upload_file_field . '=$ex_' . $upload_file_field . ';
                                                    }';
        } elseif ($col == 5) {
            $fval = "int(20)";
            $validation[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit_flag = true;
        } elseif ($col == 6) {
            $fval = "text";
            $validation[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit_flag = true;
        } elseif ($col == 8) {
            $fval = "text";
            $validation[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit[] = '!empty($' . $db->createFieldItem($val) . ')';
            $validation_edit_flag = true;
        }

        if ($col == 7) {
            $genKeyArray = explode(',', $col_keys);
            if (!empty($genKeyArray)) {
                foreach ($genKeyArray as $keyGen):
                    $fval = "text";
                    $validation[] = '!empty($' . $db->createFieldItem($val) . '_' . $db->createFieldItem($keyGen) . ')';
                    $validation_edit[] = '!empty($' . $db->createFieldItem($val) . '_' . $db->createFieldItem($keyGen) . ')';

                    $fieldsf[] = $db->createFieldItem($val) . '_' . $db->createFieldItem($keyGen);
                    $fieldsf2[] = $fval;
                    $fieldsf3 .= '&#8216;' . $db->createFieldItem($val) . '_' . $db->createFieldItem($keyGen) . '&#8216;=>$' . $db->createFieldItem($val) . '_' . $db->createFieldItem($keyGen) . ',';
                endforeach;
            }
        }


        //$checkbox_option_flag = false;
        //echo $col.$val;
        if ($col != 7) {
            $fieldsf[] = $db->createFieldItem($val);
            $fieldsf2[] = $fval;
            $fieldsf3 .= '&#8216;' . $db->createFieldItem($val) . '&#8216;=>$' . $db->createFieldItem($val) . ',';
        }
    }


    //exit();

    $upload_image_code_content_lib .= ' include(&#8216;class/uploadImage_Class.php&#8216;); $imgclassget=new image_class(); ';

    //echo print_r($validation);
    $countvali = 0;
    $validate_concat = "";
    foreach ($validation as $cvali):
        if ($countvali++ != 0)
            $validate_concat .= ' && ';
        $validate_concat .= "$cvali";
    endforeach;

    if ($validation_edit_flag) {
        $countvali_edit = 0;
        $validate_concat_edit = "";
        foreach ($validation_edit as $cvali_edit):
            if ($countvali_edit++ != 0)
                $validate_concat_edit .= ' && ';
            $validate_concat_edit .= "$cvali_edit";
        endforeach;
    }

    //echo $validate_concat;
}
else {
    echo "0 Field Name Found";
}

//echo $fieldsf3;
//
//if($upload_image==true)
//{
//    echo "HHHH";
//}
//
//exit();

$db_field_array_first = array("id" => "int(20) auto_increment primary key");
$db_field_array_last = array("date" => "date", "status" => "int(2)");
$db_field_array_middle = array_combine($fieldsf, $fieldsf2);
$db_merge_array = array_merge($db_field_array_first, $db_field_array_middle, $db_field_array_last);

//echo $db->CreateTable($table_name,$db_merge_array);

if ($db->CreateTable($table_name, $db_merge_array) == 1) {

    $filename = $table_name . ".php";
    $filename_data = $table_name . "_data.php";
    $filename_controller = $table_name . "_controller.php";
    $exists = $obj->exists_multiple("page_info", array("name" => $table_name));
    if ($exists == 0) {
        $obj->insert("page_info", array("name" => $table_name, "page_name" => $filename, "menu_name" => $table, "date" => date('Y-m-d'), "status" => 1));
        $table_id = $obj->SelectAllByVal("page_info", "name", $table_name, "id");
        foreach ($fieldsf as $cf):
            $obj->insert("custom_table_field", array("table_id" => $table_id, "name" => $cf, "date" => date('Y-m-d'), "status" => 1));
        endforeach;
    }
    else {
        $obj->update("page_info", array("name" => $table_name, "page_name" => $filename, "menu_name" => $table, "date" => date('Y-m-d'), "status" => 1));
    }

    @$content = '<?php 
		include("class/auth.php");
		include("plugin/plugin.php");
		$plugin=new cmsPlugin();
		$table="' . $table_name . '"; ?>';

    @$content .= '
		<?php 
		if(isset($_POST[&#8216;create&#8216;])){
			extract($_POST);
			if(' . $validate_concat . ')
			{ ';


    if ($upload_image == true && $upload_file == true) {
        @$content .= $upload_image_code_content_lib;
    } elseif ($upload_image) {
        @$content .= $upload_image_code_content_lib;
    } elseif ($upload_file) {
        @$content .= $upload_image_code_content_lib;
    }

    if ($upload_image == true && $upload_file == true) {
        @$content .= $upload_image_code_content;
    } elseif ($upload_image) {
        @$content .= $upload_image_code_content;
    } elseif ($upload_file) {
        @$content .= $upload_image_code_content;
    }


    //echo $content;
    //exit();

    @$content .= ' $insert=array(' . $fieldsf3 . '&#8216;date&#8216;=>date(&#8216;Y-m-d&#8216;),&#8216;status&#8216;=>1);
				if($obj->insert($table,$insert)==1)
				{
					$plugin->Success("Successfully Saved",$obj->filename());
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
		elseif(isset($_POST[&#8216;update&#8216;])) 
		{
			extract($_POST);';

    if ($validation_edit_flag) {

        @$content .= 'if(' . $validate_concat_edit . ')
			{';
    }
    @$content .= '$updatearray=array("id"=>$id);';


    if ($upload_image == true && $upload_file == true) {
        @$content .= $upload_image_code_content_lib;
    } elseif ($upload_image) {
        @$content .= $upload_image_code_content_lib;
    } elseif ($upload_file) {
        @$content .= $upload_image_code_content_lib;
    }


    if ($upload_image == true && $upload_file == true) {
        @$content .= $upload_image_code_content_edited;
    } elseif ($upload_image) {
        @$content .= $upload_image_code_content_edited;
    } elseif ($upload_file) {
        @$content .= $upload_image_code_content_edited;
    }


    $content .= '$upd2=array(' . $fieldsf3 . '&#8216;date&#8216;=>date(&#8216;Y-m-d&#8216;),&#8216;status&#8216;=>1);
						$update_merge_array=array_merge($updatearray,$upd2);
						if($obj->update($table,$update_merge_array)==1)
						{ 
							$plugin->Success("Successfully Updated",$obj->filename());
						} 
						else 
						{ 
							$plugin->Error("Failed",$obj->filename()); 
						}';
    if ($validation_edit_flag) {

        $content .= '}';
    }

    $content .= '}
		elseif(isset($_GET[&#8216;del&#8216;])=="delete") 
		{
			$delarray=array("id"=>$_GET[&#8216;id&#8216;]);';

    if ($upload_image) {
        $content .= '$photolink=$obj->SelectAllByVal($table,&#8216;id&#8216;,$_GET[&#8216;id&#8216;],&#8216;' . $upload_image_field . '&#8216;); @unlink("upload/".$photolink);';
    } elseif ($upload_file) {
        $content .= '$photolink=$obj->SelectAllByVal($table,&#8216;id&#8216;,$_GET[&#8216;id&#8216;],&#8216;' . $upload_file_field . '&#8216;);  @unlink("upload/".$photolink);';
    }

    $content .= 'if($obj->delete($table,$delarray)==1)
			{ 
				$plugin->Success("Successfully Delete",$obj->filename());  
			} 
			else 
			{ 
				$plugin->Error("Failed",$obj->filename()); 
			}
		}
		?>';

    @$content .= '<!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head><?php ';

    @$content .= ' 
    echo $plugin->softwareTitle("' . $table . '");
    echo $plugin->TableCss(); ';

    if ($upload_image == true && $upload_file == true) {
        @$content .= ' echo $plugin->FileUploadCss(); ';
    } elseif ($upload_image == true && $upload_file == false) {
        @$content .= ' echo $plugin->FileUploadCss(); ';
    } elseif ($upload_image == false && $upload_file == true) {
        @$content .= ' echo $plugin->FileUploadCss(); ';
    }

    if ($text_area_flag == true) {
        @$content .= ' echo $plugin->TextAreaCss(); ';
    }

    @$content .= ' ?></head>
    <body class="">
		<?php include(&#8216;include/topnav.php&#8216;); include(&#8216;include/mainnav.php&#8216;); ?>
        




        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">' . $table . '</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New ' . $table . '</a></li>
                    <li><a href="' . $filename_data . '">' . $table . ' List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
				<?php echo $plugin->ShowMsg(); ?>
                <!-- Widget -->

                        <!-- Widget -->
                        <div class="widget widget-inverse" >
							<?php 
							if(isset($_GET[&#8216;edit&#8216;]))
							{
							?>
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading">Update/Change - ' . $table . '</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body">';

    if ($upload_image) {
        $content .= '<form enctype=&#8216;multipart/form-data&#8216;';
    } elseif ($upload_file) {
        $content .= '<form enctype=&#8216;multipart/form-data&#8216;';
    } else {
        $content .= '<form ';
    }
    @$content .= ' class="form-horizontal" method="post" action="" role="form">
								<input type="hidden" name="id" value="<?php echo $_GET[&#8216;edit&#8216;]; ?>">';

    $input_file = false;
    foreach ($field as $index => $val) {

        $col = mysqli_real_escape_string($con, $_POST['field_type'][$index]);
        $col_table = mysqli_real_escape_string($con, $_POST['field_table'][$index]);
        $col_keys = mysqli_real_escape_string($con, $_POST['field_option'][$index]);
        $val = mysqli_real_escape_string($con, $val);
        $cval_edit = '$obj->SelectAllByVal($table,"id",$_GET[&#8216;edit&#8216;],"' . $db->createFieldItem($val) . '")';
        if ($col == 0) {
            $fval = "<input type=&#8216;text&#8216; id=&#8216;form-field-1&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; value=&#8216;<?php echo " . $cval_edit . "; ?>&#8216; placeholder=&#8216;" . $val . "&#8216; class=&#8216;form-control&#8216; />";
            $area_space = "9";
        } elseif ($col == 1) {
            $fval = "<textarea id=&#8216;form-field-1&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; placeholder=&#8216;" . $val . "&#8216; class=&#8216;summernote&#8216;><?php echo " . $cval_edit . "; ?></textarea>";
            $area_space = "9";
        } elseif ($col == 2) {
            $fval = "<input type=&#8216;text&#8216; id=&#8216;form-field-1&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; placeholder=&#8216;" . $val . "&#8216;  value=&#8216;<?php echo " . $cval_edit . "; ?>&#8216;  class=&#8216;form-control&#8216; />";
            $area_space = "6";
        } elseif ($col == 3) {
            $input_file = true;
            $fval = '<?php 
                    $ex_' . $db->createFieldItem($val) . '_data=$obj->SelectAllByVal($table, "id", $_GET[&#8216;edit&#8216;], "' . $db->createFieldItem($val) . '");
                    echo $plugin->FileUploadBox(1,$ex_' . $db->createFieldItem($val) . '_data,&#8216;' . $db->createFieldItem($val) . '&#8216;);
                    ?>';
            //$fval = "<input type=&#8216;file&#8216; id=&#8216;id-input-file-1&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; placeholder=&#8216;" . $val . "&#8216; class=&#8216;form-control&#8216; />";
            $area_space = "3";
        } elseif ($col == 4) {
            $input_file = true;
            //$fval = "<input type=&#8216;file&#8216; id=&#8216;id-input-file-2&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; placeholder=&#8216;" . $val . "&#8216; class=&#8216;form-control&#8216; />";
            $fval = '<?php 
                    $ex_' . $db->createFieldItem($val) . '_data=$obj->SelectAllByVal($table, "id", $_GET[&#8216;edit&#8216;], "' . $db->createFieldItem($val) . '");
                    echo $plugin->FileUploadBox(1,$ex_' . $db->createFieldItem($val) . '_data,&#8216;' . $db->createFieldItem($val) . '&#8216;);
                    ?>';
            $area_space = "3";
        } elseif ($col == 5) {
            $fval = '<select id=&#8216;form-field-1&#8216; name=&#8216;' . $db->createFieldItem($val) . '&#8216; class=&#8216;form-control&#8216;>';
            $fval .= '<option value=&#8216;0&#8216;>Please Select</option>';
            $getKeys = explode(",", $col_keys);
            $firstKey = $getKeys[0];
            $secondKey = $getKeys[1];
            $fval .= '<?php 
                        $ex_' . $db->createFieldItem($val) . '_data=$obj->SelectAllByVal($table,&#8216;id&#8216;,$_GET[&#8216;edit&#8216;],&#8216;' . $db->createFieldItem($val) . '&#8216;);
                        $sql' . $db->createFieldItem($val) . '=$obj->FlyQuery(&#8216;SELECT ' . $col_keys . ' FROM `' . $col_table . '`&#8216;);
                        if(!empty($sql' . $db->createFieldItem($val) . '))
                        {
                            foreach ($sql' . $db->createFieldItem($val) . ' as $' . $db->createFieldItem($val) . '): ?>';
            $fval .= '<option <?php if($' . $db->createFieldItem($val) . '->' . $firstKey . '==$ex_' . $db->createFieldItem($val) . '_data){ ?> selected=&#8216;selected&#8216; <?php } ?> value=&#8216;<?=$' . $db->createFieldItem($val) . '->';
            $fval .= $firstKey;
            $fval .= '?>&#8216;>';
            $fval .= '<?=$' . $db->createFieldItem($val) . '->';
            $fval .= $secondKey;
            $fval .= '?></option>';
            $fval .= '<?php endforeach; ?>';
            $fval .= '<?php } ?>';
            $fval .= '</select>';


            $area_space = "9";
        } elseif ($col == 6) {
            $fval = '<select id=&#8216;form-field-1&#8216; name=&#8216;' . $db->createFieldItem($val) . '&#8216; class=&#8216;form-control&#8216;>';
            $fval .= '<option value=&#8216;0&#8216;>Please Select</option>';
            $fval .= '<?php   
                        $ex_' . $db->createFieldItem($val) . '=$obj->SelectAllByVal($table,&#8216;id&#8216;,$_GET[&#8216;edit&#8216;],&#8216;' . $db->createFieldItem($val) . '&#8216;);
                        $SSarr' . $db->createFieldItem($val) . '=&#8216;' . $col_keys . '&#8216;;
                        $sql' . $db->createFieldItem($val) . '=explode(&#8216;,&#8216;,$SSarr' . $db->createFieldItem($val) . ');
                        if(!empty($sql' . $db->createFieldItem($val) . '))
                        {
                            foreach ($sql' . $db->createFieldItem($val) . ' as $' . $db->createFieldItem($val) . '): ?>';
            $fval .= '<option <?php if($ex_' . $db->createFieldItem($val) . '==$' . $db->createFieldItem($val) . '){ ?> selected=&#8216;selected&#8216; <?php } ?> value=&#8216;<?=$' . $db->createFieldItem($val) . '?>&#8216;>';
            $fval .= '<?=$' . $db->createFieldItem($val) . '?></option>';
            $fval .= '<?php endforeach; ?>';
            $fval .= '<?php } ?>';
            $fval .= '</select>';

            $area_space = "9";
        } elseif ($col == 7) {
            $fval = '';
            if (!empty($col_table)) {
                $getKeys = explode(",", $col_keys);
                $firstKey = $getKeys[0];
                $secondKey = $getKeys[1];
                $fval .= '<?php 
                        $sql' . $db->createFieldItem($val) . '=$obj->FlyQuery(&#8216;SELECT ' . $col_keys . ' FROM `' . $col_table . '`&#8216;);
                        if(!empty($sql' . $db->createFieldItem($val) . '))
                        {
                            foreach ($sql' . $db->createFieldItem($val) . ' as $' . $db->createFieldItem($val) . '): ?>';


                $fval .= '<?php $ex_' . $db->createFieldItem($val) . '=$obj->SelectAllByVal($table,&#8216;id&#8216;,$_GET[&#8216;edit&#8216;],&#8216;' . $db->createFieldItem($val) . '&#8216;); ?>';
                $fval .= '<label class=&#8216;checkbox&#8216;>
                                <input <?php if($ex_' . $db->createFieldItem($val) . '==&#8216;$' . $db->createFieldItem($val) . '&#8216;){ ?> checked=&#8216;checked&#8216; <?php } ?> type=&#8216;checkbox&#8216; name=&#8216;' . $db->createFieldItem($val) . '&#8216;  class=&#8216;checkbox&#8216; value=&#8216;<?=$' . $db->createFieldItem($val) . '?>&#8216; />
                                <?=$' . $db->createFieldItem($val) . '?> 
                            </label>';

                $fval .= '<?php endforeach; ?>';
                $fval .= '<?php } ?>';
            } else {
                $arrChkj = explode(',', $col_keys);
                if (!empty($arrChkj)) {
                    foreach ($arrChkj as $Chkj):
                        $fval .= '<?php $ex_' . $db->createFieldItem($val) . '_' . $db->createFieldItem($Chkj) . '=$obj->SelectAllByVal($table,&#8216;id&#8216;,$_GET[&#8216;edit&#8216;],&#8216;' . $db->createFieldItem($val) . '_' . $db->createFieldItem($Chkj) . '&#8216;); ?>';
                        $fval .= '<label class=&#8216;checkbox&#8216;>
                                <input <?php if($ex_' . $db->createFieldItem($val) . '_' . $db->createFieldItem($Chkj) . '==&#8216;' . $Chkj . '&#8216;){ ?> checked=&#8216;checked&#8216; <?php } ?> type=&#8216;checkbox&#8216; name=&#8216;' . $db->createFieldItem($val) . '_' . $db->createFieldItem($Chkj) . '&#8216;  class=&#8216;checkbox&#8216; value=&#8216;' . $Chkj . '&#8216; />
                                ' . $Chkj . '
                            </label>';
                    endforeach;
                }
            }


            $area_space = "9";
        }elseif ($col == 8) {
            $fval = '';

            $arrChkj = explode(',', $col_keys);

            if (!empty($arrChkj)) {

                //$fval .= '<div class=&#8216;widget-body uniformjs&#8216;>';
                $genIDSl = 0;
                $fval .= '<?php $ex_' . $db->createFieldItem($val) . '=$obj->SelectAllByVal($table,&#8216;id&#8216;,$_GET[&#8216;edit&#8216;],&#8216;' . $db->createFieldItem($val) . '&#8216;); ?>';
                foreach ($arrChkj as $Chkj):

                    $fval .= '<label class=&#8216;radio&#8216;>
                                <input <?php if($ex_' . $db->createFieldItem($val) . '==&#8216;' . $Chkj . '&#8216;){ ?> checked=&#8216;checked&#8216; <?php } ?> type=&#8216;radio&#8216; id=&#8216;' . $db->createFieldItem($val) . '_' . $db->createFieldItem($Chkj) . '_' . $genIDSl . '&#8216; name=&#8216;' . $db->createFieldItem($val) . '&#8216;  class=&#8216;checkbox&#8216; value=&#8216;' . $Chkj . '&#8216; />
                                ' . $Chkj . '
                            </label>';
                    $genIDSl++;
                endforeach;
                //$fval .= '</div>';
            }

            $area_space = "9";
        }

        @$content .= '<div class=&#8216;form-group&#8216;>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> ' . $val . ' </label>

                            <div class=&#8216;col-sm-' . $area_space . '&#8216;>
                                    ' . $fval . '
                            </div>
                    </div>';

        // @$content .= 
    }



    @$content .= '<div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button  onclick="javascript:return confirm(&#8216;Do You Want change/update These Record?&#8216;)"  type="submit" name="update" class="btn btn-primary">Save Change</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
							<?php }else{ ?>
                            <!-- Widget heading -->
                            <div class="widget-head">
                                <h4 class="heading">Create New ' . $table . '</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body">';

    if ($upload_image) {
        $content .= '<form enctype=&#8216;multipart/form-data&#8216;';
    } elseif ($upload_file) {
        $content .= '<form enctype=&#8216;multipart/form-data&#8216;';
    } else {
        $content .= '<form ';
    }

    @$content .= ' class="form-horizontal" method="post" action="" role="form">';

    $input_file = false;
    foreach ($field as $index => $val) {

        $col = mysqli_real_escape_string($con, $_POST['field_type'][$index]);
        $col_table = mysqli_real_escape_string($con, $_POST['field_table'][$index]);
        $col_keys = mysqli_real_escape_string($con, $_POST['field_option'][$index]);
        $val = mysqli_real_escape_string($con, $val);

        if ($col == 0) {
            $fval = "<input type=&#8216;text&#8216; id=&#8216;form-field-1&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; placeholder=&#8216;" . $val . "&#8216; class=&#8216;form-control&#8216; />";
            $area_space = "9";
        } elseif ($col == 1) {
            $fval = "<textarea id=&#8216;form-field-1&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; placeholder=&#8216;" . $val . "&#8216; class=&#8216;summernote&#8216;></textarea>";
            $area_space = "9";
        } elseif ($col == 2) {
            $fval = "<input type=&#8216;text&#8216; id=&#8216;form-field-1&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; placeholder=&#8216;" . $val . "&#8216; class=&#8216;form-control&#8216; />";
            $area_space = "6";
        } elseif ($col == 3) {
            $input_file = true;
            //$fval = "<input type=&#8216;file&#8216; id=&#8216;id-input-file-1&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; placeholder=&#8216;" . $val . "&#8216; class=&#8216;form-control&#8216; />";
            $fval = '<?php 
                    echo $plugin->FileUploadBox(0,&#8216;&#8216;,&#8216;' . $db->createFieldItem($val) . '&#8216;);
                    ?>';
            $area_space = "3";
        } elseif ($col == 4) {
            $input_file = true;
            //$fval = "<input type=&#8216;file&#8216; id=&#8216;id-input-file-2&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; placeholder=&#8216;" . $val . "&#8216; class=&#8216;form-control&#8216; />";
            $fval = '<?php 
                    echo $plugin->FileUploadBox(0,&#8216;&#8216;,&#8216;' . $db->createFieldItem($val) . '&#8216;);
                   ?>';
            $area_space = "3";
        } elseif ($col == 5) {
            $fval = '<select id=&#8216;form-field-1&#8216; name=&#8216;' . $db->createFieldItem($val) . '&#8216; class=&#8216;form-control&#8216;>';
            $fval .= '<option value=&#8216;0&#8216;>Please Select</option>';
            $getKeys = explode(",", $col_keys);
            $firstKey = $getKeys[0];
            $secondKey = $getKeys[1];
            $fval .= '<?php $sql' . $db->createFieldItem($val) . '=$obj->FlyQuery(&#8216;SELECT ' . $col_keys . ' FROM `' . $col_table . '`&#8216;);
                        if(!empty($sql' . $db->createFieldItem($val) . '))
                        {
                            foreach ($sql' . $db->createFieldItem($val) . ' as $' . $db->createFieldItem($val) . '): ?>';
            $fval .= '<option value=&#8216;<?=$' . $db->createFieldItem($val) . '->';
            $fval .= $firstKey;
            $fval .= '?>&#8216;>';
            $fval .= '<?=$' . $db->createFieldItem($val) . '->';
            $fval .= $secondKey;
            $fval .= '?></option>';
            $fval .= '<?php endforeach; ?>';
            $fval .= '<?php } ?>';
            $fval .= '</select>';


            $area_space = "9";
        } elseif ($col == 6) {
            $fval = '<select id=&#8216;form-field-1&#8216; name=&#8216;' . $db->createFieldItem($val) . '&#8216; class=&#8216;form-control&#8216;>';
            $fval .= '<option value=&#8216;0&#8216;>Please Select</option>';
            $fval .= '<?php   
                        $SSarr' . $db->createFieldItem($val) . '=&#8216;' . $col_keys . '&#8216;;
                        $sql' . $db->createFieldItem($val) . '=explode(&#8216;,&#8216;,$SSarr' . $db->createFieldItem($val) . ');
                        if(!empty($sql' . $db->createFieldItem($val) . '))
                        {
                            foreach ($sql' . $db->createFieldItem($val) . ' as $' . $db->createFieldItem($val) . '): ?>';
            $fval .= '<option value=&#8216;<?=$' . $db->createFieldItem($val) . '?>&#8216;>';
            $fval .= '<?=$' . $db->createFieldItem($val) . '?></option>';
            $fval .= '<?php endforeach; ?>';
            $fval .= '<?php } ?>';
            $fval .= '</select>';

            $area_space = "9";
        } elseif ($col == 7) {
            $fval = '';
            if (!empty($col_table)) {
                $getKeys = explode(",", $col_keys);
                $firstKey = $getKeys[0];
                $secondKey = $getKeys[1];
                $fval .= '<?php 
                        $sql' . $db->createFieldItem($val) . '=$obj->FlyQuery(&#8216;SELECT ' . $col_keys . ' FROM `' . $col_table . '`&#8216;);
                        if(!empty($sql' . $db->createFieldItem($val) . '))
                        {
                            foreach ($sql' . $db->createFieldItem($val) . ' as $' . $db->createFieldItem($val) . '): ?>';


                $fval .= '<label class=&#8216;checkbox&#8216;>
                                <input type=&#8216;checkbox&#8216; name=&#8216;<?=$' . $db->createFieldItem($val) . '->'.$secondKey.'?>&#8216;  class=&#8216;checkbox&#8216; value=&#8216;<?=$' . $db->createFieldItem($val) . '->'.$firstKey.'?>&#8216; />
                                <?=$' . $db->createFieldItem($val) . '->'.$secondKey.'?> 
                            </label>';

                $fval .= '<?php endforeach; ?>';
                $fval .= '<?php } ?>';
            } else {
                $arrChkj = explode(',', $col_keys);
                if (!empty($arrChkj)) {

                    //$fval .= '<div class=&#8216;widget-body uniformjs&#8216;>';
                    foreach ($arrChkj as $Chkj):
                        $fval .= '<label class=&#8216;checkbox&#8216;>
                                <input type=&#8216;checkbox&#8216; name=&#8216;' . $db->createFieldItem($val) . '_' . $db->createFieldItem($Chkj) . '&#8216;  class=&#8216;checkbox&#8216; value=&#8216;' . $Chkj . '&#8216; />
                                ' . $Chkj . '
                            </label>';
                    endforeach;
                    //$fval .= '</div>';
                }
            }
            $area_space = "9";
        }elseif ($col == 8) {
            $fval = '';

            $arrChkj = explode(',', $col_keys);

            if (!empty($arrChkj)) {

                //$fval .= '<div class=&#8216;widget-body uniformjs&#8216;>';
                $genIDSl = 0;
                foreach ($arrChkj as $Chkj):

                    $fval .= '<label class=&#8216;radio&#8216;>
                                <input type=&#8216;radio&#8216; id=&#8216;' . $db->createFieldItem($val) . '_' . $db->createFieldItem($Chkj) . '_' . $genIDSl . '&#8216; name=&#8216;' . $db->createFieldItem($val) . '&#8216;  class=&#8216;checkbox&#8216; value=&#8216;' . $Chkj . '&#8216; />
                                ' . $Chkj . '
                            </label>';
                    $genIDSl++;
                endforeach;
                //$fval .= '</div>';
            }

            $area_space = "9";
        }

//        if ($col == 5) {
//             @$content .= '<div class=&#8216;form-group&#8216;>
//                            <label  for="inputEmail3" class="col-sm-2 control-label"> ' . $val . ' </label>
//
//                            <div class=&#8216;col-sm-' . $area_space . '&#8216;>
//                            <select id=&#8216;form-field-1&#8216; name=&#8216;" . $db->createFieldItem($val) . "&#8216; class=&#8216;form-control&#8216;>';
//            @$content .= '  <option value=&#8216;0&#8216;>Please Select</option>'; 
//            
//            @$content .= '  <option value=&#8216;0&#8216;>Please Select</option>'; 
//             
//             
//             @$content .= '</select></div></div>';
//             
//        } else {
        @$content .= '<div class=&#8216;form-group&#8216;>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> ' . $val . ' </label>

                            <div class=&#8216;col-sm-' . $area_space . '&#8216;>
                                    ' . $fval . '
                            </div>
                    </div>';
        //}
    }



    @$content .= '<div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit"   onclick="javascript:return confirm(&#8216;Do You Want Create/save These Record?&#8216;)"  name="create" class="btn btn-info">Save</button>
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
        <?php include(&#8216;include/footer.php&#8216;); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    
    <?php echo $plugin->TableJs(); ';

    if ($upload_image == true && $upload_file == true) {
        @$content .= ' echo $plugin->FileUploadJS(); ';
    } elseif ($upload_image == true && $upload_file == false) {
        @$content .= ' echo $plugin->FileUploadJS(); ';
    } elseif ($upload_image == false && $upload_file == true) {
        @$content .= ' echo $plugin->FileUploadJS(); ';
    }

    if ($text_area_flag == true) {
        @$content .= ' echo $plugin->TextAreaJS(); ';
    }

    if ($checkbox_option_flag == true) {
        @$content .= ' echo $plugin->CheckBoxJS(); ';
    }

    @$content .= ' ?> ';

    if ($input_file) {

        @$content .= '<script type=&#8216;text/javascript&#8216;>
				jQuery(function($) {
					$(&#8216;#id-input-file-1&#8216;).ace_file_input({
                                            no_file:&#8216;No File ...&#8216;,
                                            btn_choose:&#8216;Choose&#8216;,
                                            btn_change:&#8216;Change&#8216;,
                                            droppable:true,
                                            onchange:null,
                                            thumbnail:true
					});
	
				})
			</script>';
    }


    @$content .= '</body>
</html>';

    @$content_view = '<?php
$table="' . $table_name . '"; ?>';

    @$content_view .= '<?php 
include(&#8216;class/auth.php&#8216;);
include(&#8216;plugin/plugin.php&#8216;);
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
		echo $plugin->TableCss();
		echo $plugin->KendoCss();
		 ?>
    </head>
    <body class="">
		<?php 
		include(&#8216;include/topnav.php&#8216;); 
		include(&#8216;include/mainnav.php&#8216;); 
		?>
        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">' . $table . ' Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="' . $filename . '">Create New ' . $table . '</a></li>
                    <li class="active"><a href="#">' . $table . ' Data List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="' . $table_name . '_' . $table_id . '"></div>
            </div>
        </div>
        <!-- // ' . $table . ' END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & ' . $table . ' wrapper END -->
        
        <?php include(&#8216;include/footer.php&#8216;); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_' . $table_name . '" type="text/x-kendo-template">
             <a class="k-button k-button-icontext k-grid-edit" href="' . $filename . '?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
            </script>
    <script id="delete_' . $table_name . '" type="text/x-kendo-template">
                    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
            </script>        
    <script type="text/javascript">
                function deleteClick(' . $table_name . '_id) {
                    var c = confirm("Do you want to delete?");
                    if (c === true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "./controller/' . $filename_controller . '",
                            data: {id: ' . $table_name . '_id,table:"' . $table_name . '",acst:3},
                            success: function (result) {
							if(result==1)
							{
								location.reload();
							}
							else
							{
								$(".k-i-refresh").click();
							}
                            }
                        });
                    }
                }

            </script>
            <script type="text/javascript">
                jQuery(document).ready(function () {
					var postarray={"id":1};
                    var dataSource = new kendo.data.DataSource({
                        pageSize: 5,
                        transport: {
                            read: {
                                url: "./controller/' . $filename_controller . '",
                                type: "POST",
								data:
								{
									"acst":1, //action status sending to json file
									"table":"' . $table_name . '",
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
                                    id: {nullable: true},';

    foreach ($field as $index => $val) {

        $col = mysqli_real_escape_string($con, $_POST['field_type'][$index]);
        $col_table = mysqli_real_escape_string($con, $_POST['field_table'][$index]);
        $col_keys = mysqli_real_escape_string($con, $_POST['field_option'][$index]);
        $val = mysqli_real_escape_string($con, $val);

        if ($col == 7) {
            $arrChkj = explode(',', $col_keys);
            if (!empty($arrChkj)) {
                foreach ($arrChkj as $Chkj):
                    @$content_view .= $db->createFieldItem($val) . '_' . $db->createFieldItem($Chkj) . ': {type: "string"},';
                endforeach;
            }
        } else {
            if ($db->createFieldItem($val) != 'id' || $db->createFieldItem($val) != 'date' || $db->createFieldItem($val) != 'status') {
                @$content_view .= $db->createFieldItem($val) . ': {type: "string"},';
            }
        }
    }



    @$content_view .= '
									date: {type: "string"}
                                }
                            }
                        }
                    });
                    jQuery("#' . $table_name . '_' . $table_id . '").kendoGrid({
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
                        columns: [{field: "id", title: "#"},';

    foreach ($field as $index => $val) {

        $col = mysqli_real_escape_string($con, $_POST['field_type'][$index]);
        $col_table = mysqli_real_escape_string($con, $_POST['field_table'][$index]);
        $col_keys = mysqli_real_escape_string($con, $_POST['field_option'][$index]);
        $val = mysqli_real_escape_string($con, $val);

        if ($col == 7) {
            $arrChkj = explode(',', $col_keys);
            if (!empty($arrChkj)) {
                foreach ($arrChkj as $Chkj):
                    @$content_view .= '{field: "' . $db->createFieldItem($val) . '_' . $db->createFieldItem($Chkj) . '", title: "' . $db->createFieldItem($Chkj) . '"},';
                endforeach;
            }
        } else {
            if ($db->createFieldItem($val) != 'id' || $db->createFieldItem($val) != 'date' || $db->createFieldItem($val) != 'status') {
                @$content_view .= '{field: "' . $db->createFieldItem($val) . '", title: "' . $val . '"},';
            }
        }
    }

    @$content_view .= '
							{field: "date", title: "Record Added", width: "150px"},
							{
                                title: "Edit",
                                template: kendo.template($("#edit_' . $table_name . '").html())
                            },
							{
                                title: "Delete",
                                template: kendo.template($("#delete_' . $table_name . '").html())
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
</html>';

    @$content_controller = '<?php
                            include("../class/auth.php");
                            header("Content-type: application/json");
                            $status=$_POST[&#8216;acst&#8216;];
                            if ($status == 1) {
                                extract($_POST);
                                if ($cond == 0) {
                                    $arrayBanner=$obj->FlyQuery("SELECT * FROM ".$table);
                                    echo "{\"data\":" . json_encode($arrayBanner) . "}";
                                }elseif ($cond == 1) {
                                    $arrayBanner=$obj->SelectAllByID_Multiple($table, $multi);
                                    echo "{\"data\":" . json_encode($arrayBanner) . "}";
                                }elseif ($cond == 2) {
                                    $arrayBanner=$obj->FlyQuery($table);
                                    echo "{\"data\":" . json_encode($arrayBanner) . "}";
                                }
                            }elseif ($status == 3) {
                                extract($_POST);
                                if ($obj->TotalRows($table) == 1) {
                                    $arrayBanner=$obj->delete($table, array("id"=>$id));
                                    echo 1;
                                }else {
                                    $arrayBanner=$obj->delete($table, array("id"=>$id));
                                    echo 2;
                                }
                            }
                            ?>';



    $db->CreatePhpFile($filename, $content); //create file
    $db->CreatePhpFile($filename_data, $content_view); //view file
    $db->CreatePhpFileWithDiffLocal($filename_controller, $content_controller, './controller/'); //view file

















    $plugin->Success("Your Table Information Has Been Generated Successfully", $obj->filename());
} else {
    $plugin->Error("Failed To Create Table, Please FIx & Try Again.", $obj->filename());
}