<?php
// write data into a file using fwrite function
$file = fopen("example.txt", "w+") or exit("Unable to open file!");
$txt = "Hello World\n";
fwrite($file, $txt);
$txt = "Welcome to PHP programming\n";
fwrite($file, $txt);
fseek($file, 0);
while(!feof($file)) {
    echo fgets($file) . "<br>"; 
}
fclose($file);
?>