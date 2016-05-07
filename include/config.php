<?php
$LOG_COOKIE_TIME = 3000;
$ERR_INFO_NOT_LOG = 0;
$ERR_INFO_LOG_FAIL = 1;
$ELEM_PER_PAGE = 5;
$NAVBAR_PAGE_NUM = 5;

$PRI_EDIT = 1;
$PRI_NOT_LOG = -1;
$PRI_LOG = 0;

$MSG_FOOTER = "FOOTER";
$MSG_DESC = "題目敘述";
$MSG_ANS = "答案";
$MSG_SUBMIT_ANS = "提交的答案";
$MSG_DET_ANS = "詳解";
$MSG_SUBMIT = "提交";
$MSG_PROB_TITLE = "題目名稱";
$MSG_PROB_SET_TITLE = "題組名稱";
$MSG_OWNER = "擁有者";
$MSG_USERID = "帳號";
$MSG_PASSWD = "密碼";
$MSG_RPTPASSWD = "再次輸入密碼";
$MSG_LOGIN = "登入";
$MSG_PID = "題號";
$MSG_SID = "題組號";
$MSG_OPTION = "選項";
$MSG_CHOICE = "選擇題";
$MSG_WEB_TITLE = "題庫";
$MSG_PROB_INFO = "題目訊息";
$MSG_PROB_SET_INFO = "題組訊息";
$MSG_RESULT = "結果";
$MSG_EMAIL = "電郵";
$MSG_NICKNAME = "暱稱";

$MSG_TITLE = array(
    "index.php" => "題庫首頁",
    "problem.php" => "題目",
    "login.php" => "登入",
    "edit_problem.php" => "編輯題目",
    "edit_prob_set.php" => "編輯題組",
    "problem_list.php" => "題目列表",
    "prob_set_list.php" => "題組列表",
    "result.php" => "結果",
    "info.php" => "訊息",
    "register.php" => "註冊",
    "prob_set.php" => "題組"
);
$MSG_NAV_INFO = array(
    //pagename, text, min_pri, max_pri
    array("index.php", "題庫首頁", $PRI_NOT_LOG, $PRI_EDIT),
    array("prob_set_list.php", "題組列表", $PRI_NOT_LOG, $PRI_EDIT),
    array("problem_list.php", "題目列表", $PRI_NOT_LOG, $PRI_EDIT),
    array("edit_prob_set.php", "新增題組", $PRI_EDIT, $PRI_EDIT),
    array("edit_problem.php", "新增題目", $PRI_EDIT, $PRI_EDIT),
    array("login.php", "登入", $PRI_NOT_LOG, $PRI_NOT_LOG),
    array("register.php", "註冊", $PRI_NOT_LOG, $PRI_NOT_LOG),
    array("logout.php", "登出", $PRI_LOG, $PRI_EDIT)
);
$MSG_INFO_PAGE_INFO = array(
    "NOINFO" => "無訊息",
    "PID_NOT_NUM" => "題號必須為數字",
    "SID_NOT_NUM" => "題組號必須為數字",
    "PROB_NOT_FOUND" => "題目不存在",
    "PROB_SET_NOT_FOUND" => "題組不存在",
    "PASSWD_WRONG" => "密碼錯誤",
    "NOT_LOG" => "未登入",
    "PROB_INFO_EMPTY" => "題目訊息不能為空",
    "PROB_SET_INFO_EMPTY" => "題組訊息不能為空",
    "PAGE_NOT_FOUND" => "頁面不存在",
    "LOW_PRI" => "權限不足",
    "ACC_NOT_EXIST" => "無此帳號",
    "REG_INFO_EMPTY" => "註冊訊息不能為空",
    "RPT_PASSWD_ERR" => "兩次密碼不同",
    "USERID_HAS_REG" => "帳戶名已被註冊",
    "EMAIL_HAS_REG" => "電郵已被註冊",
    "REG_SUC" => "註冊成功"
);
?>
