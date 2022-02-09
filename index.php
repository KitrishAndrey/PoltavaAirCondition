<?php
$servername = "**********";
$database = "**************";
$username = "*************";
$password = "**************";

$connection = new mysqli($servername,$username, $password, $database);
$query = "select Data25 from HourdataGROM";
$queryco = "select DataC02 from HourdataGROM";
$querytemp = "select Temp from TempPresureHum";
$queryhum = "select Hum from TempPresureHum";
$querypres = "select Presure from TempPresureHum";

$result = $connection->query($query);
$pmrow = array();
while($row = mysqli_fetch_array($result))
{   
    array_push($pmrow, intval($row['Data25']));
}

$resultco = $connection->query($queryco);
$corow = array();
while($row = mysqli_fetch_array($resultco))
{
    array_push($corow, intval($row['DataC02']));
}

$resulttemp = $connection->query($querytemp);
$temprow = array();
while($row = mysqli_fetch_array($resulttemp))
{
    array_push($temprow, intval($row['Temp']));
}

$resulthum = $connection->query($queryhum);
$humrow = array();
while($row = mysqli_fetch_array($resulthum))
{
    array_push($humrow, intval($row['Hum']));
}

$resultpres = $connection->query($querypres);
$presrow = array();
while($row = mysqli_fetch_array($resultpres))
{
    array_push($presrow, intval($row['Presure']));
}


