<?php
session_start();

// Store orders in session
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = [];
}

// Add order
if (isset($_POST['submit'])) {

    $name = $_POST['customer_name'];
    $product = $_POST['product_name'];
    $price = $_POST['price'];
    $qty = $_POST['quantity'];

    // Basic validation
    if ($name == "" || $product == "" || $price == "" || $qty == "") {
        $error = "All fields are required!";
    } else {
        $total = $price * $qty;

        $order = [
            "name" => $name,
            "product" => $product,
            "price" => $price,
            "qty" => $qty,
            "total" => $total
        ];

        $_SESSION['orders'][] = $order;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Processing System</title>
</head>
<body>

<h2>Order Form</h2>

<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="POST">
    Customer Name: <input type="text" name="customer_name" required><br><br>
    Product Name: <input type="text" name="product_name" required><br><br>
    Price: <input type="number" name="price" required><br><br>
    Quantity: <input type="number" name="quantity" required><br><br>

    <button name="submit">Place Order</button>
</form>

<hr>

<h2>Admin - View Orders</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
</tr>

<?php
foreach ($_SESSION['orders'] as $order) {
    echo "<tr>
        <td>{$order['name']}</td>
        <td>{$order['product']}</td>
        <td>{$order['price']}</td>
        <td>{$order['qty']}</td>
        <td>{$order['total']}</td>
    </tr>";
}
?>

</table>

</body>
</html>