<?php
require_once 'jeydatabase.php';
$stmt=$conn->prepare("select startLatitude, startLongitude, stopLatitude, stopLongitude from drivingLog");
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result);
?>