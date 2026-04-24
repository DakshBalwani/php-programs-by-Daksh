<?php
// ================= DEBUG MODE =================
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Show current file path (helps debug URL issues)
echo "<small>Running file: " . __FILE__ . "</small><br><br>";

// ================= DATABASE CONNECTION =================
$conn = new mysqli("localhost", "root", "", "student_db");

if ($conn->connect_error) {
    die("❌ DB Connection Failed: " . $conn->connect_error);
} else {
    echo "<small style='color:green'>✅ Database Connected</small><br><br>";
}

// ================= CREATE TABLE IF NOT EXISTS =================
$conn->query("
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15),
    course VARCHAR(50)
)
");

// ================= ADD / UPDATE =================
if (isset($_POST['save'])) {

    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);

    if (empty($name) || empty($email)) {
        $error = "❌ Name & Email required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "❌ Invalid Email!";
    } else {

        if ($id == "") {
            $stmt = $conn->prepare("INSERT INTO students(name,email,phone,course) VALUES(?,?,?,?)");
            $stmt->bind_param("ssss", $name, $email, $phone, $course);
        } else {
            $stmt = $conn->prepare("UPDATE students SET name=?, email=?, phone=?, course=? WHERE id=?");
            $stmt->bind_param("ssssi", $name, $email, $phone, $course, $id);
        }

        if ($stmt->execute()) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $error = "❌ DB Error: " . $conn->error;
        }
    }
}

// ================= DELETE =================
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// ================= EDIT FETCH =================
$editData = ["id"=>"","name"=>"","email"=>"","phone"=>"","course"=>""];
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $res = $conn->query("SELECT * FROM students WHERE id=$id");
    if ($res && $res->num_rows > 0) {
        $editData = $res->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Case 5 - Student System</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        input { padding: 6px; margin: 5px; }
        button { padding: 8px 15px; background: purple; color: white; border: none; }
        .error { color: red; }
    </style>
</head>
<body>

<h2>🎓 Student Record Management (case5.php)</h2>

<?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

<!-- FORM -->
<form method="POST">
    <input type="hidden" name="id" value="<?= $editData['id'] ?>">

    Name: <input type="text" name="name" value="<?= $editData['name'] ?>" required>
    Email: <input type="email" name="email" value="<?= $editData['email'] ?>" required>
    Phone: <input type="text" name="phone" value="<?= $editData['phone'] ?>">
    Course: <input type="text" name="course" value="<?= $editData['course'] ?>">

    <button name="save"><?= $editData['id'] ? 'Update' : 'Add' ?></button>
</form>

<br>

<!-- TABLE -->
<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM students ORDER BY id DESC");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['course']}</td>
            <td>
                <a href='?edit={$row['id']}'>Edit</a> |
                <a href='?delete={$row['id']}' onclick='return confirm(\"Delete?\")'>Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No Records Found</td></tr>";
}
?>

</table>

</body>
</html>