$dataco2 = json_encode($corow);
$datapm = json_encode($pmrow);
$datatemp = json_encode($temprow);
$datahum = json_encode($humrow);
$datapres = json_encode($presrow);


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <meta charset="utf-8" />
        <title>PoltavaAirCondition</title>
        <!-- import plugin script -->
        <link rel="stylesheet" href="charts.css">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
       <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body>
        <div class="content">
    <div class="inner-header">
            <img class="col-4" id="header-ico" src="header-ico.png">
            <h1 class="col-8" id="name">Poltava Air Condition</h1>
            <button class="hamburger">&#9776;</button>
            <button class="cross">&#735;</button>
        
    </div>
        <div class="menu">
            <ul>
            <a href="https://poltavaaircondition.online/polution/polutionmap.html"><li>МАПА</li></a>
            <a href="https://poltavaaircondition.online/"><li>НА ГОЛОВНУ</li></a>
            <a href="https://poltavaaircondition.online/info/infopage.html"><li>ПРО ПРОЕКТ</li></a>
            </ul>
          
        </div>       
        <div class="header" id="firstpage">
            <h1 class="about"><strong>Рівень забруднення атмосферного повітря за адресою:</strong></h1>
            <p class="street" id="street"><strong></strong><p>
            <div class="wrapper">
        <figure class="-пепечр р срсрсрр  с  мм">
        <div id="container"></div>
        <div id="containerco2"></div>
        <div id="containersum"></div>
        </figure>
            </div>
            <div class="inf-conteiner">
                <div class="infn"><p><strong class="h11">Первинні дані</strong> станом на <p><p id="day"> </p><p id="date"> </p><p id="time"> </p></div>
                <div class="left">
                
                    <p>🌡️Температура:</p>
                    <p>💧Відносна вологість:</p>
                    <p>🌀Атмосферний тиск:</p>
                    <p>☁️Рівень PM2.5:</p>
                    <p>☁️Рівень СО2:</p>
                </div>
                <div class="right">
          
                    <p id="Temperature"></p>
                    <p id="Humidity"></p>
                    <p id="Presure"></p>
                    <p id="PM25"></p>
                    <p id="CO2"></p>
                </div>
            </div>
        </div>    
        <div class="inner-footer">
              <a href="https://github.com/KitrishAndrey"><img src="github-outline.svg" class="git-link"></a>
              <a href="https://t.me/Odas00"><img src="free-icon-telegram-2111813.svg" class="telegram-link"></a>
    </div>
    </div>
        
        <script>
        
        
        
        
            
        function Dayinf(){
        var dt = new Date()
        var days =      ["Неділю","Понеділок","Вівторок","Середу","Четвер","П'ятницю","Суботу"];
        $('#day').html(days[dt.getDay()]);
        var months =["Січень -","Лютий -","Березень -","Квітень -","Травень -","Червень -","Липень -","Серпень -","Вересень -","Жовтень -","Листопад -","Грудень -"];
        $('#date').html(months[dt.getMonth()] + " " + dt.getDate() + ", " +     dt.getFullYear());
        $('#time').html((dt.getHours()>12?(dt.getHours()-12):dt.getHours()).toString() +    ":" + ((dt.getMinutes() < 10 ? '0' : '').toString() + dt.getMinutes().toString()) +   (dt.getHours() < 12 ? ' ' : ' ').toString());
         
         };
        Dayinf();
        
        var pm25 = JSON.parse('<?php echo $datapm; ?>');
        var co2 = JSON.parse('<?php echo $dataco2; ?>');
        var Temp = JSON.parse('<?php echo $datatemp; ?>');
        var Hum = JSON.parse('<?php echo $datahum; ?>');
        var Atm = JSON.parse('<?php echo $datapres; ?>');
        
            var time1 = pm25[pm25.length - 24];
            var time2 = pm25[pm25.length - 23];
            var time3 = pm25[pm25.length - 22];
            var time4 = pm25[pm25.length - 21];
            var time5 = pm25[pm25.length - 20];
            var time6 = pm25[pm25.length - 19];
            var time7 = pm25[pm25.length - 18];
            var time8 = pm25[pm25.length - 17];
            var time9 = pm25[pm25.length - 16];
            var time10 = pm25[pm25.length - 15];
            var time11 = pm25[pm25.length - 14];
            var time12 = pm25[pm25.length - 13];
            var time13 = pm25[pm25.length - 12];
            var time14 = pm25[pm25.length - 11];
            var time15 = pm25[pm25.length - 10];
            var time16 = pm25[pm25.length - 9];
            var time17 = pm25[pm25.length - 8];
            var time18 = pm25[pm25.length - 7];
            var time19 = pm25[pm25.length - 6];
            var time20 = pm25[pm25.length - 5];
            var time21 = pm25[pm25.length - 4];
            var time22 = pm25[pm25.length - 3];
            var time23 = pm25[pm25.length - 2];
            var time24 = pm25[pm25.length - 1];
            
            var CO21 = co2[co2.length - 24];
            var CO22 = co2[co2.length - 23];
            var CO23 = co2[co2.length - 22];
            var CO24 = co2[co2.length - 21];
            var CO25 = co2[co2.length - 20];
            var CO26 = co2[co2.length - 19];
            var CO27 = co2[co2.length - 18];
            var CO28 = co2[co2.length - 17];
            var CO29 = co2[co2.length - 16];
            var CO210 = co2[co2.length -15];
            var CO211 = co2[co2.length -14];
            var CO212 = co2[co2.length -13];
            var CO213= co2[co2.length - 12];
            var CO214 = co2[co2.length -11];
            var CO215 = co2[co2.length -10];
            var CO216 = co2[co2.length -9];
            var CO217 = co2[co2.length -8];
            var CO218 = co2[co2.length -7];
            var CO219 = co2[co2.length -6];
            var CO220 = co2[co2.length -5];
            var CO221 = co2[co2.length -4];
            var CO222 = co2[co2.length -3];
            var CO223 = co2[co2.length -2];
            var CO224 = co2[co2.length -1];
            
            var temp1 = Temp[Temp.length - 24];
            var temp2 = Temp[Temp.length - 23];
            var temp3 = Temp[Temp.length - 22];
            var temp4 = Temp[Temp.length - 21];
            var temp5 = Temp[Temp.length - 20];
            var temp6 = Temp[Temp.length - 19];
            var temp7 = Temp[Temp.length - 18];
            var temp8 = Temp[Temp.length - 17];
            var temp9 = Temp[Temp.length - 16];
            var temp10 = Temp[Temp.length -15];
            var temp11 = Temp[Temp.length -14];
            var temp12 = Temp[Temp.length -13];
            var temp13= Temp[Temp.length - 12];
            var temp14 = Temp[Temp.length -11];
            var temp15 = Temp[Temp.length -10];
            var temp16 = Temp[Temp.length -9];
            var temp17 = Temp[Temp.length -8];
            var temp18 = Temp[Temp.length -7];
            var temp19 = Temp[Temp.length -6];
            var temp20 = Temp[Temp.length -5];
            var temp21 = Temp[Temp.length -4];
            var temp22 = Temp[Temp.length -3];
            var temp23 = Temp[Temp.length -2];
            var temp24 = Temp[Temp.length -1];
            
            var hum1 = Hum[Hum.length - 24];
            var hum2 = Hum[Hum.length - 23];
            var hum3 = Hum[Hum.length - 22];
            var hum4 = Hum[Hum.length - 21];
            var hum5 = Hum[Hum.length - 20];
            var hum6 = Hum[Hum.length - 19];
            var hum7 = Hum[Hum.length - 18];
            var hum8 = Hum[Hum.length - 17];
            var hum9 = Hum[Hum.length - 16];
            var hum10 = Hum[Hum.length -15];
            var hum11 = Hum[Hum.length -14];
            var hum12 = Hum[Hum.length -13];
            var hum13= Hum[Hum.length - 12];
            var hum14 = Hum[Hum.length -11];
            var hum15 = Hum[Hum.length -10];
            var hum16 = Hum[Hum.length -9];
            var hum17 = Hum[Hum.length -8];
            var hum18 = Hum[Hum.length -7];
            var hum19 = Hum[Hum.length -6];
            var hum20 = Hum[Hum.length -5];
            var hum21 = Hum[Hum.length -4];
            var hum22 = Hum[Hum.length -3];
            var hum23 = Hum[Hum.length -2];
            var hum24 = Hum[Hum.length -1];
            
            var atm1 = Atm[Atm.length - 24];
            var atm2 = Atm[Atm.length - 23];
            var atm3 = Atm[Atm.length - 22];
            var atm4 = Atm[Atm.length - 21];
            var atm5 = Atm[Atm.length - 20];
            var atm6 = Atm[Atm.length - 19];
            var atm7 = Atm[Atm.length - 18];
            var atm8 = Atm[Atm.length - 17];
            var atm9 = Atm[Atm.length - 16];
            var atm10 = Atm[Atm.length -15];
            var atm11 = Atm[Atm.length -14];
            var atm12 = Atm[Atm.length -13];
            var atm13= Atm[Atm.length - 12];
            var atm14 = Atm[Atm.length -11];
            var atm15 = Atm[Atm.length -10];
            var atm16 = Atm[Atm.length -9];
            var atm17 = Atm[Atm.length -8];
            var atm18 = Atm[Atm.length -7];
            var atm19 = Atm[Atm.length -6];
            var atm20 = Atm[Atm.length -5];
            var atm21 = Atm[Atm.length -4];
            var atm22 = Atm[Atm.length -3];
            var atm23 = Atm[Atm.length -2];
            var atm24 = Atm[Atm.length -1];
            
        var myHeaders = new Headers();
            myHeaders.append('pragma', 'no-cache');
            myHeaders.append('cache-control', 'no-cache');
            
        var myInit = {
            method: 'GET',
            headers: myHeaders,
            };
        
        async function begindatatouser(){ 
            
            const response = await fetch('begindata.txt', myInit);
            var begindata = await response.text();
            
            var begininfo = begindata.split(":");
            
            var Temp = begininfo[0];
            var Hum = begininfo[1];
            var Pressure = begininfo[2];
            
            document.getElementById("Temperature").innerHTML = Temp + " " + "℃";
            document.getElementById("Humidity").innerHTML = Hum + " " + "%";
            document.getElementById("Presure").innerHTML = Pressure + " " + "гПа";
            document.getElementById("PM25").innerHTML = time24 + " " + "мг/м³(PPM)";
            document.getElementById("CO2").innerHTML = CO224 + " " + "мг/м³(PPM)";
        }
        
         async function streetdefine(){
                document.getElementById("street").innerHTML = "вул. Громадська";
        }  
            
        streetdefine()
        begindatatouser()
            
          // Create the chart
