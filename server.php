<?php
include 'functions.php';


// DEFINE ALL VALUES FROM DB
$currTempFront = round($currTempFrontArray[0]['temp'], 1) . '&deg;'; 
$currTempFrontClean = 'c100 p' . round(round($currTempFrontArray[0]['temp'], 0) * 2.63, 0) . ' center green';

$currTempBack = round($currTempBackArray[0]['temp'], 1) . '&deg;';
$currTempBackClean = 'c100 p' . round(round($currTempBackArray[0]['temp'], 0) * 2.63, 0) . ' center green'; 

$currHumFront = round($currHumFrontArray[0]['hum'], 1) . '&#37;';
$currHumFrontClean = 'c100 p' . round($currHumFrontArray[0]['hum'], 0) . ' center';

$currHumBack = round($currHumBackArray[0]['hum'], 1) . '&#37;';
$currHumBackClean = 'c100 p' . round($currHumBackArray[0]['hum'], 0) . ' center'; 

$currSoilMoistureLeft = round($currSoilMoistureLeftArray[0]['moistureperc'], 1) . '&#37;';
$currSoilMoistureLeftClean = 'c100 p' . round($currSoilMoistureLeftArray[0]['moistureperc'], 0) . ' center';

$currSoilMoistureRight = round($currSoilMoistureRightArray[0]['moistureperc'], 1) . '&#37;';
$currSoilMoistureRightClean = 'c100 p' . round($currSoilMoistureRightArray[0]['moistureperc'], 0) . ' center';

$currSoilTempLeft = round($currSoilTempLeftArray[0]['temp'], 1) . '&deg;';  
$currSoilTempLeftClean = 'c100 p' . round(round($currSoilTempLeftArray[0]['temp'], 0) * 3.1, 0) . ' center green'; 

$currSoilTempRight = round($currSoilTempRightArray[0]['temp'], 1) . '&deg;';  
$currSoilTempRightClean = 'c100 p' . round(round($currSoilTempRightArray[0]['temp'], 0) * 3.1, 0) . ' center green'; 

$currHwTemp = round($currHwTempArray[0]['temp'], 1) . '&deg;';
$currHwTempClean = 'c100 p' . round(round($currHwTempArray[0]['temp'], 0) * 2.63, 0) . ' center green'; 

$currHwHum = round($currHwHumArray[0]['hum'], 1) . '&#37;';
$currHwHumClean = 'c100 p' . round($currHwHumArray[0]['hum'], 0) . ' center';

$currOutsideTemp = round($currOutsideTempArray[0]['temp'], 1) . '&deg;';
$currOutsideTempClean = 'c100 p' . round(round($currOutsideTempArray[0]['temp'], 0) * 2.63, 0) . ' center green'; 

$currOutsideHum = round($currOutsideHumArray[0]['hum'], 1) . '&#37;';
$currOutsideHumClean = 'c100 p' . round($currOutsideHumArray[0]['hum'], 0) . ' center';

##Switch logic
$currSwitch = $currSwitchArray[0]['state'];

if ($currSwitch == 1) {
	$currSwitch = 'Window state: Open';
} else {
	$currSwitch = 'Window state: Closed';
}





$currTemp = round($currTempArray[0]['avg(temp)'], 1) . '&deg;';
$currTempClean = 'c100 p' . round(round($currTempArray[0]['avg(temp)'], 0) * 2.63, 0) . ' center green'; 

$currHum = round($currHumArray[0]['avg(hum)'], 1) . '&#37;';
$currHumClean = 'c100 p' . round($currHumArray[0]['avg(hum)'], 0) . ' center';

$currWaterTemp = round($currTempWaterArray[0]['temp'], 1) . '&deg;';
$currWaterTempClean = 'c100 p' . round(round($currTempWaterArray[0]['temp'], 0) * 3.5, 0) . ' center green';

$currSoilMoisture = round($currSoilMoistureArray[0]['avg(moistureperc)'], 1) . '&#37;';
$currSoilMoistureClean = 'c100 p' . round($currSoilMoistureArray[0]['avg(moistureperc)'], 0) . ' center';

$currSoilTemp = round($currSoilTempArray[0]['avg(temp)'], 1) . '&deg;';  
$currSoilTempClean = 'c100 p' . round(round($currSoilTempArray[0]['avg(temp)'], 0) * 3.1, 0) . ' center green';

$maxWeekTemp = "GH weekly max temperature: " . round($maxWeekTempArray[0]['temp'], 1) . '&deg;'; 

$lastUpdated = "Page refreshed at: " . date('m/d/Y H:i:s', Time()); 


//Create JSON 

$myObj = new stdClass();
$myObj->name = "Greenhouse data";
$myObj->last_updated = "$lastUpdated";
$myObj->max_week_temp = "$maxWeekTemp";
$myObj->curr_switch = "$currSwitch";

$myObj->curr_temp_back = "$currTempBack";
$myObj->curr_temp_back_clean = "$currTempBackClean";
$myObj->curr_temp_front = "$currTempFront";
$myObj->curr_temp_front_clean = "$currTempFrontClean";
$myObj->curr_hum_back = "$currHumBack";
$myObj->curr_hum_back_clean = "$currHumBackClean";
$myObj->curr_hum_front = "$currHumFront";
$myObj->curr_hum_front_clean = "$currHumFrontClean";
$myObj->curr_soil_temp_left = "$currSoilTempLeft";
$myObj->curr_soil_temp_left_clean = "$currSoilTempLeftClean";
$myObj->curr_soil_moisture_left = "$currSoilMoistureLeft";
$myObj->curr_soil_moisture_left_clean = "$currSoilMoistureLeftClean"; 
$myObj->curr_soil_temp_right = "$currSoilTempRight";
$myObj->curr_soil_temp_right_clean = "$currSoilTempRightClean";
$myObj->curr_soil_moisture_right = "$currSoilMoistureRight";
$myObj->curr_soil_moisture_right_clean = "$currSoilMoistureRightClean"; 
$myObj->curr_hw_temp = "$currHwTemp";
$myObj->curr_hw_temp_clean = "$currHwTempClean"; 
$myObj->curr_hw_hum = "$currHwHum";
$myObj->curr_hw_hum_clean = "$currHwHumClean";
$myObj->curr_outside_temp = "$currOutsideTemp";
$myObj->curr_outside_temp_clean = "$currOutsideTempClean"; 
$myObj->curr_outside_hum = "$currOutsideHum";
$myObj->curr_outside_hum_clean = "$currOutsideHumClean";



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
