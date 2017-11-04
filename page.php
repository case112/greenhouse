<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <title>Data</title>
        <style type="text/css">

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        body{
            text-align: center;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }

        table {
            width: 50%;

        }

        table {
            margin-left:auto; 
            margin-right:auto;
        }

        tr:nth-child(even) {background-color: #f2f2f2}

        th, td {
        padding: 15px;
        text-align: left;
        }

        .page {
                margin: 40px;
        }

        h1{
            margin: 40px 0 60px 0;
        }

        .dark-area {
            background-color: #666;
            padding: 40px;
            margin: 0 -40px 20px -40px;
            clear: both;
        }

        .clearfix:before,.clearfix:after {content: " "; display: table;}
        .clearfix:after {clear: both;}
        .clearfix {*zoom: 1;}

        </style>

        <link rel="stylesheet" href="css/circle.css">
    
    <?php 
    include 'functions.php';
    #et temp skaala oleks kõrgem
    $avgTemp = ($currTempArray[0]['avg(temperature)']) * 2.4;
    $avgTemp = round($avgTemp , 0)
    ?>

    </head>

    <body>
        <div class="page">

            <h1>gHouse current humidity:</h1>

            <!-- default -->
            <div class="clearfix">

                <div class="c100 <?php echo 'p' . round($currHumArray[0]['avg(humidity)'], 0); ?> big">
                    <span><?php echo
                    round($currHumArray[0]['avg(humidity)'], 1) . '&#37;' ;
                    ?></span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
            </div> 
        </div>


        <div class="page">

            <h1>gHouse current temp:</h1>

            <!-- default -->
            <div class="clearfix">

                <div class="c100 <?php echo 'p' . $avgTemp; ?> big orange">
                    <span><?php echo
                    round($currTempArray[0]['avg(temperature)'], 1) . '&deg;C' ;
                    ?></span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
            </div> 
        </div> 
        




        <?php


        

        echo '<h2>' . 'gHouse current temp: ' . round($currTempArray[0]['avg(temperature)'], 1) . ' &deg;C' . '</h2>';
        echo '<br>';


        echo '<h2>' . 'gHouse current humidity: ' . round($currHumArray[0]['avg(humidity)'], 1) . ' &#37;' . '</h2>';
        echo '<br>';

        echo '<h2>' . 'Week max temp: ' . round($weekTempMaxArray[0]['max(temperature)'], 1) . ' &deg;C' . '</h2>';
        echo '<br>';

        echo '<h2>' . 'Water current temp: ' . round($currTempWaterArray[0]['temp'], 1) . ' &deg;C' . '</h2>'; 
        echo '<br>';

        echo '<h2>' . 'Current soil moisture: ' . round($currSoilMoistureArray[0]['avg(moistureperc)'], 1) . ' &#37;' . '</h2>';
        echo '<br>';

        echo '<h2>' . 'Current soil temperature: ' . round($currSoilTempArray[0]['avg(temperature)'], 1) . ' &#37;' . '</h2>';
        echo '<br>';

        echo "<table class='mytable' >"; // start a table tag in the HTML

            while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
            echo "<tr><td>" . $row['dateandtime'] . "</td><td>" . $row['sensor'] . "</td><td>" . $row['temperature'] . "</td><td>" . $row['humidity'] . "</td></tr>";  //$row['index'] the index here is a field name
            }

        echo "</table>"; //Close the table in HTML
        ?>



    </body>
</html>