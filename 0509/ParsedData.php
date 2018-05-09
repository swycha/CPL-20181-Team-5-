<?php
require_once 'jeydatabase.php';
$stmt=$conn->prepare("select distance, startDate, stoptime-starttime as tottime, purpose, oilAmount,tollAmount,gitaAmount from drivingLog");
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result);
?>
