<?php
require_once("include/config.php");
require_once("include/func.php");
require_once("modules/link_db.php");

session_start();

$PAGE_NAME = "register.php";

if(check_login()) {
    header("Location: index.php");
    exit;
}

$post_var_name = array("userid", "nickname", "passwd", "rptpasswd", "email");
$isset_or = false;
$isset_and = true;

foreach($post_var_name as $elem) {
    $isset_or = $isset_or || isset($_POST[$elem]);
    $isset_and = $isset_and && (!empty($_POST[$elem]));
}

if($isset_and) {
    if($_POST["passwd"] != $_POST["rptpasswd"]) {
        header("Location: info.php?class=danger&info=RPT_PASSWD_ERR");
        exit;
    }
    $ld = new link_db();
    $ld -> init();
    $email_id = $ld -> fetch_ac_by_email("id", $_POST["email"]);
    $userid_id = $ld -> fetch_ac_by_userid("id", $_POST["userid"]);
    if(isset($email_id)) {
        header("Location: info.php?class=danger&info=EMAIL_HAS_REG");
        exit;
    }
    if(isset($userid_id)) {
        header("Location: info.php?class=danger&info=USERID_HAS_REG");
        exit;
    }
    $ld -> insert_acc($_POST["userid"], $_POST["passwd"], $_POST["nickname"], $_POST["email"]);
    $ld -> close();
    header("Location: info.php?class=success&info=REG_SUC");
    exit;
} else if($isset_or) {
    header("Location: info.php?class=danger&info=REG_INFO_EMPTY");
    exit;
}

require_once("views/register.php");
?>