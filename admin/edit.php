<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
include '../dbconnect.php';
include "../function.php";
$title = 'edit page';
$info = editPage($link);
$page = getEditPage($link);
$content = getForm($page,false);
if($content == '<p class="error">page not found</p>'){
    $info = '';
}
include 'layout.php';
