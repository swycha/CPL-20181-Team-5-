<?php
$servername = "carbigdataserver.mysql.database.azure.com";
$username="myadmin@carbigdataserver";
$password="passpass0330**";
$dbname="real_test";

$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
?>