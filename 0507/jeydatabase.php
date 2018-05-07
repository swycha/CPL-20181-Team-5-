<?php

$servername="dev.jeycorp.com";
$username="bduser";
$password="jeycorpPASS!@";
$dbname="cdsbiz_db";

$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
?>