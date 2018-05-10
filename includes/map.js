
var long;
var lat;

var lat_long = [];
 
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
    console.log(lat + " " + long);
    var lat_long = [lat, long];
    console.log(lat_long);
    
    $("#location").click(function() {
        $.post("../api/api_insert.php", {
            latitude: lat,
            longitude: long
        },
            function(data, status) {
            alert("Data: " + data + "\nStatus: " + status);
        });
    });

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

map.locate({setView: true, maxZoom: 12});

function onLocationFound(e) {
   var radius = e.accuracy / 2;

   L.marker(e.latlng).addTo(map)
       .bindPopup("You are within " + radius + " meters from this point").openPopup();

   L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);

function onLocationError(e) {
   alert(e.message);
}

map.on('locationerror', onLocationError);

