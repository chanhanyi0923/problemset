<?php
require_once("include/config.php");

session_start();

$PAGE_NAME = "error.php";
$err = isset($_GET["err"]) ? $_GET["err"] : "NOERR";

require_once("views/error.php");
?>