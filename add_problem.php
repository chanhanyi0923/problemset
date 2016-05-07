<?php
require_once("include/config.php");
require_once("include/func.php");
require_once("modules/link_db.php");

session_start();

if(!check_login()) {
    header("Location: info.php?class=danger&info=NOT_LOG");
    exit;
}

if(isset($_POST["choice"]) && $_POST["choice"] == "1") {
    $post_var_name = array("id", "title", "desc", "choice", "options", "ans", "det_ans");
    $not_empty_var_name = array("id", "title", "desc", "choice", "options", "ans");
} else {
    $choice = 0;
    $options = NULL;
    $post_var_name = array("id", "title", "desc", "ans", "det_ans");
    $not_empty_var_name = array("id", "title", "desc", "ans");
}

foreach($post_var_name as $elem) {
    $GLOBALS[$elem] = isset($_POST[$elem]) ? $_POST[$elem] : NULL;
}
foreach($not_empty_var_name as $elem) {
    if(empty($GLOBALS[$elem])) {
        header("Location: info.php?class=danger&info=PROB_INFO_EMPTY");
        exit;
    }
}
if(!is_numeric($id)) {
    header("Location: info.php?class=danger&info=PID_NOT_NUM");
    exit;
}
$id = intval($id);

$ld = new link_db();
$ld -> init();

if($id == -1) {
    $owner = $_SESSION["login"];
} else {
    $ld -> fetch_prob($id, $owner, $ori_title, $ori_desc, $ori_choice, $ori_options, $ori_ans, $ori_det_ans);
}

$cur_pri = $ld -> fetch_ac_by_userid("pri", $_SESSION["login"]);
$owner_pri = $ld -> fetch_ac_by_userid("pri", $owner);
if($cur_pri < max($PRI_EDIT, $owner_pri)) {
    $ld -> close();
    header("Location: info.php?class=danger&info=LOW_PRI");
    exit;
}


if($id == -1) {
    $ld -> insert_prob($owner, $title, $desc, $choice, $options, $ans, $det_ans);
} else {
    $ld -> update_prob($owner, $title, $desc, $choice, $options, $ans, $det_ans, $id);
}

$ld -> close();
?>