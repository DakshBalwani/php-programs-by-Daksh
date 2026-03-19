<!-- wrtie php code to store student data submitted through html form and print the values using echo statement 
 create 2 php file to demonstartiate get and post methods seperately observe the difference with get and post method and comment your observation
 save it in notepad -->
<?php
// This PHP code is for handling form submission using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $name = isset($_POST['fullName']) ? $_POST['fullName'] : 'N/A';
    $class = isset($_POST['class']) ? $_POST['class'] : 'N/A';
    $section = isset($_POST['section']) ? $_POST['section'] : 'N/A';
    $mobile = isset($_POST['mobileNo']) ? $_POST['mobileNo'] : 'N/A';
    $data = "Name: " . $name . "\nClass: " . $class . "\nSection: " . $section . "\nMobile: " . $mobile . "<br><br>";
    file_put_contents('student_data.txt', $data, FILE_APPEND);
    
    // Displaying the collected data
    echo "<h2>Student Registration Details (POST Method)</h2>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
    echo "<p><strong>Class:</strong> " . htmlspecialchars($class) . "</p>";
    echo "<p><strong>Section:</strong> " . htmlspecialchars($section) . "</p>";
    echo "<p><strong>Mobile:</strong> " . htmlspecialchars($mobile) . "</p>";
    echo "<br><a href='excercise4.html'>Back to Form</a>";
} else {
    echo "<h2>POST Method Observation</h2><p>No data received or form not submitted using POST method.</p>";
    echo "<p><strong>Observation:</strong> In POST method, data is hidden in the request body and not visible in the URL, which is more secure for sensitive information.</p>";
    echo "<br><a href='excercise4.html'>Back to Form</a>";
}
?>
