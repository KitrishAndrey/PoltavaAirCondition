<?php 

    $servername = "*****";
    $database = "******";
    $username = "*******";
    $password = "*********";
    $hourMin = date("Y:m:d H:i");
    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn){
        die("Connection failed:".mysqli_connect_error());
    }
    echo "Connected successfuly:";
    
    $gromaddata = file_get_contents(__DIR__.'/polution/sensor2.txt', FILE_USE_INCLUDE_PATH);
        $dataresultGROM = explode(":", $gromaddata);
    $sql = "INSERT INTO HourdataGROM (Hour, Data25, DataC02) VALUES ('$hourMin'  ,$dataresultGROM[0] ,$dataresultGROM[1])";
    mysqli_query($conn, $sql);
    
    $veldata = file_get_contents(__DIR__.'/polution/sensorvelyk.txt', FILE_USE_INCLUDE_PATH);
            $dataresultVEL = explode(":", $veldata);
    $sql = "INSERT INTO HourdataVel (Hour, Data25, DataC02) VALUES ('$hourMin'  ,$dataresultVEL[0] ,$dataresultVEL[1])";
    mysqli_query($conn, $sql);
    
    $petryurdata = file_get_contents(__DIR__.'/polution/sensor1.txt', FILE_USE_INCLUDE_PATH);
            $dataresultyur = explode(":", $petryurdata);
    $sql = "INSERT INTO HourdataPetrYur (Hour, Data25, DataC02) VALUES ('$hourMin', $dataresultyur[0], $dataresultyur[1])";
    mysqli_query($conn, $sql);
    echo"PetrYur:".$sql."<br>".mysqli_error($conn);
    
    $shevdata = file_get_contents(__DIR__.'/polution/sensor1.txt', FILE_USE_INCLUDE_PATH);
            $dataresultSHEV = explode(":", $shevdata);
    $sql = "INSERT INTO HourdataShev (Hour, Data25, DataC02) VALUES ('$hourMin', $dataresultSHEV[0], $dataresultSHEV[1])";
    mysqli_query($conn, $sql);
    
    $pushkdata = file_get_contents(__DIR__.'/polution/sensorpushk.txt', FILE_USE_INCLUDE_PATH);
            $dataresultPUSHK = explode(":", $pushkdata);
    $sql = "INSERT INTO HourdataPushk (Hour, Data25, DataC02) VALUES ('$hourMin', $dataresultPUSHK[0], $dataresultPUSHK[1])";
    mysqli_query($conn, $sql);
    
    $shkilnydata = file_get_contents(__DIR__.'/polution/sensorman.txt', FILE_USE_INCLUDE_PATH);
            $dataresultMAN = explode(":", $shkilnydata);
    $sql = "INSERT INTO HourdataSkilny (Hour, Data25, DataC02) VALUES ('$hourMin', $dataresultMAN[0], $dataresultMAN[1])";
    mysqli_query($conn, $sql);
    
    $temphumpresuredata = file_get_contents(__DIR__.'/charts/begindata.txt', FILE_USE_INCLUDE_PATH);
            $begindata = explode(":", $temphumpresuredata);
    $sql = "INSERT INTO TempPresureHum (Hour, Temp , Hum, Presure) VALUES ('$hourMin', $begindata[0], $begindata[1], $begindata[2])";
    mysqli_query($conn, $sql);
    
    echo "New record created successfully";
    echo"Error:".$sql."<br>".mysqli_error($conn);

    mysqli_close($conn);
 
?>
