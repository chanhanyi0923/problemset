<?php
require_once("include/config.php");
require_once("include/func.php");
require_once("modules/link_db.php");

if(!isset($_SESSION))
    session_start();

$ld = new link_db();
$ld -> init();
$cur_pri = check_login() ? $ld -> fetch_ac_by_userid("pri", $_SESSION["login"]) : $PRI_NOT_LOG;
$ld -> close();

$nav_info = NULL;
$i = 0;
foreach($MSG_NAV_INFO as $elem) {
    if($cur_pri >= $elem[2] && $cur_pri <= $elem[3]) {
        $nav_info[$i ++] = $elem;
    }
}

require_once("views/navbar.php");
?>