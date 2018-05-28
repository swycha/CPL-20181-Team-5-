<?php
require_once 'jeydatabase.php';

switch($_POST["method"]){
        
    case "emp" :
        $sql="select distinct name from drivingLog where name != \"\" and companySeq=\"".$_POST["comseq"]."\" and \"".$_POST["stdate"]."\"<=startDate and startDate<=\"".$_POST["endate"]."\" and 0<distance and distance<1000";
        break; 
    case "init":
        $sql="select distance, purpose, stopTime-startTime as time, dayofweek(startDate) as day from drivingLog where companySeq=\"".$_POST["comseq"]."\" and \"".$_POST["stdate"]."\"<=startDate and startDate<=\"".$_POST["endate"]."\" and name = \"".$_POST["name"]."\" and 0<distance and distance<1000";
        break;
    case "stds":
        $sql="select startLatitude, startLongitude, stopLatitude, stopLongitude from drivingLog where companySeq=\"".$_POST["comseq"]."\" and \"".$_POST["stdate"]."\"<=startDate and startDate<=\"".$_POST["endate"]."\" and name = \"".$_POST["name"]."\" and 0<distance and distance<1000";
        break;
    case "oil":
        $sql="select o.cost as ocost,  o.userUid, o.createTime as odate from oilCostPaid o inner JOIN user u on o.userUid = u.uid where cost>0 and u.companySeq=\"".$_POST["comseq"]."\" and \"".$_POST["stdate"]."\"<=o.createTime and o.createTime<=\"".$_POST["endate"]."\" and 0<o.distance and o.distance<1000 and u.name=\"".$_POST["name"]."\"";
        break;
}

$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>