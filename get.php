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
	?>
