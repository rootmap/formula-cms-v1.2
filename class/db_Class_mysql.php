<?php

class db_class {

    public function open() {
        $con=mysqli_connect("localhost", "root", "", "formula-cms");
        return $con;
    }

    function baseUrl($suffix='') {
        $protocol=strpos($_SERVER['SERVER_SIGNATURE'], '443') !== false ? 'https://' : 'http://';
        $web_root=$protocol . $_SERVER['HTTP_HOST'] . "/" . "formula-cms/";
        $suffix=ltrim($suffix, '/');
        return $web_root . trim($suffix);
    }

    public function close($con) {
        mysqli_close($con);
    }

    /**
     * Insert query for Object
     * @param type $object
     * @param type $object_array
     * @return string/Exception
     */
    function insert($object, $object_array) {
        $count=0;
        $fields='';
        $con=$this->open();
        foreach ($object_array as $col=> $val) {
            if ($count++ != 0)
                $fields .= ', ';
            $col=mysqli_real_escape_string($con, $col);
            $val=mysqli_real_escape_string($con, $val);
            $fields .= "`$col` = '$val'";
        }
        $query="INSERT INTO `$object` SET $fields";
        if (mysqli_query($con, $query)) {
            $this->close($con);
            return 1;
        }else {
            return 0;
        }
    }

    function insertAndReturnID($object, $object_array) {
        $count=0;
        $fields='';
        $con=$this->open();
        foreach ($object_array as $col=> $val) {
            if ($count++ != 0)
                $fields .= ', ';
            $col=mysqli_real_escape_string($con, $col);
            $val=mysqli_real_escape_string($con, $val);
            $fields .= "`$col` = '$val'";
        }
        $query="INSERT INTO `$object` SET $fields";
        if (mysqli_query($con, $query)) {
            $return_id=mysqli_insert_id($con);
            $this->close($con);
            return $return_id;
        }else {
            return 0;
        }
    }

    function lastid($object, $column) {
        $count=0;
        $fields='';
        $con=$this->open();
        $query="SELECT * FROM `$object` ORDER BY $column DESC LIMIT 1";
        $result=mysqli_query($con, $query);
        if ($result) {
            $count=mysqli_num_rows($result);

            if ($count >= 1) {
                //$object[]=array();
                while ($rows=$result->fetch_object()) {
                    $objects[]=$rows;
                }
                $this->close($con);
                return $objects;
            }
        }
    }

    /**
     * if the object is exists
     * @param type $object
     * @param type $object_array
     * @return int
     */
    function SelectAllByID_Multiple($object, $object_array) {
        $count=0;
        $fields='';
        $con=$this->open();
        foreach ($object_array as $col=> $val) {
            if ($count++ != 0)
                $fields .= ' AND ';
            $col=mysqli_real_escape_string($con, $col);
            $val=mysqli_real_escape_string($con, $val);
            $fields .= "`$col` = '$val' ";
        }

        $query="SELECT * FROM `$object` WHERE $fields";
        $result=mysqli_query($con, $query);
        if ($result) {
            $count=mysqli_num_rows($result);

            if ($count >= 1) {
                //$object[]=array();
                while ($rows=$result->fetch_object()) {
                    $objects[]=$rows;
                }
                $this->close($con);
                return $objects;
            }
        }else {
            $this->close($con);
            return 0;
        }
    }

    function exists_multiple($object, $object_array) {
        $count=0;
        $fields='';
        $con=$this->open();
        foreach ($object_array as $col=> $val) {
            if ($count++ != 0)
                $fields .= ' AND ';
            $col=mysqli_real_escape_string($con, $col);
            $val=mysqli_real_escape_string($con, $val);
            $fields .= "`$col` = '$val' ";
        }
        $query="SELECT * FROM `$object` WHERE $fields";
        $result=mysqli_query($con, $query);
        if ($result) {
            $count=mysqli_num_rows($result);
            $this->close($con);
            if ($count != 0) {
                return $count;
            }else {
                return 0;
            }
        }else {
            $this->close($con);
            return 0;
        }
    }

    function SelectAllByVal($object, $field, $fval, $fetch) {
        $link=$this->open();
        $sql="SELECT `$fetch` FROM `$object` WHERE `$field`='$fval'";
        $result=mysqli_query($link, $sql);
        if ($result) {
            $row=mysqli_fetch_array($result);
            return $row[$fetch];
        }
    }

    function SelectAllByVal2($object, $field, $fval, $field2, $fval2, $fetch) {
        $link=$this->open();
        $sql="SELECT `$fetch` FROM `$object` WHERE `$field`='$fval' AND `$field2`='$fval2'";
        $result=mysqli_query($link, $sql);
        if ($result) {
            $row=mysqli_fetch_array($result);
            return $row[$fetch];
        }
    }

    function TotalRows($object) {
        $count=0;
        $fields='';
        $con=$this->open();
        $query="SELECT * FROM `$object`";
        $result=mysqli_query($con, $query);
        if ($result) {
            $count=mysqli_num_rows($result);
            $this->close($con);
            return $count;
        }else {
            $this->close($con);
            return 0;
        }
    }

    /**
     * Select all the objects
     * @param type $object
     * @return array
     */
    function SelectAll($object) {
        $count=0;
        $fields='';
        $con=$this->open();
        $query="SELECT * FROM `$object`";
        $result=mysqli_query($con, $query);
        if ($result) {
            $count=mysqli_num_rows($result);

            if ($count >= 1) {
                //$object[]=array();
                while ($rows=$result->fetch_object()) {
                    $objects[]=$rows;
                }
                $this->close($con);
                return $objects;
            }
        }
    }

