<?php
require_once 'database.php';
$stmt=$conn->prepare("select purpose from drivingLog");
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result);
?>