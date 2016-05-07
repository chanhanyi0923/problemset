<?php
function sep($str, &$arr, $is_num) {
    $i = 0;
    for($elem = strtok($str, ","); $elem != NULL; $elem = strtok(",")) {
        $elem = preg_replace("/^[\s]*/", "", $elem);
        $elem = preg_replace("/[\s]*$/", "", $elem);
        if($is_num) {
            if(is_numeric($elem) && is_int(intval($elem)) && intval($elem) > 0)
                $arr[$i ++] = intval($elem);
        } else {
            $arr[$i ++] = $elem;
        }
    }
}
function unset_cookie($_key) {
    if (isset($_COOKIE[$_key])) {
        unset($_COOKIE[$_key]);
        setcookie($_key, "", time() - 36000);
    }
}
function clean_session() {
    session_unset();
    session_destroy();
}
function check_login() {
    return (!empty($_SESSION["login"]) && isset($_COOKIE["userid"]) || isset($_COOKIE["passwd"]));
}
?>