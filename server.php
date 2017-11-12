<?php
include 'functions.php';


// DEFINE ALL VALUES FROM DB
$currTemp = round($currTempArray[0]['avg(temperature)'], 1) . '&deg;';
$currTempClean = 'c100 p' . round(round($currTempArray[0]['avg(temperature)'], 0) * 2.63, 0) . ' center green'; 

$currHum = round($currHumArray[0]['avg(humidity)'], 1) . '&#37;';
$currHumClean = 'c100 p' . round($currHumArray[0]['avg(humidity)'], 0) . ' center';

$currWaterTemp = round($currTempWaterArray[0]['temp'], 1) . '&deg;';
$currWaterTempClean = 'c100 p' . round(round($currTempWaterArray[0]['temp'], 0) * 3.5, 0) . ' center green';

$currSoilMoisture = round($currSoilMoistureArray[0]['avg(moistureperc)'], 1) . '&#37;';
$currSoilMoistureClean = 'c100 p' . round($currSoilMoistureArray[0]['avg(moistureperc)'], 0) . ' center';

$currSoilTemp = round($currSoilTempArray[0]['avg(temperature)'], 1) . '&deg;';  
$currSoilTempClean = 'c100 p' . round(round($currSoilTempArray[0]['avg(temperature)'], 0) * 3.1, 0) . ' center green'; 

$lastUpdated = "Last updated: " . date('m/d/Y H:i:s', Time());


//Create JSON 

$myObj = new stdClass();
$myObj->name = "Greenhouse data";
$myObj->last_updated = "$lastUpdated"; 
$myObj->curr_temp = "$currTemp";
$myObj->curr_temp_clean = "$currTempClean";
$myObj->curr_hum = "$currHum";
$myObj->curr_hum_clean = "$currHumClean";
$myObj->curr_soil_temp = "$currSoilTemp";
$myObj->curr_soil_temp_clean = "$currSoilTempClean";
$myObj->curr_soil_moisture = "$currSoilMoisture";
$myObj->curr_soil_moisture_clean = "$currSoilMoistureClean"; 
$myObj->curr_water_temp = "$currWaterTemp";
$myObj->curr_water_temp_clean = "$currWaterTempClean";

$currDataJSON = json_encode($myObj);

echo $currDataJSON;

 




?>
