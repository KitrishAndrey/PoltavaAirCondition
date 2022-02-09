 $apiKey = "***************************";
    $city = "Poltava";
    $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&lang=ru&units=metric&appid=" . $apiKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = json_decode(curl_exec($ch));
    curl_close($ch);
 
    
    if($_GET['id']){
        $var1= $_GET['id'];
        $fileContent = $var1;
        $temphum = $data->main->temp.':'.$data->main->humidity;
        file_put_contents(__DIR__.'/polution/temphum.txt', null);
        $fileStatus = file_put_contents(__DIR__.'/polution/temphum.txt',$temphum,FILE_APPEND);
        file_put_contents(__DIR__.'/polution/sensor1.txt', null);
        $fileStatus = file_put_contents(__DIR__.'/polution/sensor1.txt',$fileContent,FILE_APPEND);
            if($fileStatus != false)
            {
            echo "SUCCESS: data written to file";
             
	        }
	        else
	        {
	        echo "FAIL: could not write to file";
	        }
    };

    if($_GET['it']){
        $var2= $_GET['it'];
        $fileContent = $var2;
        $temphum = $data->main->temp.':'.$data->main->humidity;
        file_put_contents(__DIR__.'/polution/temphum.txt', null);
        $fileStatus = file_put_contents(__DIR__.'/polution/temphum.txt',$temphum,FILE_APPEND);
        file_put_contents(__DIR__.'/polution/sensor2.txt', null);
        $fileStatus = file_put_contents(__DIR__.'/polution/sensor2.txt',$fileContent,FILE_APPEND);
            if($fileStatus != false)
            {
            echo "SUCCESS: data written to file";
            echo $data->main->humidity;
            }
	        else
	        {
	        echo "FAIL: could not write to file";
	        }
    };
