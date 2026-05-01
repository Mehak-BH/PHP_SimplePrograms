<?php
// DATABASE CONNECTION
$conn = new mysqli("localhost", "root", "", "lab");

// CREATE TABLE IF NOT EXISTS
$conn->query("CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    product VARCHAR(100),
    price INT,
    qty INT,
    total INT
)");

// HANDLE FORM SUBMISSION
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $product = htmlspecialchars($_POST['product']);
    $price = (int)$_POST['price'];
    $qty = (int)$_POST['qty'];

    // VALIDATION
    if ($name == "" || $product == "" || $price <= 0 || $qty <= 0) {
        $message = "❌ Invalid input!";
    } else {
        $total = $price * $qty;

        $conn->query("INSERT INTO orders (name, product, price, qty, total)
                      VALUES ('$name', '$product', $price, $qty, $total)");

        $message = "✅ Order placed! Total = ₹" . $total;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Processing System</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        input { margin: 5px; }
        table { border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid black; padding: 8px; }
    </style>
</head>
<body>

<h2>🛒 Order Processing System</h2>

<!-- FORM -->
<form method="post">
    Name: <input type="text" name="name" required><br>
    Product: <input type="text" name="product" required><br>
    Price: <input type="number" name="price" required><br>
    Quantity: <input type="number" name="qty" required><br>
    <input type="submit" value="Place Order">
</form>

<p><?php echo $message; ?></p>

<hr>

<h3>📊 Admin Panel (All Orders)</h3>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM orders");

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['product']}</td>
        <td>{$row['price']}</td>
        <td>{$row['qty']}</td>
        <td>{$row['total']}</td>
    </tr>";
}
?>

</table>

</body>
</html>