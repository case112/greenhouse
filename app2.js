

function getData() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            document.getElementById("last_updated").innerHTML = myObj.last_updated;
            document.getElementById("curr_switch").innerHTML = myObj.curr_switch;

            document.getElementById("curr_temp_front").innerHTML = myObj.curr_temp_front;
            document.getElementById("curr_temp_back").innerHTML = myObj.curr_temp_back;
            document.getElementById("curr_hum_front").innerHTML = myObj.curr_hum_front;
            document.getElementById("curr_hum_back").innerHTML = myObj.curr_hum_back;
            document.getElementById("curr_soil_temp_left").innerHTML = myObj.curr_soil_temp_left;
            document.getElementById("curr_soil_moisture_left").innerHTML = myObj.curr_soil_moisture_left;
            document.getElementById("curr_soil_temp_right").innerHTML = myObj.curr_soil_temp_right;
            document.getElementById("curr_soil_moisture_right").innerHTML = myObj.curr_soil_moisture_right;
            document.getElementById("curr_water_temp").innerHTML = myObj.curr_water_temp; 
            document.getElementById("curr_hw_temp").innerHTML = myObj.curr_hw_temp; 
            document.getElementById("curr_hw_hum").innerHTML = myObj.curr_hw_hum; 
            document.getElementById("curr_outside_temp").innerHTML = myObj.curr_outside_temp; 
            document.getElementById("curr_outside_hum").innerHTML = myObj.curr_outside_hum; 
            
            //fill CSS circles with values
            document.getElementById("currentTempFront").className = myObj.curr_temp_front_clean; 
            document.getElementById("currentTempBack").className = myObj.curr_temp_back_clean;
            document.getElementById("currentHumFront").className = myObj.curr_hum_front_clean;
            document.getElementById("currentHumBack").className = myObj.curr_hum_back_clean;
            document.getElementById("currentSoilTempLeft").className = myObj.curr_soil_temp_left_clean;
            document.getElementById("currentSoilMoistureLeft").className = myObj.curr_soil_moisture_left_clean;
            document.getElementById("currentSoilTempRight").className = myObj.curr_soil_temp_right_clean;
            document.getElementById("currentSoilMoistureRight").className = myObj.curr_soil_moisture_right_clean;
            document.getElementById("currentWaterTemp").className = myObj.curr_water_temp_clean;
            document.getElementById("currentHwTemp").className = myObj.curr_hw_temp_clean;
            document.getElementById("currentHwHum").className = myObj.curr_hw_hum_clean;
            document.getElementById("currentOutsideTemp").className = myObj.curr_outside_temp_clean;
            document.getElementById("currentOutsideHum").className = myObj.curr_outside_hum_clean;


            

            console.log("Updated data and circles ");
            //Gets data from DB every 5 minutes
            setTimeout(getData, 300000);
        }
    };
    xmlhttp.open("GET", "server.php", true);
    xmlhttp.send();
    

}
getData();


