<?php

// IV.Demonstrating Cookies & Sessions for Order Processing System:  
// Design order form. 
// Implement session-based cart storage. 
// Set and retrieve cookies for user preference. 
// Display dynamic order summary. 
// Clear session after order confirmation. 
// Test cookie persistence across browser refresh.
session_start();
if (isset($_POST['save_user'])) {
    $_SESSION['name'] = $_POST['name'];

    // Save cookie
    setcookie("username", $_POST['name'], time()+3600);
}

// STEP 2: Add Order
if (isset($_POST['add_order'])) {
    $_SESSION['product'] = $_POST['product'];
    $_SESSION['qty'] = $_POST['qty'];
}

// STEP 3: Confirm Order (CLEAR + REDIRECT)
if (isset($_POST['confirm'])) {
    session_destroy();

    // Show message + redirect after 2 seconds
    echo "<h2>Session Cleared! Redirecting to Login...</h2>";
    header("refresh:2;url=".$_SERVER['PHP_SELF']);
    exit();
}
?>

<html>
<body>

<?php
// ===== USER FORM =====
if (!isset($_SESSION['name'])) {
?>

<h2>Login (User Form)</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    <button name="save_user">Login</button>
</form>

<?php
} else {
?>

<!-- ===== ORDER FORM ===== -->
<h2>Welcome <?php echo $_SESSION['name']; ?></h2>

<form method="post">
    Product:
    <select name="product">
        <option>Laptop</option>
        <option>Mobile</option>
    </select><br><br>

    Quantity:
    <input type="number" name="qty" required><br><br>

    <button name="add_order">Add Order</button>
</form>

<hr>

<!-- ===== SUMMARY ===== -->
<h3>Order Summary</h3>

<?php
if (isset($_SESSION['product'])) {
    echo "User: " . $_SESSION['name'] . "<br>";
    echo "Product: " . $_SESSION['product'] . "<br>";
    echo "Quantity: " . $_SESSION['qty'] . "<br>";
} else {
    echo "No order yet";
}
?>

<br><br>

<form method="post">
    <button name="confirm">Confirm Order</button>
</form>

<hr>

<!-- COOKIE -->
<h3>Cookie (Username)</h3>
<?php
if (isset($_COOKIE['username'])) {
    echo $_COOKIE['username'];
}
?>

<?php
}
?>

</body>
</html>