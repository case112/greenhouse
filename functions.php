<?php

    function db_connect() { 

        // Define connection as a static variable, to avoid connecting more than once 
        static $connection;

        // Try and connect to the database, if a connection has not been established yet
        if(!isset($connection)) {
             // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file('../config.ini'); 
            $connection = mysqli_connect($config['serverHost'],$config['serverUsername'],$config['serverPassword'],$config['dbName']);
        }

        // If connection was not successful, handle the error
        if($connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return mysqli_connect_error(); 
        }
        return $connection;
    }

    function db_query($query) {
        // Connect to the database
        $connection = db_connect();

        // Query the database
        $result = mysqli_query($connection,$query);

        return $result;
    }

    function db_error() {
        $connection = db_connect();
        return mysqli_error($connection);
    }

    if($result === false) {
        $error = db_error();
        echo $error;
    }

    //DB QUERY FOR GH TEMPHUM FRONT SENSOR
    $result = db_query("SELECT temp FROM tempHum ORDER BY thID DESC LIMIT 1,1"); 

    $currTempFrontArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currTempFrontArray[$index] = $row;
        $index++;
    }

    //DB QUERY FOR GH TEMPHUM BACK SENSOR
    $result = db_query("SELECT temp FROM tempHum ORDER BY thID DESC LIMIT 1");

    $currTempBackArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){ 
        $currTempBackArray[$index] = $row;
        $index++;
    }

    //DB QUERY FOR GH TEMPHUM FRONT SENSOR
    $result = db_query("SELECT hum FROM tempHum ORDER BY thID DESC LIMIT 1,1");

    $currHumFrontArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){ 
        $currHumFrontArray[$index] = $row;
        $index++;
    }

    //DB QUERY FOR GH TEMPHUM BACK SENSOR
    $result = db_query("SELECT hum FROM tempHum ORDER BY thID DESC LIMIT 1");

    $currHumBackArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){ 
        $currHumBackArray[$index] = $row;
        $index++;
    }

    //DB QUERY FOR GH SOIL LEFT SENSOR
    $result = db_query("SELECT moistureperc FROM soil ORDER BY soilID DESC LIMIT 1");

    $currSoilMoistureLeftArray = array(); 
    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currSoilMoistureLeftArray[$index] = $row;
        $index++;
    }

    //DB QUERY FOR GH SOIL RIGHT SENSOR
    $result = db_query("SELECT moistureperc FROM soil ORDER BY soilID DESC LIMIT 1,1");

    $currSoilMoistureRightArray = array(); 
    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currSoilMoistureRightArray[$index] = $row;
        $index++;
    }

    //DB QUERY FOR GH SOIL LEFT SENSOR
    $result = db_query("SELECT temp FROM soil ORDER BY soilID DESC LIMIT 1");

    $currSoilTempLeftArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currSoilTempLeftArray[$index] = $row;
        $index++; 
    }
 
    //DB QUERY FOR GH SOIL RIGHT SENSOR
    $result = db_query("SELECT temp FROM soil ORDER BY soilID DESC LIMIT 1,1");

    $currSoilTempRightArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currSoilTempRightArray[$index] = $row;
        $index++;
    }

    //DB QUERY FOR HW CABINET SENSOR
    $result = db_query("SELECT temp FROM hardwareTempHum ORDER BY hwID DESC LIMIT 1");

    $currHwTempArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currHwTempArray[$index] = $row;
        $index++; 
    }
 
    //DB QUERY FOR HW CABINET SENSOR
    $result = db_query("SELECT hum FROM hardwareTempHum ORDER BY hwID DESC LIMIT 1");

    $currHwHumArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currHwHumArray[$index] = $row;
        $index++;

    }

    //DB QUERY FOR OUTSIDE SENSOR
    $result = db_query("SELECT temp FROM outside ORDER BY oID DESC LIMIT 1");

    $currOutsideTempArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currOutsideTempArray[$index] = $row;
        $index++; 
    }
 
    //DB QUERY FOR OUTSIDE SENSOR
    $result = db_query("SELECT hum FROM outside ORDER BY oID DESC LIMIT 1");

    $currOutsideHumArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currOutsideHumArray[$index] = $row;
        $index++;
        
    }

    //DB QUERY FOR DOOR SWITCHES
    $result = db_query("SELECT state FROM windows ORDER BY switchID DESC LIMIT 1");

    $currSwitchArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currSwitchArray[$index] = $row;
        $index++;
        
    }








    //HETKETEMPERATUUR ANDMEBAASIST

    $result = db_query("SELECT avg(temp) FROM 
                            (SELECT temp FROM tempHum ORDER BY thID DESC LIMIT 2) subq ");

    $currTempArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currTempArray[$index] = $row;
        $index++;
    }


    //HETKENIISKUS ANDMEBAASIST 

    $result = db_query("SELECT avg(hum) FROM 
                            (SELECT hum FROM tempHum ORDER BY thID DESC LIMIT 2) subq ");

    $currHumArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currHumArray[$index] = $row;
        $index++;
    }


    //("SELECT MAX(temp) as value_of_week FROM tempHum WHERE datetime > date_add(now(), interval -7 day");
    //N2DALA MAX TEMP
    $result = db_query("SELECT MAX(temp) FROM tempHum WHERE 1");

    //echo $result;
    $maxWeekTempArray = array();


    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $maxWeekTempArray[$index] = $row; 
        $index++;
    }

    // VEE TEMP

    $result = db_query("SELECT temp FROM waterTempData ORDER BY datetime DESC LIMIT 2"); 

    $currTempWaterArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currTempWaterArray[$index] = $row;

        $index++;
    }

    // SOIL MOSTURE

    $result = db_query("SELECT avg(moistureperc) FROM 
                            (SELECT moistureperc FROM soil ORDER BY datetime DESC LIMIT 2) subq ");

    $currSoilMoistureArray = array(); 
    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currSoilMoistureArray[$index] = $row;
        $index++;
    }

    // SOIL TEMP

    $result = db_query("SELECT avg(temp) FROM 
                            (SELECT temp FROM soil ORDER BY datetime DESC LIMIT 2) subq ");

    $currSoilTempArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){
        $currSoilTempArray[$index] = $row;
        $index++;
    }





?>
