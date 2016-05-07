<?php
require_once("include/config.php");

session_start();

$PAGE_NAME = "info.php";
$alert_class = isset($_GET["class"]) ? $_GET["class"] : "info";
$info = isset($_GET["info"]) ? $_GET["info"] : "NOINFO";

require_once("views/info.php");
?>