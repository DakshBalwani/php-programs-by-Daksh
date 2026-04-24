<!-- student enquiry form with SQL integration of phpmyadmin enwuiry table of sms database in mysql database provide sql code also and print confirmation message after submission of form data to database. The form should have fields for name, address, dob, mob, email, course -->
 <!-- with name, address, dob, mob, email, course, save clear buttons -->
  <!-- box formatting -->

<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sms";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $mob = $_POST['mob'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // SQL query to insert data into the enquiry table
    $sql = "INSERT INTO enquiry (name, address, dob, mob, email, course) VALUES ('$name', '$address', '$dob', '$mob', '$email', '$course')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Enquiry Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        h2 {
            color: #333;
                text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            align-items: center;
        }
        input[type="text"], input[type="date"], input[type="email"] {
            width: 90%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"], input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
            align-items: center;
            margin: 0 auto;
            text-align: center;

        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Student Enquiry Form</h2>
        Name: <input type="text" name="name" required><br><br>
        Address: <input type="text" name="address" required><br><br>
        Date of Birth: <input type="date" name="dob" required><br><br>
        Mobile: <input type="text" name="mob" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Course: <input type="text" name="course" required><br><br>
        <input type="submit" value="Save">
        <input type="reset" value="Clear">
    </form>
</body>
</html>
<!-- SQL code to create the enquiry table in the sms database -->
<!--
CREATE TABLE `enquiry` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `address` varchar(255) NOT NULL,
    `dob` date NOT NULL,
    `mob` varchar(15) NOT NULL,
    `email` varchar(255) NOT NULL,
    `course` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-->

