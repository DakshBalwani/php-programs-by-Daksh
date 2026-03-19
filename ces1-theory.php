<?php
// Set your birthdate
$birthdate = "2005-07-10 08:30:00";

// Current date & time
$currentDate = new DateTime();
$birthDateObj = new DateTime($birthdate);

// Calculate difference
$interval = $currentDate->diff($birthDateObj);

// Convert total days into hours, minutes, seconds
$totalDays = $interval->days;
$totalHours = $totalDays * 24;
$totalMinutes = $totalHours * 60;
$totalSeconds = $totalMinutes * 60;

// Display message
echo "Hey <Ankit> you are "
    . $interval->y . " years "
    . $interval->m . " months "
    . $interval->d . " days old.<br>";

echo "You have spent $totalHours hours, $totalMinutes minutes, and $totalSeconds seconds on this beautiful Earth.<br>";

echo "<b>Happy Birthday 🎉</b>";
?>