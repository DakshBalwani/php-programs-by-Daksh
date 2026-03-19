<?php
// Input
$name = "Akshay";
$basic = 50000;

// Calculations
$hra = 0.20 * $basic;
$da = 0.10 * $basic;
$gross = $basic + $hra + $da;
$tax = 0.10 * $gross;
$net = $gross - $tax;

// Associative array
$salary = [
    "Employee Name" => $name,
    "Basic Salary" => $basic,
    "HRA" => $hra,
    "DA" => $da,
    "Gross Salary" => $gross,
    "Tax Deduction" => $tax,
    "Net Salary" => $net
];

// Display in table
echo "<table border='1' cellpadding='10'>";
foreach ($salary as $key => $value) {
    echo "<tr>
            <td><b>$key</b></td>
            <td>₹$value</td>
          </tr>";
}
echo "</table>";
?>