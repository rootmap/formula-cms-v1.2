<?php

include('../class/auth.php');
header("Content-type: application/json");
$status=$_POST['acst'];
if ($status == 1) {
    extract($_POST);
    if ($cond == 0) {
        $arrayBanner=$obj->SelectAll($table);
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
}elseif ($status == 4) {
    extract($_POST);
    $df='<option value="">Please Select</option>';
    $sqllistload=$obj->FlyQuery("SELECT `" . $ff1 . "`,`" . $ff2 . "`,`" . $fid . "` FROM `" . $table . "` WHERE `" . $fid . "`='" . $fval . "'");
    if (!empty($sqllistload)) {
        foreach ($sqllistload as $load):
            $df .='<option value="' . $load->$ff1 . '">' . $load->$ff2 . '</option>';
        endforeach;
    }

    echo json_encode(array("stv"=>$df));
}
?>