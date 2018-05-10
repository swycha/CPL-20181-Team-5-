<?php
require_once 'jeydatabase.php';

switch($_POST["method"]){
    case "normal" :
        $sql="select name, distance, stopTime-startTime as tottime, purpose, startLatitude, startLongitude, stopLatitude, stopLongitude, dayofweek(startDate) as yoil, oilAmount, tollAmount, gitaAmount, departmentName from drivingLog where companySeq = \"".$_POST["comseq"]."\"";
        break;
    case "emp" :
        $sql="select name, count(name) as cnt from drivingLog where companySeq=\"".$_POST["comseq"]."\" and dayofweek(startDate)=\"".$_POST["day"]."\" group by name";
        break;
        
}

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>