if($_GET['man']){
        $var3= $_GET['man'];
        $fileContent3 = $var3;
        file_put_contents(__DIR__.'/polution/sensorman.txt', null);
        $fileStatus3 = file_put_contents(__DIR__.'/polution/sensorman.txt',$fileContent3,FILE_APPEND);
        $begindata = $data->main->temp.':'.$data->main->humidity.':'.$data->main->pressure;
        file_put_contents(__DIR__.'/charts/begindata.txt', null);
        file_put_contents(__DIR__.'/charts/begindata.txt',$begindata,FILE_APPEND);
        file_put_contents(__DIR__.'/chartsman/begindata.txt', null);
        file_put_contents(__DIR__.'/chartsman/begindata.txt',$begindata,FILE_APPEND);
        
        file_put_contents(__DIR__.'/chartspush/begindata.txt', null);
        file_put_contents(__DIR__.'/chartspush/begindata.txt',$begindata,FILE_APPEND);
        
          file_put_contents(__DIR__.'/chartsvel/begindata.txt', null);
        file_put_contents(__DIR__.'/chartsvel/begindata.txt',$begindata,FILE_APPEND);
        
           file_put_contents(__DIR__.'/chartsshev/begindata.txt', null);
        file_put_contents(__DIR__.'/chartsshev/begindata.txt',$begindata,FILE_APPEND);
        
        file_put_contents(__DIR__.'/chartsyur/begindata.txt', null);
        file_put_contents(__DIR__.'/chartsyur/begindata.txt',$begindata,FILE_APPEND);
            if($fileStatus3 != false)
            {
            echo "SUCCESS: data written to file";
             
	        }
	        else
	        {
	        echo "FAIL: could not write to file";
	        }

    };
    
    if($_GET['pushk']){
        $var4= $_GET['pushk'];
        $fileContent4 = $var4;
        file_put_contents(__DIR__.'/polution/sensorpushk.txt', null);
        $fileStatus4 = file_put_contents(__DIR__.'/polution/sensorpushk.txt',$fileContent4,FILE_APPEND);
            if($fileStatus4 != false)
            {
            echo "SUCCESS: data written to file";
             
	        }
	        else
	        {
	        echo "FAIL: could not write to file";
	        }

    };
    
    if($_GET['velyk']){
        $var5= $_GET['velyk'];
        $fileContent5 = $var5;
        file_put_contents(__DIR__.'/polution/sensorvelyk.txt', null);
        $fileStatus5 = file_put_contents(__DIR__.'/polution/sensorvelyk.txt',$fileContent5,FILE_APPEND);
            if($fileStatus5 != false)
            {
            echo "SUCCESS: data written to file";
             
	        }
	        else
	        {
	        echo "FAIL: could not write to file";
	        }

    };
    
    
     if($_GET['streets']){
         $street = $_GET['streets'];
         if ($street == "shkilny"){
            $result = file_get_contents(__DIR__.'/polution/sensorman.txt', FILE_USE_INCLUDE_PATH);
            $dataman = explode(":", $result);
            $AQIMAN = intval($dataman[0])*4;
            $CO2MAN = intval($dataman[1])*4;
            $datatosendman = $AQIMAN.":".$CO2MAN;
            echo $datatosendman ;
         };
         if($street == "pushkinska"){
            $result1 = file_get_contents(__DIR__.'/polution/sensorpushk.txt', FILE_USE_INCLUDE_PATH);
            $dataresult = explode(":", $result1);
            $AQIPUSHKINA = (intval($dataresult[0])*4);
            $CO2PUSHKINA = (intval($dataresult[1])*4);
            $datatosend = $AQIPUSHKINA.":".$CO2PUSHKINA;
            echo $datatosend ;
         };
         
         if($street == "petryur"){
            $result2 = file_get_contents(__DIR__.'/polution/sensor1.txt', FILE_USE_INCLUDE_PATH);
            $dataresultyur = explode(":", $result2);
            $AQIYUR = (intval($dataresultyur[0])*4)+30;
            $CO2YUR = (intval($dataresultyur[1])*4)+160;
            $datatosendyur = $AQIYUR.":".$CO2YUR;
            echo $datatosendyur ;
         };
         
         if($street == "shevchenka"){
            $result3 = file_get_contents(__DIR__.'/polution/sensor1.txt', FILE_USE_INCLUDE_PATH);
            $dataresultSHEV = explode(":", $result3);
            $AQISHEV = intval($dataresultSHEV[0])*4;
            $CO2SHEV = intval($dataresultSHEV[1])*4;
            $datatosendSHEV = $AQISHEV.":".$CO2SHEV;
            echo $datatosendSHEV ;
         };
         
         if($street == "gromad"){
            $result4 = file_get_contents(__DIR__.'/polution/sensor2.txt', FILE_USE_INCLUDE_PATH);
            $dataresultGROM = explode(":", $result4);
            $AQIGROM = intval($dataresultGROM[0])*4;
            $CO2GROM = intval($dataresultGROM[1])*4;
            $datatosendGROM = $AQIGROM.":".$CO2GROM;
            echo $datatosendGROM ;
         };
         
         if($street == "velykotyr"){
            $result5 = file_get_contents(__DIR__.'/polution/sensorvelyk.txt', FILE_USE_INCLUDE_PATH);
            $dataresultVEL = explode(":", $result5);
            $AQIVEL = (intval($dataresultVEL[0])*4);
            $CO2VEL = (intval($dataresultVEL[1])*4);
            $datatosendVEL = $AQIVEL.":".$CO2VEL;
            echo $datatosendVEL ;
         };
         
     };
     
     if($_GET['primedata']){
         $primedata = $_GET['primedata'];
         if($primedata == "shkilny"){
            $pmco2 = file_get_contents(__DIR__.'/polution/sensorman.txt', FILE_USE_INCLUDE_PATH);
            $points = explode(":", $pmco2);
            $AQIPUSHKINABEGG = intval($points[0]);
            $CO2PUSHKINABEGG = intval($points[1]);
            $begindata = $AQIPUSHKINABEGG.":".$CO2PUSHKINABEGG.':'.$data->main->temp.':'.$data->main->humidity.':'.$data->main->pressure;
            echo $begindata;
         };

        if($primedata == "pushkinska"){
            $pmco21 = file_get_contents(__DIR__.'/polution/sensorpushk.txt', FILE_USE_INCLUDE_PATH);
            $points1 = explode(":", $pmco21);
            $AQIPUSHKINABEG = intval($points1[0]);
            $CO2PUSHKINABEG = intval($points1[1]);
            $begindata1 = $AQIPUSHKINABEG.":".$CO2PUSHKINABEG.':'.$data->main->temp.':'.$data->main->humidity.':'.$data->main->pressure;
            echo $begindata1;
         };
         
         if($primedata == "petryur"){
            $pmco22 = file_get_contents(__DIR__.'/polution/sensor1.txt', FILE_USE_INCLUDE_PATH);
            $points2 = explode(":", $pmco22);
            $AQIPETRBEG = intval($points2[0])*4;
            $CO2PETRBEG = intval($points2[1])*4;
            $begindata2 = $AQIPETRBEG.":".$CO2PETRBEG.':'.$data->main->temp.':'.$data->main->humidity.':'.$data->main->pressure;
            echo $begindata2;
         };
         
         if($primedata == "shevchenka"){
            $pmco23 = file_get_contents(__DIR__.'/polution/sensor1.txt', FILE_USE_INCLUDE_PATH);
            $points3 = explode(":", $pmco23);
            $AQISHEVBEGG = intval($points3[0]);
            $CO2SHEVBEGG = intval($points3[1]);
            $begindata3 = $AQISHEVBEGG.":".$CO2SHEVBEGG.':'.$data->main->temp.':'.$data->main->humidity.':'.$data->main->pressure;
            echo $begindata3;
         };
         
         if($primedata == "gromad"){
            $pmco24 = file_get_contents(__DIR__.'/polution/sensor2.txt', FILE_USE_INCLUDE_PATH);
            $points4 = explode(":", $pmco24);
            $AQIGROMBEGG = intval($points4[0]);
            $CO2GROMBEGG = intval($points4[1]);
            $begindata4 = $AQIGROMBEGG.":".$CO2GROMBEGG.':'.$data->main->temp.':'.$data->main->humidity.':'.$data->main->pressure;
            echo $begindata4;
         };
         
         if($primedata == "velykotyr"){
            $pmco25 = file_get_contents(__DIR__.'/polution/sensorvelyk.txt', FILE_USE_INCLUDE_PATH);
            $points5 = explode(":", $pmco25);
            $AQIVELLBEGG = intval($points5[0]);
            $CO2VELLBEGG = intval($points5[1]);
            $begindata5 = $AQIVELLBEGG.":".$CO2VELLBEGG.':'.$data->main->temp.':'.$data->main->humidity.':'.$data->main->pressure;
            echo $begindata5;
         };
         
     };
    

	?>
