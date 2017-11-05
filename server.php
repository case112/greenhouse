<?php
include 'functions.php';


// DEFINE ALL VALUES FROM DB
$currTemp = round($currTempArray[0]['avg(temperature)'], 1) . '&deg;C';
$currTempClean = '"c100 p' . round($currTempArray[0]['avg(temperature)'], 0) . ' big center green"'; 

$currHum = round($currHumArray[0]['avg(humidity)'], 1) . '&#37;';
$currHumClean = 'c100 p' . round($currHumArray[0]['avg(humidity)'], 0) . ' big center';

$currWaterTemp = round($currTempWaterArray[0]['temp'], 1) . '&deg;C';
$currWaterTempClean = 'c100 p' . round($currTempWaterArray[0]['temp'], 0) . ' big center green';

$currSoilMoisture = round($currSoilMoistureArray[0]['avg(moistureperc)'], 1) . '&#37;';
$currSoilMoistureClean = 'c100 p' . round($currSoilMoistureArray[0]['avg(moistureperc)'], 0) . ' big center';

$currSoilTemp = round($currSoilTempArray[0]['avg(temperature)'], 1) . '&deg;C';  
$currSoilTempClean = 'c100 p' . round($currSoilTempArray[0]['avg(temperature)'], 0) . ' big center green'; 

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
