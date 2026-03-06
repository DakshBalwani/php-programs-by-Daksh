<?php
// Calculate solar time difference between Delhi and Kolkata using longitude

$delhiLong = 77.2090;

$kolkataLong = 88.3639;

$differenceDegrees = abs($kolkataLong - $delhiLong);

$differenceMinutes = $differenceDegrees * 4;

$hours = floor($differenceMinutes / 60);
$minutes = floor($differenceMinutes % 60);
$seconds = floor(($differenceMinutes - floor($differenceMinutes)) * 60);

echo "Solar Time Difference between Delhi and Kolkata:<br>";
echo $hours . " hours " . $minutes . " minutes " . $seconds . " seconds<br>";
echo "Details:<br>";
echo "Longitude Difference: " . $differenceDegrees . " degrees<br>";
echo "Time Difference: " . $differenceMinutes . " minutes<br>";

?>