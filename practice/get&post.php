<!-- GET and POST Methods in PHP -->
<!DOCTYPE html>
<html>
<head>
    <title>GET and POST Methods in PHP</title>
</head>
<body>
<h1>GET and POST Methods in PHP</h1>
<!-- GET Method -->
<h2>GET Method</h2>
<form method="get">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    <input type="submit" value="Submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['name']) && isset($_GET['email'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];    
    echo "GET Method - Name: " . $name . "<br>";
    echo "GET Method - Email: " . $email;
}
?>

</body>
</html>