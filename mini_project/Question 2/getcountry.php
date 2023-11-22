<?php
$countryCode = $_GET['q'];

$url = "https://restcountries.com/v3.1/alpha/$countryCode";
$data = file_get_contents($url);
$country = json_decode($data, true);

$flag = $country[0]['flags']['png'];
$countryName = $country[0]['name']['common'];
$capitalCity = $country[0]['capital'][0];
$region = $country[0]['region'];
$subRegion = $country[0]['subregion'];
$currencies = implode(", ", array_column($country[0]['currencies'], 'name'));
$countryCode = $country[0]['cca2'];
$population = $country[0]['population'];
$area = $country[0]['area'];
$borders = implode(", ", $country[0]['borders']);
$lat = $country[0]['latlng'][0]; // Latitude for the country
$lng = $country[0]['latlng'][1]; // Longitude for the country
$googleMap = "https://www.google.com/maps/embed/v1/place?key=AIzaSyDkuiMgTOKGT1SsAXatW1B8m8sCR6UndSc&q=$lat,$lng";

// Output
echo "<table class='table' style='background-color:white;'>";
echo "<tr><td>Flag</td><td><img src='$flag' width='100px' /></td></tr>";
echo "<tr><td>Country Name</td><td>$countryName</td></tr>";
echo "<tr><td>Capital City</td><td>$capitalCity</td></tr>";
echo "<tr><td>Region</td><td>$region</td></tr>";
echo "<tr><td>Subregion</td><td>$subRegion</td></tr>";
echo "<tr><td>Currencies</td><td>$currencies</td></tr>";
echo "<tr><td>Country Code</td><td>$countryCode</td></tr>";
echo "<tr><td>Population</td><td>$population</td></tr>";
echo "<tr><td>Area</td><td>$area km²</td></tr>";
echo "<tr><td>Borders</td><td>$borders</td></tr>";
echo "<tr><td>Google Map</td><td><iframe width='300' height='200' frameborder='0' style='border:0' src='$googleMap' allowfullscreen></iframe></td></tr>";
echo "</table>";
?>
