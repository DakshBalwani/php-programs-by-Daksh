<!-- calculate age in number of hours, minutes, and seconds -->
<?php
$birthdate = new DateTime("2005-06-07 00:30:10");

$today = new DateTime();

$difference = $today->diff($birthdate);

$years = $difference->y;
$months = $difference->m;
$days = $difference->d;
$hours = $difference->h;
$minutes = $difference->i;
$seconds = $difference->s;

// Calculate total hours, minutes, and seconds
$totalDays = $years * 365 + $months * 30 + $days;
$totalHours = $totalDays * 24 + $hours;
$totalMinutes = $totalHours * 60 + $minutes;
$totalSeconds = $totalMinutes * 60 + $seconds;

echo "Age: " . $years . " years, " . $months . " months, " . $days . " days<br>";
echo "Time: " . $hours . " hours, " . $minutes . " minutes, " . $seconds . " seconds<br>";
echo "<br>";
echo "Total Age:<br>";
echo "Age in Hours: " . $totalHours . "<br>";
echo "Age in Minutes: " . $totalMinutes . "<br>";
echo "Age in Seconds: " . $totalSeconds . "<br>";
echo "Breakdown:<br>";
echo "Years: " . $years . "<br>";
echo "Months: " . $months . "<br>";
echo "Days: " . $days . "<br>";
echo "Hours: " . $hours . "<br>";
echo "Minutes: " . $minutes . "<br>";
echo "Seconds: " . $seconds . "<br>";    
?>