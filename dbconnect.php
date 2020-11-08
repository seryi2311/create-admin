<?php
$host = 'localhost';
$user = 'admin';
$password = 'admin';
$dbname = 'test';
$link = mysqli_connect($host, $user, $password, $dbname);
mysqli_query($link, "SET NAMES 'UTF8'");