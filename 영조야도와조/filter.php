<?php

require_once 'jeydatabase.php';
if(isset($_POST["from_date"], $_POST["to_date"])){

$sql="select  distance, stopTime-startTime as tottime, purpose, startLatitude,
 startLongitude, stopLatitude, stopLongitude, oilAmount, tollAmount, gitaAmount from drivingLog where startDate BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

?>
