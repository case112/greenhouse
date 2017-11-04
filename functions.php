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



    //HETKETEMPERATUUR ANDMEBAASIST

    $result = db_query("SELECT avg(temperature) FROM 
                            (SELECT temperature FROM temperaturedata ORDER BY dateandtime DESC LIMIT 2) subq ");

    $currTempArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
        $currTempArray[$index] = $row;
        $index++;
    }


    //echo '<h2>' . 'Ghs current temp:' . round($currTempArray[0]['avg(temperature)'], 1) . '</h2>';
    //echo '<br>';
    
    //echo '<pre>'; print_r($yourArray); echo '</pre>';

    //HETKENIISKUS ANDMEBAASIST

    $result = db_query("SELECT avg(humidity) FROM 
                            (SELECT humidity FROM temperaturedata ORDER BY dateandtime DESC LIMIT 2) subq ");

    $currHumArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
        $currHumArray[$index] = $row;
        $index++;
    }



    //N2DALA MAX TEMP

    $result = db_query("SELECT max(temperature) FROM temperaturedata WHERE (dateandtime > DATE_SUB(now(), INTERVAL 7 DAY))");

    $weekTempMaxArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
        $weekTempMaxArray[$index] = $row;
        $index++;
    }

    // VEE TEMP

    $result = db_query("SELECT temp FROM waterTempData ORDER BY datetime DESC LIMIT 2"); 

    $currTempWaterArray = array();

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
        $currTempWaterArray[$index] = $row;
        $index++;
    }

    // SOIL MOSTURE

    $result = db_query("SELECT avg(moistureperc) FROM 
                            (SELECT moistureperc FROM soildata ORDER BY dateandtime DESC LIMIT 2) subq ");

    $currSoilMoistureArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
        $currSoilMoistureArray[$index] = $row;
        $index++;
    }

    // SOIL TEMP

    $result = db_query("SELECT avg(temperature) FROM 
                            (SELECT temperature FROM soildata ORDER BY dateandtime DESC LIMIT 2) subq ");

    $currSoilTempArray = array(); 

    $index = 0;
    while($row = mysqli_fetch_assoc($result)){ // loop to store the data in an associative array.
        $currSoilTempArray[$index] = $row;
        $index++;
    }




    // A select query. $result will be a `mysqli_result` object if successful
    $result = db_query("SELECT * FROM temperaturedata WHERE (dateandtime > DATE_SUB(now(), INTERVAL 1 DAY))");

    //echo "<table class='mytable' >"; // start a table tag in the HTML

    //while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    //echo "<tr><td>" . $row['dateandtime'] . "</td><td>" . $row['sensor'] . "</td><td>" . $row['temperature'] . "</td><td>" . $row['humidity'] . "</td></tr>";  //$row['index'] the index here is a field name
    //}

    //echo "</table>"; //Close the table in HTML



?>
