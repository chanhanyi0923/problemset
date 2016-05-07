<?php
require_once("modules/link_db.php");
require_once("include/config.php");
require_once("include/func.php");

session_start();

if(!check_login()) {
    header("Location: info.php?class=danger&info=NOT_LOG");
    exit;
}

$PAGE_NAME = "edit_problem.php";

$mod = !empty($_GET["mod"]) ? $_GET["mod"] : "new";
$title = NULL;
$owner = NULL;
$ans = NULL;
$choice = false;
$options = NULL;
$desc = NULL;
$det_ans = NULL;

$ld = new link_db();
$ld -> init();

switch($mod) {
    case "new" :
        $id = -1;
        $cur_prob_id = 1 + $ld -> prob_last_id();
        $owner = $_SESSION["login"];
    break;
    
    case "edit" :
        $id = isset($_GET["pid"]) ? $_GET["pid"] : NULL;
        if(!is_numeric($id)) {
            header("Location: info.php?class=danger&info=PID_NOT_NUM");
            exit;
        }
        $cur_prob_id = $id;
        $suc = $ld -> fetch_prob($id, $owner, $title, $desc, $choice, $options, $ans, $det_ans);
        if(!$suc) {
            header("Location: info.php?class=danger&info=PROB_NOT_FOUND");
            exit;
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

require_once("views/edit_problem.php");
?>