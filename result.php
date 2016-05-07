<?php
require_once("modules/link_db.php");
require_once("include/func.php");
require_once("include/config.php");

session_start();

if(!check_login()) {
    header("Location: info.php?class=danger&info=NOT_LOG");
    exit;
}

$PAGE_NAME = "result.php";

$submit_ans = isset($_POST["ans"]) ? $_POST["ans"] : NULL;
$prob_id = isset($_POST["pid"]) ? $_POST["pid"] : NULL;

if(!is_numeric($prob_id)) {
    header("Location: info.php?class=danger&info=PID_NOT_NUM");
    exit;
}

$ld = new link_db();
$ld -> init();
$suc = $ld -> fetch_prob($prob_id, $owner, $title, $desc, $choice, $options, $ans, $det_ans);

if(!$suc) {
    $ld -> close();
    header("Location: info.php?class=danger&info=PROB_NOT_FOUND");
    exit;
}

if($choice == true) {
    $option = NULL;
    sep($options, $option, false);
}

$result = ($ans == $submit_ans);
$ld -> update_prob_status($prob_id, $_SESSION["login"], $result);
$ld -> close();
require_once("views/result.php");
?>