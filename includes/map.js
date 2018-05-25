
// getting geolocation data
function getLocation() {
    // if it can find you, run this
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        // if it cant find you, run this instead
    } else {
         // place for error message
        var x = document.getElementById("demo");
        x.innerHTML = "Geolocation is not supported by this browser.";
    }

// retreiving the latitude and longitude and coords
function showPosition(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;
    // console.log(lat + " " + long);
    // sticking the coords into an array for ease of access
    lat_long = [lat, long];

    $.getJSON('https://nominatim.openstreetmap.org/reverse', {
        lat: position.coords.latitude,
        lon: position.coords.longitude,
        format: 'json',
            }, function (result) {
                console.log(result);
                city = result.address.city;
                state = result.address.state;
                country = result.address.country;
                console.log("City: " + city + "\nState: " + state + "\nCountry: " + country);
            });
        }
    }

function renderMap(){

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

    //    L.circle(e.latlng, radius).addTo(map);
    // }

    // if it runs into any problems, will give error message
    function onLocationError(e) {
        alert(e.message);
    }

    map.on('locationerror', onLocationError);

// when the page loads, run this
    // get request to api
    $.get("api/api_test.php", function(data) {
        // response from api, changes from string, into js object
            rawData = $.parseJSON(data);
            console.log(rawData);
            var marker_cluster = L.markerClusterGroup();
            // listing all the data from the database
            for (let x = 0; x < rawData.length; x++) {
                latitude = rawData[x].lat;
                longitude = rawData[x].lon;
                
                // creating a marker with information from database
                var m = L.marker([rawData[x].lat, rawData[x].lon]).bindPopup("<b>Report:</b> " + rawData[x].report + "\n<b>Latitude:</b> " + rawData[x].lat + "\n<b>Longitude:</b> " + rawData[x].lon);
                marker_cluster.addLayer(m);
                var marker = L.marker([latitude, longitude]).addTo(map);

                marker.bindPopup("<b>Report:</b> " + rawData[x].report + "\n<b>Latitude:</b> " + rawData[x].lat + "\n<b>Longitude:</b> " + rawData[x].lon);
                
                marker_cluster.addLayer(m);
            }
            
            map.addLayer(marker_cluster);
                    // var marker = L.marker(rawData[x].lat, rawData[x].lon).addTo(map);
            });
        }
            
            function postData() {
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
                    longitude: lat_long[1],
                    city: city,
                    state: state,
                    country: country
                    },
                    success: function(data, status) {
                    console.log("Data: " + data + "\nStatus: " + status);
                    }
                })
                $("#results").text(value);
            }

            $(document).ready(function() {
                getLocation();
                renderMap();
            });

            $("#submit").on("click", function(event) {
                // stopping the submit button from loading the page again
                event.preventDefault();
                postData();
            })