var chart = new Highcharts.chart('container', {
    chart: {
    type: 'column'
    },
    title: {
        text: 'Рівень PM2.5'
    },
    
    xAxis: {
        type: 'category',
        title:{
          text:"Години"  
        },
    },
    yAxis: {
        title: {
            text: 'PPM'
        }

    },
    legend: {
        enabled: false
    },
    

    tooltip: {
        headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
       pointFormat: '<span><b>PPM</b></span>: <b>{point.y:.2f}PPM</b>'
      
    },

    series: [
        {
            name: "PM2.5",
            data: [[1,time1],[2, time2],[3,time3],[4,time4],[5, time5],[6,time6],[7,time7],[8,time8], [9,time9], [10,time10], [11,time11], [12,time12], [13,time13], [14,time14], [15,time15], [16,time16], [17,time17], [18,time18], [19,time19], [20,time20 ], [21,time21], [22,time22], [23,time23], [24,time24]],
        }
    ],
   
});
            
            
var chart1 = new Highcharts.chart("containerco2", {
  chart: {
      type: 'areaspline',
  },
    title: {
        text: 'Рівень CO2'
    },
    
    xAxis: {
        type: 'category',
        title:{
          text:"Години"  
        },
    },
    yAxis: {
        title: {
            text: 'PPM'
        }
    },
    
    tooltip: {
        headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
       pointFormat: '<span><b>PPM</b></span>: <b>{point.y:.2f}PPM</b>'
      
    },

  series: [
    {
    name: "CO2",
    showInLegend: false,
    marker: {
      enable: false,
      fillColor: 'transparent',
      lineWidth: 0.2,
      lineColor: Highcharts.getOptions().colors[0]
     },  
    color: Highcharts.getOptions().colors[0],
    fillOpacity: 0.3,
      data: [[1,CO21],[2, CO22],[3,CO23],[4,CO24],[5, CO25],[6,CO26],[7,CO27],[8,CO28], [9,CO29], [10,CO210], [11,CO211], [12,CO212], [13,CO213], [14,CO214], [15,CO215], [16,CO216], [17,CO217], [18,CO218], [19,CO219], [20,CO220], [21,CO221], [22,CO222], [23,CO223], [24,CO224]],
    }
  ]
});

