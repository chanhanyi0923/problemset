<?php
require_once("include/config.php");
require_once("include/func.php");
require_once("modules/link_db.php");

session_start();

$PAGE_NAME = "login.php";

if(check_login()) {
    header("Location: index.php");
    exit;
} else if(isset($_POST["userid"]) && isset($_POST["passwd"])) {
    $ld = new link_db();
    $ld -> init();
    $db_passwd = $ld -> fetch_ac_by_userid("passwd", $_POST["userid"]);
    $ld -> close();
    if($db_passwd == NULL) {
        header("Location: info.php?class=danger&info=ACC_NOT_EXIST");
        exit;
    } else if($db_passwd == $_POST["passwd"]) {
        $_SESSION["login"] = $_POST["userid"];
        setcookie("userid", $_POST["userid"], time() + $LOG_COOKIE_TIME);
        setcookie("passwd", $_POST["passwd"], time() + $LOG_COOKIE_TIME);
        
        header("Location: index.php");
        exit;
    } else {
        header("Location: info.php?class=danger&info=PASSWD_WRONG");
        exit;
    }
}

require_once("views/login.php");
?>