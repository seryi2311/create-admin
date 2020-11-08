<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include 'dbconnect.php';
include 'function.php';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = '/';
}
$page = selectPage($page);

if($page){
    $title = $page['title'];
    $content = $page['text'];
}else{
    $page = selectPage(404);
    $title = $page['title'];
    $content = $page['text'];
    header("HTTP/1.0 404 Not Found");
}


include 'layout.php';