<?php
// Weekly rates (Mon–Sun)
$gold = [6000, 6050, 6020, 6100, 6080, 6150, 6200];
$silver = [70, 72, 71, 73, 75, 74, 76];
$diamond = [50000, 50500, 50200, 51000, 50800, 51500, 52000];

$products = [
    "Gold" => $gold,
    "Silver" => $silver,
    "Diamond" => $diamond
];

// Display rates
foreach ($products as $name => $rates) {
    echo "<h3>$name Rates:</h3>";
    
    foreach ($rates as $day => $rate) {
        echo "Day " . ($day + 1) . " : ₹$rate <br>";
    }

    // Calculations
    $max = max($rates);
    $min = min($rates);
    $avg = array_sum($rates) / count($rates);

    echo "Highest: ₹$max <br>";
    echo "Lowest: ₹$min <br>";
    echo "Average: ₹" . round($avg, 2) . "<br><br>";
}
?>