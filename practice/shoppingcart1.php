<?php
$products = [
"laptop" => 500000,
"Mobile" => 45552];

$total = 0;
?>

<!doctype html>
<html>
<head>
<title>
shopping cart
</title>
</head>
<body>
<h1>
Shopping cart System
</h1>
<form method = "post">
<table border='1px solid black' border-collapse='collapse' cellpadding='10'>
<tr>
<th>Select</th>
<th>product</th>
<th>price</th>
<th>qty</th>
</tr>
<?php foreach($products as $name => $price){?>
<tr>
<td><input type = "checkbox" name="product[]" value="<?php echo $name;?>"></td>
<td><?php echo $name;?></td>
<td><?php echo $price;?></td>
<td><input type="number" name="qty[<?php echo $name;?>]"  min="1" value="1"></td>
</tr>
<?php }?>
</table>
<br><br><br>
discount:
<select name="discount">
<option value="0">No Discount</option>
<option value="10">10%</option>
<option value= "20">20%</option>
</select>
<br>
<br>
<input type="submit" value="calculate" name="calculate">
</form>


<?php
if(isset($_POST['calculate'])){
if(!empty($_POST['product'])){
echo "<h3>BIll Details:<h3>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>product</th><th>price</th><th>qty</th><th>subtotal</th></tr>";
foreach($_POST['product'] as $selected){
$price = $products[$selected];
$qty = $_POST['qty'][$selected];
$subtotal = $price * $qty;
$total += $subtotal;

echo "<tr>
<td>$selected</td>
<td>$price</td>
<td>$qty</td>
<td>$subtotal</td>
</tr>";
}


echo" </table> ";
$discount = $_POST['discount'];
$discountvalue= ($discount * $total) / 100;
$totalfinal  = $total - $discountvalue;
echo "<br><br> Total Amount: ₹$total";
echo "<br> Discount: $discount%: ₹$discountvalue";
echo "<br><strong> Final Total: ₹$totalfinal <strong>";
}else{
echo "<p style='color:red;'> Please Select At Least One Product.</p>";
}}

?>

</body>
</html>

