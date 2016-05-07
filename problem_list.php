<?php
require_once("modules/link_db.php");
require_once("include/func.php");
require_once("include/config.php");

session_start();

$PAGE_NAME = "problem_list.php";

$cur_page = isset($_GET["page"]) ? $_GET["page"] : 1;
//1 - indexed

$ld = new link_db();
$ld -> init();

$tot_prob_num = $ld -> prob_tot_num();
$tot_page_num = ceil($tot_prob_num / $ELEM_PER_PAGE);

$last_page = $tot_page_num;
$first_page = 1;

if($cur_page < $first_page || $cur_page > $last_page) {
    $ld -> close();
    header("Location: info.php?class=danger&info=PAGE_NOT_FOUND");
    exit;
}

$prob_info = NULL;
$ld -> fetch_prob_list(1 + ($cur_page - 1) * $ELEM_PER_PAGE, $ELEM_PER_PAGE, $prob_info);
$ld -> close();

require_once("views/problem_list.php");
?>