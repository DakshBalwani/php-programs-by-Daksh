<?php
$cities = ["Delhi", "Mumbai", "Chennai", "Dubai", "Kolkata", "Dhaka"];

// Sort alphabetically
sort($cities);

echo "<h3>Sorted Cities:</h3>";
foreach ($cities as $city) {
    echo $city . "<br>";
}

// Cities starting with D (Manual check)
echo "<h3>Cities starting with 'D':</h3>";

foreach ($cities as $city) {
    // Check first character manually
    if ($city[0] == 'D' || $city[0] == 'd') {
        echo $city . "<br>";
    }
}
?>