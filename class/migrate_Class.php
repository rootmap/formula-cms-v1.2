<?php

class migrate_class {

    function createFieldItem($object) {
        $obj = new db_class();
        $con = $obj->open();

        if (!empty($object)) {
            $object = mysqli_real_escape_string($con, $object);
            $object_space_remove = str_replace(" ", "_", $object);
            $object_lower_string = strtolower($object_space_remove);

            return $object_lower_string;
        } else {
            $obj->close($con);
            return 0;
        }
    }

    function CreateTable($object, $object_array) {
        $obj = new db_class();
        $con = $obj->open();
        $count = 0;
        $fields = '';
        if (!empty($object)) {
            $object = mysqli_real_escape_string($con, $object);
            $count_objject_array = count($object_array);
            if ($count_objject_array != 0) {
                foreach ($object_array as $col => $val) {
                    if ($count++ != 0)
                        $fields .= ', ';
                    $col = mysqli_real_escape_string($con, $col);
                    $val = mysqli_real_escape_string($con, $val);
                    $fields .= "$col  $val";
                    if ($col != "id" || $col != "date" || $col != "status") {
                        $custom_fields[] = $col;
                    }
                }
                if ($object != "employee.php" || $object != "login.php" || $object != "logout.php" || $object != "employee_list.php" || $object != "employee_list_json.php" || $object != "setting.php" || $object != "index.php") {
                    $sql = "CREATE TABLE IF NOT EXISTS `$object` ($fields)";

                    $excutequery = mysqli_query($con, $sql);
                    if ($excutequery) {
//                        $newview_table = $object . "_view";
//                        $sql_view = "CREATE OR REPLACE VIEW `$newview_table` AS SELECT * FROM `$object`";
//                        mysqli_query($con, $sql_view);
                        $obj->close($con);
                        return 1;
                    } else {
                        $obj->close($con);
                        return 2;
                    }
                } else {
                    $obj->close($con);
                    return 0;
                }
            } else {
                $obj->close($con);
                return 0;
            }
        } else {
            $obj->close($con);
            return 0;
        }
    }

    function CreatePhpFile($object, $content) {
        if ($object != "employee.php" || $object != "login.php" || $object != "logout.php" || $object != "employee_list.php" || $object != "employee_list_json.php" || $object != "setting.php" || $object != "index.php")
            $myFile = $object; // or .php   
        $fh = fopen($myFile, 'w'); // or die("error");  
        $stringData = $content;
        $replace_double_cumma = str_replace("&#8216;", "'", $stringData);
        $rfile = fwrite($fh, $replace_double_cumma);
        return $rfile;
    }

    function CreatePhpFileWithDiffLocal($object, $content,$location) {
        if ($object != "employee.php" || $object != "login.php" || $object != "logout.php" || $object != "employee_list.php" || $object != "employee_list_json.php" || $object != "setting.php" || $object != "index.php")
            $myFile = $object; // or .php   
        $fh = fopen($location.$myFile, 'w'); // or die("error");  
        $stringData = $content;
        $replace_double_cumma = str_replace("&#8216;", "'", $stringData);
        $rfile = fwrite($fh, $replace_double_cumma);
        return $rfile;
    }

    function DropTable($object) {
        $obj = new db_class();
        $con = $obj->open();
        $query = "DROP TABLE IF EXISTS `$object`";
        $query2 = "DROP VIEW IF EXISTS " . $object . "_view";
        if (mysqli_query($con, $query)) {
            mysqli_query($con, $query2);
            $obj->close($con);
            return 1;
        } else {
            return 0;
        }
    }

}

?>
