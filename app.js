function getData() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            document.getElementById("last_updated").innerHTML = myObj.last_updated;
            document.getElementById("curr_temp").innerHTML = myObj.curr_temp;
            document.getElementById("curr_hum").innerHTML = myObj.curr_hum;
            document.getElementById("curr_soil_temp").innerHTML = myObj.curr_soil_temp;
            document.getElementById("curr_soil_moisture").innerHTML = myObj.curr_soil_moisture;
            document.getElementById("curr_water_temp").innerHTML = myObj.curr_water_temp;
            document.getElementById("curr_temp_clean").innerHTML = myObj.curr_temp_clean;
            document.getElementById("curr_hum_clean").innerHTML = myObj.curr_hum_clean;
            document.getElementById("curr_soil_temp_clean").innerHTML = myObj.curr_soil_temp_clean;
            document.getElementById("curr_soil_moisture_clean").innerHTML = myObj.curr_soil_moisture_clean;
            document.getElementById("curr_water_temp_clean").innerHTML = myObj.curr_water_temp_clean; 
            
        }
    };
    xmlhttp.open("GET", "server.php", true);
    xmlhttp.send();
    console.log("Updated ");
    //Gets data from DB every minute
    setTimeout(getData, 60000);

}
getData();


