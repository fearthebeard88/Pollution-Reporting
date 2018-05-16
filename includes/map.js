 
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;
    // console.log(lat + " " + long);
    lat_long = [lat, long];
    
}

getLocation();
var map = L.map('map').fitWorld();

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="http://mapbox.com">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(map);

map.locate({setView: true, maxZoom: 11});

// function onLocationFound(e) {
//    var radius = e.accuracy / 2;

//    L.marker(e.latlng).addTo(map)
//        .bindPopup("You are within " + radius + " meters from this point").openPopup();

//    L.circle(e.latlng, radius).addTo(map);
// }

// map.on('locationfound', onLocationFound);

function onLocationError(e) {
   alert(e.message);
}

map.on('locationerror', onLocationError);

$(document).ready(function() {
    $.get("api/api_test.php", function(data) {
            rawData = $.parseJSON(data);
            console.log(rawData);
            for (let x = 0; x < rawData.length; x++) {
                latitude = rawData[x].lat;
                longitude = rawData[x].lon;
                // console.log("latitude: " + latitude + "\nlongitude: " + longitude);
                var marker = L.marker([latitude, longitude]).addTo(map);
                marker.bindPopup(rawData[x].report);
            }
                    // var marker = L.marker(rawData[x].lat, rawData[x].lon).addTo(map);
                });

            });

            $("#submit").on("click", function(event) {
                event.preventDefault();
                var potential = $("input[type='radio'][name='type']:checked");
                var value = potential.val();
                console.log(value);
                console.log(lat_long);
                $.ajax({
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