    function SelectAllOrder($object, $order) {
        $count=0;
        $fields='';
        $con=$this->open();
        $query="SELECT * FROM `$object` ORDER BY $order";
        $result=mysqli_query($con, $query);
        if ($result) {
            $count=mysqli_num_rows($result);

            if ($count >= 1) {
                //$object[]=array();
                while ($rows=$result->fetch_object()) {
                    $objects[]=$rows;
                }
                $this->close($con);
                return $objects;
            }
        }
    }

    function SelectAll_ddate($object, $field, $startdate, $enddate) {
        $count=0;
        $fields='';
        $con=$this->open();
        $query="SELECT * FROM `$object` WHERE `$field` >= '$startdate' AND `$field` <= '$enddate'";
        $result=mysqli_query($con, $query);
        if ($result) {
            $count=mysqli_num_rows($result);

            if ($count >= 1) {
                //$object[]=array();
                while ($rows=$result->fetch_object()) {
                    $objects[]=$rows;
                }
                $this->close($con);
                return $objects;
            }
        }
    }

    function SelectAllByIDOrderLimit($object, $object_array, $order, $limit) {
        $count=0;
        $fields='';
        $con=$this->open();
        if (count($object_array) <= 1) {
            foreach ($object_array as $col=> $val) {
                if ($count++ != 0)
                    $fields .= ', ';
                $col=mysqli_real_escape_string($con, $col);
                $val=mysqli_real_escape_string($con, $val);
                $fields .= "`$col` = '$val'";
            }
        }
        $query="SELECT * FROM `$object` WHERE $fields ORDER BY id $order LIMIT $limit";
        $result=mysqli_query($con, $query);
        if ($result) {
            $count=mysqli_num_rows($result);

            if ($count >= 1) {
                //$object[]=array();
                while ($rows=$result->fetch_object()) {
                    $objects[]=$rows;
                }
                $this->close($con);
                return $objects;
            }
        }else {
            $this->close($con);
            return 0;
        }
    }

    function SelectAllLimit($object, $limit) {
        $count=0;
        $fields='';
        $con=$this->open();
        $query="SELECT * FROM `$object` LIMIT $limit";
        $result=mysqli_query($con, $query);
        if ($result) {
            $count=mysqli_num_rows($result);

            if ($count >= 1) {
                //$object[]=array();
                while ($rows=$result->fetch_object()) {
                    $objects[]=$rows;
                }
                $this->close($con);
                return $objects;
            }
        }else {
            $this->close($con);
            return 0;
        }
    }

    /**
     * Select object by ID
     * @param type $object
     * @param type $object_array
     * @return int
     */

    /**
     * Delete the object from database
     * @param type $object
     * @param type $object_array
     * @return string|\Exception
     */
    function delete($object, $object_array) {
        $count=0;
        $fields='';
        $con=$this->open();
        if (count($object_array) <= 1) {
            foreach ($object_array as $col=> $val) {
                if ($count++ != 0)
                    $fields .= ', ';
                $col=mysqli_real_escape_string($con, $col);
                $val=mysqli_real_escape_string($con, $val);
                $fields .= "`$col` = '$val'";
            }
        }
        $query="Delete FROM `$object` WHERE $fields";
        if (mysqli_query($con, $query)) {

            $this->close($con);
            return 1;
        }else {
            return 0;
        }
    }

    /**
     * Delete the object
     * @param type $object
     * @param type $object_array
     */
    function update($object, $object_array) {
        $con_key_from_arr=array_keys($object_array);
        $key=$con_key_from_arr[0];
        $value=array_shift($object_array);
        $fields=array();
        $con=$this->open();
        foreach ($object_array as $field=> $val) {
            $fields[]="$field = '" . mysqli_real_escape_string($con, $val) . "'";
        }
        $query="UPDATE `$object` SET " . join(', ', $fields) . " WHERE $key = '$value'";

        if (mysqli_query($con, $query)) {

            $this->close($con);
            return 1;
        }else {
            return 0;
        }
    }

    function filename() {
        return basename($_SERVER['PHP_SELF']);
    }

    function amount_incre($object, $object_array, $field, $amount) {
        $con_key_from_arr=array_keys($object_array);
        $key=$con_key_from_arr[0];
        $value=array_shift($object_array);
        $fields=array();
        $con=$this->open();
        foreach ($object_array as $field=> $val) {
            $fields[]="$field = '" . mysqli_real_escape_string($con, $val) . "'";
        }
        $query="UPDATE `$object` SET `$field`=`$field`+'$amount' WHERE $key = '$value'";

        if (mysqli_query($con, $query)) {

            $this->close($con);
            return 1;
        }else {
            return 0;
        }
    }

    function amount_decre($object, $object_array, $field, $amount) {
        $con_key_from_arr=array_keys($object_array);
        $key=$con_key_from_arr[0];
        $value=array_shift($object_array);
        $fields=array();
        $con=$this->open();
        foreach ($object_array as $field=> $val) {
            $fields[]="$field = '" . mysqli_real_escape_string($con, $val) . "'";
        }
        $query="UPDATE `$object` SET `$field`=`$field`-'$amount' WHERE $key = '$value'";

        if (mysqli_query($con, $query)) {
            $this->close($con);
            return 1;
        }else {
            return 0;
        }
    }

    function limit_words($string, $word_limit) {
        $words=explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit)) . "...";
    }

    function dmy($month) {
        $chkj=strlen($month);
        if ($chkj == 1) {
            return $chkjval="0" . $month;
        }else {
            return $chkjval=$month;
        }
    }

}

?>
