<?php
require_once 'jeydatabase.php';
switch($_POST["method"]){
    case "dept" :
      $sql="select startLatitude, startLongitude, stopLatitude, stopLongitude, distance, stoptime-starttime as tottime, purpose, oilAmount,tollAmount,gitaAmount, dayofweek(startDate) as day from drivingLog where distance>0 and companySeq=\"".$_POST["comseq"]."\" and startDate>=\"".$_POST["start"]."\" and startDate<=\"".$_POST["des"]."\"";
      break;
    case "emp":
      $sql="select name, count(name) as cnt from drivingLog where companySeq=\"".$_POST["comseq"]."\" and \"".$_POST["start"]."\"<=startDate and startDate<=\"".$_POST["des"]."\" and 0<distance and distance<1000 group by name";
      break;
  }
$stmt=$conn->prepare($sql);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>
