<!DOCTYPE HTML>
<html>
<body>
<?php
@set_time_limit(0);
$servername="carbigdataserver.mysql.database.azure.com";
$username="myadmin@carbigdataserver";
$password="passpass0330**";
$dbname="real_test";

$servername2="dev.jeycorp.com";
$username2="bduser";
$password2="jeycorpPASS!@";
$dbname2="cdsbiz_db";


$conn=new mysqli($servername, $username, $password, $dbname);
$conn2=new mysqli($servername2, $username2, $password2, $dbname2);

if($conn->connect_error){
die("message: ".$conn->connect_error);
}
if($conn2->connect_error){
die("message: ".$conn2->connect_error);
}

$conn->set_charset("utf8");
$conn2->set_charset("utf8");
    
    
$sql = "select * from drivingLog";
$result=$conn2->query($sql);

if(!$result){
trigger_error('Invalidi query : '.$conn2->error);
}




$num=$result->num_rows;

if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
        $emp_name=$row["name"];
        $dep_name=$row["departmentName"];
		$startdate = $row["startDate"];
        $starttime = $row["startTime"];
        $stoptime=$row["stopTime"];
        $purpose=$row["purpose"];
        $startlong=$row["startLongitude"];
        $startlang=$row["startLatitude"];
        $stoplong=$row["stopLongitude"];
        $stoplang=$row["stopLatitude"];
        
		$sql3="insert into drivinglog values(\"".$startdate."\",\"".$starttime."\",\"".$stoptime."\",\"".$purpose."\",\"".$startlong."\",\"".$startlang."\",\"".$stoplong."\",\"".$stoplang."\",\"".$emp_name."\",\"".$dep_name."\",".date('w',strtotime($startdate)).")";
        
        //echo($sql3);
		$result3=$conn->query($sql3);
		if(!$result3){
			trigger_error('Invalidi query : '.$conn->error);
		}

		
	}	
}



$conn->close();
$conn2->close();

?>

</body>
</html>