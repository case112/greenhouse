<?php
include 'functions.php';


// DEFINE ALL VALUES FROM DB
$currTemp = round($currTempArray[0]['avg(temperature)'], 1) . '&deg;C';
$currHum = round($currHumArray[0]['avg(humidity)'], 1) . '&#37;';
$currWaterTemp = round($currTempWaterArray[0]['temp'], 1) . '&deg;C';
$currSoilMoisture = round($currSoilMoistureArray[0]['avg(moistureperc)'], 1) . '&#37;';
$currSoilTemp = round($currSoilTempArray[0]['avg(temperature)'], 1) . '&#37;'; 
$lastUpdated = "Last updated: " . date('m/d/Y H:i:s', Time());


//Create JSON 

$myObj = new stdClass();
$myObj->name = "Greenhouse data";
$myObj->last_updated = "$lastUpdated";
$myObj->curr_temp = "$currTemp";
$myObj->curr_hum = "$currHum";
$myObj->curr_soil_temp = "$currSoilTemp";
$myObj->curr_soil_moisture = "$currSoilMoisture"; 
$myObj->curr_water_temp = "$currWaterTemp";

$currDataJSON = json_encode($myObj);

echo $currDataJSON;

 




?>
