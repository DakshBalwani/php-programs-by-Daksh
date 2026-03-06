<?php
// read a data from file using fgets function
$file = fopen("student_data.txt", "r") or exit("Unable to open file!");
while(!feof($file)) {
    echo fgets($file) . "<br>";
}
fclose($file);
?>