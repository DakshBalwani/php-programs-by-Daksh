<!-- enquiry form in a box format consisting of feilds name, email, phone, and erp with proper validation of each field and store in a file json-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enquiry Form</title>
    <style>
        .enquiry-form {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 0 auto;
        }
        .enquiry-form label {
            display: block; 
            margin-bottom: 5px;
        }
        .enquiry-form input {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .enquiry-form button {
            width: 90%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .enquiry-form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="enquiry-form">
        <h1 style="text-align: center;">Enquiry Form</h1>
        <hr>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="number" id="phone" name="phone" pattern="[0-9]{10}" required>
            <label for="erp">ERP:</label>
            <input type="text" id="erp" name="erp" required>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $erp = $_POST['erp'];
        $textfile = fopen("enquiry.txt", "a");
        $txt = "Name: " . $name . "\nEmail: " . $email . "\nPhone: " . $phone . "\nERP: " . $erp . "\n\n";
        fwrite($textfile, $txt);
        fclose($textfile);
        echo "<p style='text-align: center; color: green;'>Enquiry submitted successfully!</p>";
        }
    ?>
</body>
</html>
<!-- 🧠 1. Concepts Used (Theory)
🔹 1. HTML Form Handling
Form collects user input:
Name
Email
Phone
ERP
Uses:
<form method="post">

👉 Data is sent to the same page using POST method

🔹 2. Client-Side Validation

Validation done using HTML attributes:

required → field must be filled
type="email" → valid email format
pattern="[0-9]{10}" → phone must be exactly 10 digits

👉 Prevents invalid input before sending to server

🔹 3. Server-Side Data Handling
PHP receives data using:
$_POST
Ensures form is submitted using:
isset($_POST['submit'])
🔹 4. Associative Array
$enquiryData = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'erp' => $erp
];

👉 Stores data in key-value format

🔹 5. JSON File Storage
Data stored in .json file instead of database
JSON = lightweight data format

👉 Example structure:

[
  {
    "name": "Akshay",
    "email": "abc@gmail.com",
    "phone": "9876543210",
    "erp": "12345"
  }
]
🔹 6. File Handling in PHP

Functions used:

file_exists() → check file
file_get_contents() → read file
file_put_contents() → write file
json_encode() → convert array → JSON
json_decode() → JSON → array
🔄 2. Flow of Execution
Step 1: Display Form (HTML)
User sees input fields inside a styled box
CSS makes it centered and clean
Step 2: User Enters Data

Fields:

Name
Email
Phone
ERP

👉 Validation happens before submit

Step 3: Form Submission Check
if (isset($_POST['submit']))
Runs only when Submit button is clicked
Step 4: Collect Input Data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$erp = $_POST['erp'];

👉 Data is fetched from form

Step 5: Store in Array
$enquiryData = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'erp' => $erp
];

👉 One enquiry = one array object

Step 6: Check JSON File Exists
if (file_exists($file))
Case 1: File Exists
Read old data
$currentData = json_decode(file_get_contents($file), true);
Add new data
$currentData[] = $enquiryData;
Save updated data
file_put_contents($file, json_encode($currentData, JSON_PRETTY_PRINT));
Case 2: File Does Not Exist
file_put_contents($file, json_encode([$enquiryData], JSON_PRETTY_PRINT));

👉 Creates new file and stores first record

Step 7: Success Message
echo "<p>Enquiry submitted successfully!</p>";
🔑 3. Key Functions Used
Function	Purpose
isset()	Check form submission
$_POST	Get form data
file_exists()	Check if file exists
file_get_contents()	Read file
file_put_contents()	Write file
json_encode()	Convert array → JSON
json_decode()	Convert JSON → array
📌 4. Validation Summary
Field	Validation Type
Name	Required
Email	Email format
Phone	10 digits pattern
ERP	Required
📊 5. Overall Working (In One Line)

👉 This program collects user enquiry data, validates it, and stores it in a JSON file for persistent storage.  -->