<?php
//  Reusable PHP Utility Library :  
//   Develop reusable PHP functions. 
//   Implement arrays for configuration and data handling. 
//   Design utility classes using OOP concepts. 
//   Create a modular structure for easy integration into other projects. 
//   Improve clean coding and structured programming practices. 

// Example of a reusable function with configuration array and data handling:
function calculateAge($birthdate) {

    $config = [
        'format' => 'Y-m-d H:i:s'
    ];

    $datetime = new DateTime();
    $datetime1 = new DateTime($birthdate);
    $difference = $datetime->diff($datetime1);

    return [
        'years' => $difference->y,
        'months' => $difference->m,
        'days' => $difference->d,
        'hours' => $difference->h,
        'minutes' => $difference->i,
        'seconds' => $difference->s
    ];
}
// Example usage
$age = calculateAge("2005-02-23 12:30:10");
echo "Hey <<<Yuvraj>Yuvraj>> YOU ARE " . $age['years'] . " YEARS, " . $age['months'] . " MONTHS AND " . $age['days'] . " DAYS OLD.. YOU HAVE SPENT " . $age['hours'] . " HOURS, " . $age['minutes'] . " MINUTES, AND " . $age['seconds'] . " SECONDS ON THIS BEAUTIFUL EARTH. HAPPY BIRTHDAY";
