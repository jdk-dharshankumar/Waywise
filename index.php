<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   print_r($_POST);
  $lname= $_POST['lname'];

  // Do something with the received location data, for example, store it in a database
  // Example: store_location_in_database($latitude, $longitude);
  
  // Redirect the user to another page or show a message
    // echo $origin_latitude.";".$origin_longitude."|";
    // echo $destination_latitude.";".$destination_latitude;
}
?>

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
  <form action="/action_page.php">
  <!-- <label for="fname">Origin:</label>
  <input type="text" id="fname" name="fname"><br><br> -->
  <label for="lname">Destination:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <input type="submit" value="Submit">
</form>
  
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