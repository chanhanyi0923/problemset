<?php
require_once("modules/link_db.php");
require_once("include/config.php");
require_once("include/func.php");

session_start();

$PAGE_NAME = "prob_set.php";

$set_id = isset($_GET["sid"]) ? $_GET["sid"] : NULL;

if(!is_numeric($set_id)) {
    header("Location: info.php?class=danger&info=SID_NOT_NUM");
    exit;
}

$ld = new link_db();
$ld -> init();

$suc = true;
$suc = $suc && $ld -> fetch_prob_set_pid($set_id, $pid);
$suc = $suc && $ld -> fetch_prob_set_info($set_id, $title, $owner);
if(!$suc) {
    header("Location: info.php?class=danger&info=PROB_SET_NOT_FOUND");
    exit;
}

sort($pid);
$prob_info = NULL;
for($i = 0; $i < count($pid); $i ++) {
	$prob_info[$i]["title"] = $ld -> fetch_prob_title($pid[$i]);
	$prob_info[$i]["id"] = $pid[$i];
}

if(check_login()) {
    $aid = $ld -> fetch_ac_by_userid("id", $_SESSION["login"]);
    for($i = count($prob_info) - 1; $i > -1; $i --) {
        $prob_info[$i]["status"] = $ld -> fetch_prob_status($aid, $prob_info[$i]["id"]);
	}
}
$ld -> close();

require_once("views/prob_set.php");
?>
