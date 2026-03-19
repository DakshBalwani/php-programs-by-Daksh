<?php
// <!-- III.Form Submission and File Logging System:  
//  Develop a user input form using HTML. 
//  Process form data using PHP. 
// Validate and sanitize user inputs. 
// Store submitted data into a structured log file (.txt or .log). 
// Implement file handling operations (open, write, append, close). 
// Display confirmation message after successful submission. -->

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $message = sanitizeInput($_POST["message"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Prepare log entry
    $logEntry = "Name: $name | Email: $email | Message: $message | Date: " . date("Y-m-d H:i:s") . "\n";

    // Write to log file
    $logFile = fopen("submissions.log", "a");
    if ($logFile) {
        fwrite($logFile, $logEntry);
        fclose($logFile);
        echo "Thank you for your submission!";
    } else {
        echo "Unable to open log file.";
    }
}
?>