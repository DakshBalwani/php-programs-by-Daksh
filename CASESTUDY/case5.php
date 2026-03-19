<!-- V.Student Record Management System:  
  Design database and student table. 
  Implement add, view, edit, delete functionality. 
  Create dynamic interface using PHP loops. 
Validate user input. 
Test system for multiple entries.  -->
<?php
$file = "students.json";

// Create file if not exists
if (!file_exists($file)) {
    file_put_contents($file, "[]");
}

// Read data
$data = json_decode(file_get_contents($file), true);
if (!is_array($data)) {
    $data = [];
}

// Initialize edit
$editData = null;

// ADD
if (isset($_POST['add'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    if ($name && $email && $course) {
        $data[] = [
            "name" => $name,
            "email" => $email,
            "course" => $course
        ];

        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<p style='color:red;text-align:center;'>All fields required!</p>";
    }
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    unset($data[$id]);
    $data = array_values($data);

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// EDIT LOAD
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $editData = $data[$id];
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $data[$id] = [
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "course" => $_POST['course']
    ];

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
?>

<html>
<head>
<title>Student Record System</title>

<style>
body {
    font-family: Arial;
    background: #f4f6f8;
    margin: 0;
}

/* CENTER */
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 40px;
}

/* FORM */
.form-box {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}

h2 {
    text-align: center;
}

/* INPUT */
input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
}

/* BUTTON */
button {
    width: 100%;
    padding: 10px;
    background: #007bff;
    color: white;
    border: none;
    margin-top: 10px;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}

/* TABLE */
.table-box {
    width: 90%;
    margin: 40px auto;
}

table {
    border-collapse: collapse;
    width: 100%;
    background: white;
}

th {
    background: #007bff;
    color: white;
}

th, td {
    padding: 10px;
    text-align: center;
}

a {
    text-decoration: none;
    color: blue;
}
</style>

</head>
<body>

<div class="container">

    <div class="form-box">
        <h2>Student Form</h2>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $_GET['edit'] ?? ''; ?>">

            Name:
            <input type="text" name="name" value="<?php echo $editData['name'] ?? ''; ?>">

            Email:
            <input type="email" name="email" value="<?php echo $editData['email'] ?? ''; ?>">

            Course:
            <input type="text" name="course" value="<?php echo $editData['course'] ?? ''; ?>">

            <?php if ($editData) { ?>
                <button name="update">Update</button>
            <?php } else { ?>
                <button name="add">Add</button>
            <?php } ?>
        </form>
    </div>

</div>

<div class="table-box">

<h2>Student Records</h2>

<!-- BONUS -->
<h3>Total Students: <?php echo count($data); ?></h3>

<table border="1">
<tr>
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php
foreach ($data as $index => $student) {
?>
<tr>
    <td><?php echo $index + 1; ?></td>
    <td><?php echo $student['name']; ?></td>
    <td><?php echo $student['email']; ?></td>
    <td><?php echo $student['course']; ?></td>
    <td>
        <a href="?edit=<?php echo $index; ?>">Edit</a> |
        <a href="?delete=<?php echo $index; ?>" 
           onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>