<?php
require_once("include/func.php");

session_start();

clean_session();
unset_cookie("userid");
unset_cookie("passwd");

header("Location: login.php");
?>