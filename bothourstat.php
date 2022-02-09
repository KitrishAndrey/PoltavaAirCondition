<?php 
$servername = "******";
$database = "*********";
$username = "*************";
$password = "**************";
$connection = new mysqli($servername,$username, $password, $database);


if($_GET['pushuidstreetid']){
        $res= $_GET['pushuidstreetid'];
        $datatopush = explode(":", $res);
        $stmt = $connection->prepare("INSERT INTO UserStreetid(Id, Streetid) VALUES (?, ?) ON DUPLICATE KEY UPDATE Streetid = ?");
        $stmt->bind_param("iss", $datatopush[0], $datatopush[1], $datatopush[1]);
        if (!$stmt->execute()){
            
        echo"Error:".$qpush."<br>".mysqli_error($connection);
        }
};

if($_GET['getstreetid']){
        $var1= $_GET['getstreetid'];
        $sql = "SELECT Streetid FROM UserStreetid WHERE Id=$var1";
        $result = $connection->query($sql);
        $row = mysqli_fetch_array($result);
        echo $row['Streetid'];
};

if($_GET['getuidstreetidstatearray']){
        $var2= $_GET['getuidstreetidstatearray'];
        $sqquery = "SELECT * FROM Userid";
        $result = $connection->query($sqquery);
        $staterow = array();
        while($row = mysqli_fetch_array($result))
        {   
            $str = strval($row['Id'].":".$row['Streetid'].":".strval($row['State']));
            array_push($staterow, $str);
        }
        echo json_encode($staterow);
    };

if($_GET['pushhourstate']){
        $var3= $_GET['pushhourstate'];
        $statetopush = explode(":", $var3);
        $stmt1 = $connection->prepare("INSERT INTO Userid(Id, Streetid, State) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE Streetid = ?, State=?");
        $stmt1->bind_param("isisi", $statetopush[0], $statetopush[1], $statetopush[2], $statetopush[1], $statetopush[2]);
        if (!$stmt1->execute()){
            
        echo"Error:".$qpush."<br>".mysqli_error($connection);
        }
    };

if($_GET['pushzerostate']){
        $var4= $_GET['pushzerostate'];
        $zerostate = 0;
        $sqpost = "UPDATE Userid SET State=$zerostate WHERE Id=$var4";
        $result4 = $connection->query($sqpost);
        echo "Succed";
        
    };
    

?>
