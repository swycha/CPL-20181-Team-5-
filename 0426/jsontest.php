<?php
require_once 'database.php';
$stmt=$conn->prepare("select stoptime-starttime as tottime,weeknum from drivingLog");
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result);
?>