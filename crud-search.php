<?php
$file = "data.json";

// Ensure file exists
if (!file_exists($file)) {
    file_put_contents($file, "[]");
}

// Load data
$data = json_decode(file_get_contents($file), true);
if (!is_array($data)) $data = [];

$found = false;

// Form values
$erpid = $name = $class = $email = $mobile = "";
$search_erpid = "";

// ================= CLEAR =================
if (isset($_POST['clear'])) {
    header("Location: crud-search.php"); // reset everything
    exit();
}

// ================= ADD =================
if (isset($_POST['add'])) {

    $exists = false;
    foreach ($data as $row) {
        if ($row['erpid'] == $_POST['erpid']) {
            $exists = true;
            break;
        }
    }

    if (!$exists) {

        $data[] = [
            "erpid" => $_POST['erpid'],
            "name" => $_POST['name'],
            "class" => $_POST['class'],
            "email" => $_POST['email'],
            "mobile" => $_POST['mobile']
        ];

        file_put_contents($file, json_encode(array_values($data), JSON_PRETTY_PRINT));

        header("Location: crud-search.php");
        exit();

    } else {
        echo "<script>alert('erpid already exists');</script>";
    }
}

// ================= SEARCH =================
if (isset($_POST['search'])) {

    $search_erpid = $_POST['search_erpid'];
    $data = file("example.txt",FILE_IGNORE_NEW_LINES);
    foreach ($data as $rows) {
        $row = explode(",", $rows);
        if (strtolower($row[0]) == strtolower($search_erpid)) {

            $erpid = $row[0];
            $name = $row[1];
            $class = $row[2];
            $email = $row[3];
            $mobile = $row[4];

            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "<script>alert('Record not found');</script>";
    }
}

// ================= DELETE =================
if (isset($_POST['delete'])) {

    if (isset($_POST['found']) && $_POST['found'] == "1") {

        foreach ($data as $key => $row) {
            if ($row['erpid'] == $_POST['erpid']) {
                unset($data[$key]);
            }
        }

        file_put_contents($file, json_encode(array_values($data), JSON_PRETTY_PRINT));

        header("Location: crud-search.php");
        exit();

    } else {
        echo "<script>alert('Search first before delete');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee System</title>
    <style>
        body { font-family: Arial; text-align: center; background: #f5f5f5; }

        form {
            margin: 20px auto;
            padding: 20px;
            width: 360px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }

        input {
            margin: 8px;
            padding: 8px;
            width: 90%;
        }

        .btn-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        button {
            padding: 8px 12px;
            margin: 5px;
            cursor: pointer;
        }

        .search-row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-row input {
            width: 150px;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            background: white;
        }

        td, th {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>

<h2>Employee System (JSON)</h2>

<form method="post">

    <!-- MAIN FORM -->
    <input type="text" name="erpid" placeholder="Erp ID" value="<?= $erpid ?>"><br>
    <input type="text" name="name" placeholder="Name" value="<?= $name ?>"><br>
    <input type="text" name="class" placeholder="Class" value="<?= $class ?>"><br>
    <input type="email" name="email" placeholder="Email" value="<?= $email ?>"><br>
    <input type="text" name="mobile" placeholder="Mobile" value="<?= $mobile ?>"><br>

    <!-- SEARCH BAR -->
    <div class="search-row">
        <input type="text" name="search_erpid" placeholder="Search ErpID" value="<?= $search_erpid ?>">
        <button type="submit" name="search">Search</button>
    </div>

    <!-- Hidden flag -->
    <input type="hidden" name="found" value="<?= $found ? '1' : '0' ?>">

    <!-- BUTTONS -->
    <div class="btn-row">
        <button type="submit" name="add">Add</button>
        <button type="submit" name="delete">Delete</button>
        <button type="submit" name="clear">Clear</button>
    </div>

</form>

<h3>All Records</h3>

<table>
<tr>
    <th>erpid</th>
    <th>Name</th>
    <th>Class</th>
    <th>Email</th>
    <th>Mobile</th>
</tr>

<?php foreach ($data as $row) { ?>
<tr>
    <td><?= $row['erpid'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['class'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['mobile'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>