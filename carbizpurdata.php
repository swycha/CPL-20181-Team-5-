<?php
require_once 'jeydatabase.php';

switch($_POST["method"]){
    case "init" :
        $sql="select distance, purpose, stopTime-startTime as time, dayofweek(startDate) as day from drivingLog where companySeq=\"".$_POST["comseq"]."\" and \"".$_POST["stdate"]."\"<=startDate and startDate<=\"".$_POST["endate"]."\" and 0<distance and distance<1000";
        break;  
    case "empcnt":
        $sql="select distinct name from drivingLog where companySeq=\"".$_POST["comseq"]."\" and \"".$_POST["stdate"]."\"<=startDate and startDate<=\"".$_POST["endate"]."\" and 0<distance and distance<1000 and name!=\"\"";
        break;
    case "stds":
        $sql="select startLatitude, startLongitude, stopLatitude, stopLongitude from drivingLog where companySeq=\"".$_POST["comseq"]."\" and \"".$_POST["stdate"]."\"<=startDate and startDate<=\"".$_POST["endate"]."\" and 0<distance and distance<1000 and purpose".$_POST["purpose"]."";
        break;
    case "emp":
        $sql="select name, purpose, count(name) as cnt from drivingLog where companySeq=\"".$_POST["comseq"]."\" and \"".$_POST["stdate"]."\"<=startDate and startDate<=\"".$_POST["endate"]."\" and 0<distance and distance<1000 and name!=\"\" and purpose !=\"\" group by name, purpose";
        break;
}

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
//echo json_encode($sql, JSON_UNESCAPED_UNICODE);
?>