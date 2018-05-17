 // place for error message
var x = document.getElementById("demo");
// getting geolocation data
function getLocation() {
    // if it can find you, run this
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        // if it cant find you, run this instead
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
// retreiving the latitude and longitude and coords
function showPosition(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;
    // console.log(lat + " " + long);
    // sticking the coords into an array for ease of access
    lat_long = [lat, long];
    
}

getLocation();

var map = L.map('map').fitWorld();

// calling on leaflet api for map
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="http://mapbox.com">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(map);
// centering the map and setting the default zoom
map.locate({setView: true, maxZoom: 11});

// function onLocationFound(e) {
//    var radius = e.accuracy / 2;

//    L.marker(e.latlng).addTo(map)
//        .bindPopup("You are within " + radius + " meters from this point").openPopup();

//    L.circle(e.latlng, radius).addTo(map);
// }

// map.on('locationfound', onLocationFound);

// if it runs into any problems, will give error message
function onLocationError(e) {
   alert(e.message);
}

map.on('locationerror', onLocationError);
// when the page loads, run this
$(document).ready(function() {
    // get request to api
    $.get("api/api_test.php", function(data) {
        // response from api, changes from string, into js object
            rawData = $.parseJSON(data);
            console.log(rawData);
            // listing all the data from the database
            for (let x = 0; x < rawData.length; x++) {
                latitude = rawData[x].lat;
                longitude = rawData[x].lon;
                // console.log("latitude: " + latitude + "\nlongitude: " + longitude);
                // creating a marker with information from database
                var marker = L.marker([latitude, longitude]).addTo(map);
                marker.bindPopup("<b>Report:</b> " + rawData[x].report + "\n<b>Latitude:</b> " + rawData[x].lat + "\n<b>Longitude:</b> " + rawData[x].lon);
            }
                    // var marker = L.marker(rawData[x].lat, rawData[x].lon).addTo(map);
                });

            });

            $("#submit").on("click", function(event) {
                // stopping the submit button from loading the page again
                event.preventDefault();
                // assigning the radio button that is checked to a variable
                var potential = $("input[type='radio'][name='type']:checked");
                // checked radio buttons value
                var value = potential.val();
                console.log(value);
                console.log(lat_long);
                $.ajax({
                    // post request to api
                    type: "POST",
                    url: "api/api_insert.php",
                    data: {
                    report: value,
                    latitude: lat_long[0],
                    longitude: lat_long[1]
                    },
                    success: function(data, status) {
                    console.log("Data: " + data + "\nStatus: " + status);
                    }
                })
            })