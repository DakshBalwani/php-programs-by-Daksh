<!-- write php code to store student data submitted through html form and print the values using echo statement
 create 2 php file to demonstartiate get and post methods seperately observe the difference with get and post method and comment your observation
 save it in notepad -->
<?php
// This PHP code is for handling form submission using GET method
if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
    // Collecting form data from GET method
    $name = isset($_GET['fullName']) ? $_GET['fullName'] : 'N/A';
    $class = isset($_GET['class']) ? $_GET['class'] : 'N/A';
    $section = isset($_GET['section']) ? $_GET['section'] : 'N/A';
    $mobile = isset($_GET['mobileNo']) ? $_GET['mobileNo'] : 'N/A';

    //save it in notepad
    $data = "Name: " . $name . "\nClass: " . $class . "\nSection: " . $section . "\nMobile: " . $mobile . "<br><br>";
    file_put_contents('student_data.txt', $data, FILE_APPEND);

    // Displaying the collected data
    echo "<h2>Student Registration Details (GET Method)</h2>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
    echo "<p><strong>Class:</strong> " . htmlspecialchars($class) . "</p>";
    echo "<p><strong>Section:</strong> " . htmlspecialchars($section) . "</p>";
    echo "<p><strong>Mobile:</strong> " . htmlspecialchars($mobile) . "</p>";
    echo "<br><a href='excercise4.html'>Back to Form</a>";
} else {
    echo "<h2>GET Method Observation</h2><p>No data received or form not submitted using GET method.</p>";
    echo "<p><strong>Observation:</strong> In GET method, data is visible in the URL query string, which can be a security concern for sensitive information.</p>";
    echo "<br><a href='excercise4.html'>Back to Form</a>";
}

?>
