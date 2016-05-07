<?php
require_once("include/config.php");
require_once("include/func.php");
require_once("modules/link_db.php");

session_start();

if(!check_login()) {
    header("Location: info.php?class=danger&info=NOT_LOG");
    exit;
}

$post_var_name = array("id", "title", "pid_col");
foreach($post_var_name as $elem) {
    $GLOBALS[$elem] = isset($_POST[$elem]) ? $_POST[$elem] : NULL;
}

$not_empty_var_name = $post_var_name;
foreach($not_empty_var_name as $elem) {
    if(empty($GLOBALS[$elem])) {
        header("Location: info.php?class=danger&info=PROB_SET_INFO_EMPTY");
        exit;
    }
}

if(!is_numeric($id)) {
    header("Location: info.php?class=danger&info=PID_NOT_NUM");
    exit;
}
$id = intval($id);

$pid = NULL;
sep($pid_col, $pid, true);

if(count($pid) == 0) {
    header("Location: info.php?class=danger&info=PROB_SET_INFO_EMPTY");
    exit;
}


$ld = new link_db();
$ld -> init();

$suc = true;
$suc = $suc && $ld -> fetch_prob_set_pid($id, $ori_pid);
$suc = $suc && $ld -> fetch_prob_set_info($id, $ori_title, $ori_owner);

$owner = $suc ? $ori_owner : $_SESSION["login"];

$cur_pri = $ld -> fetch_ac_by_userid("pri", $_SESSION["login"]);
$owner_pri = $ld -> fetch_ac_by_userid("pri", $owner);
if($cur_pri < max($PRI_EDIT, $owner_pri)) {
    $ld -> close();
    header("Location: info.php?class=danger&info=LOW_PRI");
    exit;
}

if($suc) {
    $ld -> delete_prob_set($id);
    if(!$ld -> insert_prob_set($title, $owner, $pid, $id)) {
        $ld -> delete_prob_set($id);
        $ld -> insert_prob_set($ori_title, $ori_owner, $ori_pid, $id);
        echo "err";
    }
} else {
    if(!$ld -> insert_prob_set($title, $owner, $pid, $id)) {
        $ld -> delete_prob_set($id);
        echo "err";
    }
}
$ld -> close();
?>