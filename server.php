<?php
// DEFINE ALL VALUES FROM DB
$currTemp = round($currTempArray[0]['avg(temperature)'], 1) . '&deg;C';
$currHum = round($currHumArray[0]['avg(humidity)'], 1) . '&#37;';
$currWaterTemp = round($currTempWaterArray[0]['temp'], 1) . '&deg;C';
$currSoilMoisture = round($currSoilMoistureArray[0]['avg(moistureperc)'], 1) . '&#37;';
$currSoilTemp = round($currSoilTempArray[0]['avg(temperature)'], 1) . '&#37;'; 


//Create JSON 

$myObj1 = new stdClass();
$myObj1->name = "Greenhouse temperature";
$myObj1->last_modified = time();
$myObj1->value = "$currTemp";

$currTempJSON = json_encode($myObj1);

echo $currTempJSON;



$myObj2 = new stdClass();
$myObj2->name = "Greenhouse humidity";
$myObj2->last_modified = time();
$myObj2->value = "$currHum";

$currHumJSON = json_encode($myObj2);

echo $currHumJSON;



$myObj3 = new stdClass();
$myObj3->name = "Greenhouse soil temperature";
$myObj3->last_modified = time();
$myObj3->value = "$currSoilTemp";

$currSoilTempJSON = json_encode($myObj3);

echo $currSoilTempJSON;



$myObj4 = new stdClass();
$myObj4->name = "Greenhouse soil moisture";
$myObj4->last_modified = time();
$myObj4->value = "$currSoilMoisture";

$currSoilMoistureJSON = json_encode($myObj4);

echo $currSoilMoistureJSON;



$myObj5 = new stdClass();
$myObj5->name = "Greenhouse water temperature";
$myObj5->last_modified = time();
$myObj5->value = "$currWaterTemp";

$currWaterTempJSON = json_encode($myObj5);

echo $currWaterTempJSON;



?>
