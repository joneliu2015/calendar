<?php
$host="localhost";
$db_user="root";
$db_pass="root";
$db_name="demo";
$timezone="Asia/Shanghai";

$link=mysqli_connect($host,$db_user,$db_pass,$db_name);
mysqli_select_db($db_name,$link);
mysqli_query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //北京时间
?>
