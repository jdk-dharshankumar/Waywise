<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   print_r($_POST);
  $origin_latitude = $_POST['origin_latitude'];
  $origin_longitude = $_POST['origin_longitude'];
  $destination_latitude = $_POST['destination_latitude'];
  $destination_longitude = $_POST['destination_longitude'];
  // Do something with the received location data, for example, store it in a database
  // Example: store_location_in_database($latitude, $longitude);
  
  // Redirect the user to another page or show a message
    // echo $origin_latitude.";".$origin_longitude."|";
    // echo $destination_latitude.";".$destination_latitude;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Navigation with OpenStreetMap</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 13); // Center the map initially at [0, 0] with a zoom level of 13

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function onLocationFound(e) {
            var userMarker = L.marker(e.latlng).addTo(map).bindPopup("You are here").openPopup();
            map.setView(e.latlng, 15); // Set the map's view to the user's location with a higher zoom level

            // Define the destination coordinates
            var destination = L.latLng(<?echo $destination_latitude?>,<?echo $destination_longitude?>);

            // Add a marker for the destination
            L.marker(destination).addTo(map).bindPopup("Destination");

            // Define routing control
            L.Routing.control({
                waypoints: [
                    L.latLng(<?echo $origin_latitude?>, <?echo $origin_longitude?>), // User's current location
                    destination // Destination
                ],
                routeWhileDragging: true
            }).addTo(map);
        }

        function onLocationError(e) {
            alert(e.message);
        }

        map.on('locationfound', onLocationFound);
        map.on('locationerror', onLocationError);

        // Request user's location
        map.locate({setView: true, maxZoom: 16});
    </script>
</body>
</html>