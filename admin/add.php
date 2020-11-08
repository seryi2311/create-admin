<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include '../dbconnect.php';
include "../function.php";
$content = getForm();
$title = 'add new page';

$info = addPage($link);
include 'layout.php'
?>


