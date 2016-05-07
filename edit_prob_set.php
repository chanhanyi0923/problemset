<?php
require_once("modules/link_db.php");
require_once("include/config.php");
require_once("include/func.php");

session_start();

if(!check_login()) {
    header("Location: info.php?class=danger&info=NOT_LOG");
    exit;
}

$PAGE_NAME = "edit_prob_set.php";

$mod = !empty($_GET["mod"]) ? $_GET["mod"] : "new";
$title = NULL;
$owner = NULL;
$pid_col = NULL;

$ld = new link_db();
$ld -> init();

switch($mod) {
    case "new" :
        $id = 1 + $ld -> prob_set_last_id();
        $owner = $_SESSION["login"];
    break;
    
    case "edit" :
        $id = isset($_GET["sid"]) ? $_GET["sid"] : NULL;
        if(!is_numeric($id)) {
            header("Location: info.php?class=danger&info=SID_NOT_NUM");//not check
            exit;
        }
        $suc = true;
        $suc = $suc && $ld -> fetch_prob_set_pid($id, $pid);
        $suc = $suc && $ld -> fetch_prob_set_info($id, $title, $owner);

        if(!$suc) {
            header("Location: info.php?class=danger&info=PROB_SET_NOT_FOUND");//not check
            exit;
        }
        
        $pid_col = $pid[0];
        for($i = 1; $i < count($pid); $i ++) {
            $pid_col .= ", ".$pid[$i];
        }
    break;
}

$cur_pri = $ld -> fetch_ac_by_userid("pri", $_SESSION["login"]);
$owner_pri = $ld -> fetch_ac_by_userid("pri", $owner);
$ld -> close();

if($cur_pri < max($PRI_EDIT, $owner_pri)) {
    header("Location: info.php?class=danger&info=LOW_PRI");
    exit;
}

require_once("views/edit_prob_set.php");
?>