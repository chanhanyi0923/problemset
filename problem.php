<?php
require_once("modules/link_db.php");
require_once("include/func.php");
require_once("include/config.php");

session_start();

$PAGE_NAME = "problem.php";

$prob_id = isset($_GET["pid"]) ? $_GET["pid"] : NULL;

if(!is_numeric($prob_id)) {
    header("Location: info.php?class=danger&info=PID_NOT_NUM");
    exit;
}

$ld = new link_db();
$ld -> init();

$suc = $ld -> fetch_prob($prob_id, $owner, $title, $desc, $choice, $options, $ans, $det_ans);
$ld -> close();

if(!$suc) {
    header("Location: info.php?class=danger&info=PROB_NOT_FOUND");
    exit;
}

if($choice == true) {
    $option = NULL;
    sep($options, $option, false);
}

require_once("views/problem.php");
?>