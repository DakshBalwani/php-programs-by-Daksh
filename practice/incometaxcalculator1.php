<?php
$result = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = $_POST['emp_id'];
    $bs = $_POST['bs'];

    $da = 0.5 * $bs;
    $hra = 0.3 * $bs;

    $gross = $bs + $da + $hra;

    // Simple tax logic
    if ($gross <= 250000) {
        $tax = 0;
    } elseif ($gross <= 500000) {
        $tax = 0.05 * $gross;
    } elseif ($gross <= 1000000) {
        $tax = 0.2 * $gross;
    } else {
        $tax = 0.3 * $gross;
    }

    $net = $gross - $tax;

    $result = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Income Tax Calculator</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Income Tax Calculator</h2>

<form method="post">
    Employee ID: <input type="text" name="emp_id" required><br><br>
    Basic Salary: <input type="number" name="bs" min="0" required><br><br>
    <input type="submit" value="Calculate">
</form>

<?php if ($result) { ?>
    <h3>Result</h3>
    <table>
        <tr>
            <th>Employee ID</th>
            <th>Basic Salary</th>
            <th>DA (50%)</th>
            <th>HRA (30%)</th>
            <th>Gross Salary</th>
            <th>Tax</th>
            <th>Net Salary</th>
        </tr>
        <tr>
            <td><?php echo $emp_id; ?></td>
            <td><?php echo $bs; ?></td>
            <td><?php echo $da; ?></td>
            <td><?php echo $hra; ?></td>
            <td><?php echo $gross; ?></td>
            <td><?php echo $tax; ?></td>
            <td><?php echo $net; ?></td>
        </tr>
    </table>
<?php } ?>

</body>
</html>