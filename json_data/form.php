<?php

include("../class/auth.php");
extract($_POST);
//bot engine
$postdata = http_build_query(
        array(
            'EID' => $EID,
            'ID' => $ID
        )
);

$opts = array('http' =>
    array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context = stream_context_create($opts);

$result = file_get_contents('http://bou.ac.bd/show_result.php', false, $context);
//echo $result;
//bot 1st step complete
//bot grab text start
$sPattern = "/<td bgcolor=\"#D7F0F2\" class=\"txt2\"><div align=\"center\">(.*?)<\/div><\/td>/s";
$sText = $result;
preg_match_all($sPattern, $sText, $aMatch);
$name = str_replace("  ", "", strip_tags(html_entity_decode($aMatch[1][0])));
$resultgot = str_replace("  ", "", strip_tags(html_entity_decode($aMatch[1][2])));
if (!empty($name)) {
    // process data



    $table = "result_record";

    $chk = $obj->exists_multiple($table,array('student_id' => $ID));
    if ($chk == 0) {
        $insert = array('subject_id' => $EID, 'student_id' => $ID, 'student_name' => $name, 'student_gpa' => $resultgot, 'date' => date('Y-m-d'), 'status' => 1);
        if ($obj->insert($table, $insert) == 1) {
            echo 1;
        } else {
            echo 2;
        }
    }
} else {
    echo 0;
}
?>