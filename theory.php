<?php
// date_default_timezone_set("ASIA/KOLKATA");
// $datetime = date("Y-m-d H:i:s");

// Current date/time
$datetime = new DateTime();

// Example: calculate age from a birthdate
$datetime1 = new DateTime("2005-07-06 00:30:10");
$difference = $datetime->diff($datetime1);

$year = $difference->y;
$month = $difference->m;
$day = $difference->d;
$hour = $difference->h;
$minute = $difference->i;
$second = $difference->s;
echo "Hey <<AKSHAY>> YOU ARE " . $year . " YEARS, " . $month . " MONTHS AND " . $day . " DAYS OLD.. YOU HAVE SPENT " . $hour . " HOURS, " . $minute . " MINUTES, AND " . $second . " SECONDS ON THIS BEAUTIFUL EARTH. HAPPY BIRTHDAY";
