<?php
include 'functions.php';


// DEFINE ALL VALUES FROM DB
$currTemp = round($currTempArray[0]['avg(temperature)'], 1) . '&deg;C';
$currTempClean = round($currTempArray[0]['avg(temperature)'], 0);

$currHum = round($currHumArray[0]['avg(humidity)'], 1) . '&#37;';
$currHumClean = round($currHumArray[0]['avg(humidity)'], 0);

$currWaterTemp = round($currTempWaterArray[0]['temp'], 1) . '&deg;C';
$currWaterTempClean = round($currTempWaterArray[0]['temp'], 0);

$currSoilMoisture = round($currSoilMoistureArray[0]['avg(moistureperc)'], 1) . '&#37;';
$currSoilMoistureClean = round($currSoilMoistureArray[0]['avg(moistureperc)'], 0);

$currSoilTemp = round($currSoilTempArray[0]['avg(temperature)'], 1) . '&deg;C';  
$currSoilTempClean = round($currSoilTempArray[0]['avg(temperature)'], 0); 

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
