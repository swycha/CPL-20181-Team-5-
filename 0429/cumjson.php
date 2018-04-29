<?php
require_once 'jeydatabase.php';
$stmt=$conn->prepare("select distance from drivingLog");
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result);
?>