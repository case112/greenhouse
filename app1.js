

function getData() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            document.getElementById("last_updated").innerHTML = myObj.last_updated;
            document.getElementById("curr_switch").innerHTML = myObj.curr_switch;

            document.getElementById("max_week_temp").innerHTML = myObj.max_week_temp;
            document.getElementById("curr_temp").innerHTML = myObj.curr_temp;
            document.getElementById("curr_hum").innerHTML = myObj.curr_hum;
            document.getElementById("curr_soil_temp").innerHTML = myObj.curr_soil_temp;
            document.getElementById("curr_soil_moisture").innerHTML = myObj.curr_soil_moisture;
            document.getElementById("curr_water_temp").innerHTML = myObj.curr_water_temp;
            document.getElementById("curr_outside_temp").innerHTML = myObj.curr_outside_temp; 
            document.getElementById("curr_outside_hum").innerHTML = myObj.curr_outside_hum; 
            
            //fill CSS circles with values
            document.getElementById("currentTemp").className = myObj.curr_temp_clean;
            document.getElementById("currentHum").className = myObj.curr_hum_clean;
            document.getElementById("currentSoilTemp").className = myObj.curr_soil_temp_clean;
            document.getElementById("currentSoilMoisture").className = myObj.curr_soil_moisture_clean;
            document.getElementById("currentWaterTemp").className = myObj.curr_water_temp_clean;
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


