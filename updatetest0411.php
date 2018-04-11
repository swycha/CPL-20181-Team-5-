<html>
    <body>
        <?php
        $servername="localhost";
        $username="root";
        $password="root";
        $dbname="fcm";

        $conn=new mysqli($servername, $username, $password, $dbname);

        if($conn->connect_error){
        die("message: ".$conn->connect_error);
        }
        
        $sqlselect = "select * from users";        
        $result=$conn->query($sqlselect);
        
        if(!$result){
        trigger_error('Invalidi query : '.$conn->error);
        }
        
        $num= $result->num_rows;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $var = $row["createTime"];
                //echo $var."<br>";
                //--echo "createTime: " . $row["createTime"]."<br>";
                $sqlinsert = "insert into newuser values(".$row["id"].",\"".$row["createTime"]."\",".date('w',strtotime($var)).")";
                echo $sqlinsert;
                $result1 = $conn->query($sqlinsert);
                
                if(!$result1){
                trigger_error('Invalidi query : '.$conn->error);
                }                
                
            }
        } else {
            echo "0 results";
        }

        $conn->close();

        ?>


        
        
    </body>
</html>