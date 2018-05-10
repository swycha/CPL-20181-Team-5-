<?php

$servername="dev.jeycorp.com";
$username="bduser";
$password="jeycorpPASS!@";
$dbname="cdsbiz_db";

$conn=new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",$username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
//$conn->exec("set names utf8");
?>