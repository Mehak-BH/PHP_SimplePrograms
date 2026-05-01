<html>
<body>
<form method="post">
Product: <input type="text" name="product"><br>
Quantity: <input type="number" name="qty"><br>
Price: <input type="number" name="price"><br>
<input type="submit">
</form>

<?php
if ($_POST) {
    $total = $_POST['qty'] * $_POST['price'];
    echo "Total Amount: " . $total;
}
?>
</body>
</html>