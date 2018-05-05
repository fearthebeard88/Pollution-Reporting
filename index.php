<?php include "head.php"; ?>
<body>
    
<h1 class="type">Type of Pollution</h1>

<form action = "" method = "post">

    <label for = "type">Air Pollution</label>
        <input type = "radio" name = "type">Smoke
        <input type = "radio" name = "type">Smog
        <input type = "radio" name = "type">Smell

</form>

<div id = "map">

</div>

</body>

<script>
var long;
var lat;

var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    var lat = position.coords.latitude;
    var long = position.coords.longitude;
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

map.locate({setView: true, maxZoom: 16});

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

</script>
</html>