var chart = new Highcharts.chart('containersum', {
    chart: {
    type: 'line'
    },
    title: {
        text: 'Загальні Первинні дані'
    },
    
    xAxis: {
        type: 'category',
        title:{
          text:" "  
        },
    },
    yAxis: {
        title: {
            text: ' '
        }

    },
    legend: {
        enabled: false
    },
    

    tooltip: {
        headerFormat: '<span style="font-size:10px">{series.name}</span><br>',
       pointFormat: '<span><b>Покази</b></span>: <b>{point.y:.2f}</b>'
      
    },

    series: [
        {
            name: "PM2.5 - мг/м³(PPM)",
            data: [time1,time2,time3,time4,time5,time6,time7,time8, time9, time10, time11, time12, time13, time14,time15, time16, time17, time18, time19, time20 , time21, time22, time23, time24],
        },{
           name: "CO2 - мг/м³(PPM)",
           data:  [CO21,CO22,CO23,CO24,CO25,CO26,CO27,CO28, CO29, CO210, CO211, CO212, CO213, CO214, CO215, CO216, CO217, CO218, CO219, CO220, CO221, CO222, CO223, CO224],
        },{
          name:"Температура - ℃" ,  data: [temp1,temp2,temp3,temp4,temp5,temp6,temp7,temp8, temp9, temp10, temp11, temp12, temp13, temp14, temp15, temp16, temp17, temp18, temp19, temp20, temp21, temp22, temp23, temp24],
        },{
        
        name:"Атмосферний тиск - гПа",
          data:[ atm1,atm2, atm3,atm4,atm5,atm6,atm7,atm8, atm9, atm10, atm11, atm12, atm13, atm14, atm15, atm16, atm17, atm18, atm19, atm20,atm21, atm22, atm23, atm24],
        },{
        name:"Вологість %",
          data: [hum1,hum2,hum3,hum4,hum5, hum6,hum7,hum8, hum9, hum10, hum11,hum12, hum13, hum14, hum15, hum16, hum17, hum18, hum19, hum20, hum21, hum22, hum23, hum24],
          }
    ],
   
});



        $( document ).ready(function() {

        $( ".cross" ).hide();
            $( ".menu" ).hide();
            $( ".hamburger" ).click(function() {
                $( ".menu" ).slideToggle( "slow", function() {
                    $( ".hamburger" ).hide();
                    $( ".cross" ).show();
                });
            });

            $( ".cross" ).click(function() {
                $( ".menu" ).slideToggle( "slow", function() {
                    $( ".cross" ).hide();
                    $( ".hamburger" ).show();
                });
            });

        });
        
        
        </script>
    </body>
</html>
