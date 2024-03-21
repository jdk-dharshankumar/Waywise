<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Get User Location</title>
</head>
<body>
<form id="locationForm" action="map/index.php" method="post">
 
  <input type="hidden" id="originLatitudeInput" name="origin_latitude">
  <input type="hidden" id="originLongitudeInput" name="origin_longitude">


  <input type="hidden" id="destinationLatitudeInput" name="destination_latitude">
  <input type="hidden" id="destinationLongitudeInput" name="destination_longitude">
  <button type="submit">Search</button>
</form>

<script>


if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
} else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
}



function showPosition(position) {
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;
  
  // Set latitude and longitude values in hidden inputs
  document.getElementById('originLatitudeInput').value = latitude;
  document.getElementById('originLongitudeInput').value = longitude;


  document.getElementById('destinationLatitudeInput').value = "12.9229";
  document.getElementById('destinationLongitudeInput').value = "80.1275";
  
  // Submit the form
//   document.getElementById('locationForm').submit();
}
</script>
</body>
</html>