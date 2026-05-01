<?php
$host = "localhost";
$user = "root";
$pass = "";

// Create connection
$conn = new mysqli($host, $user, $pass);

// Create Database
$conn->query("CREATE DATABASE IF NOT EXISTS orders_db");

// Select DB
$conn->select_db("orders_db");

// Create Table with Primary Key
$conn->query("
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product VARCHAR(50),
    quantity INT,
    price FLOAT
)
");

// Enable transaction
$conn->begin_transaction();

try {
    // INSERT
    $conn->query("INSERT INTO orders (product, quantity, price) VALUES ('Pen', 10, 5)");
    $conn->query("INSERT INTO orders (product, quantity, price) VALUES ('Book', 3, 50)");

    // UPDATE
    $conn->query("UPDATE orders SET price = 6 WHERE product = 'Pen'");

    // DELETE
    $conn->query("DELETE FROM orders WHERE quantity < 5");

    // Commit changes
    $conn->commit();

    echo "Transaction Successful<br>";

    // Display Data
    $result = $conn->query("SELECT * FROM orders");

    echo "<table border=1>";
    echo "<tr><th>ID</th><th>Product</th><th>Quantity</th><th>Price</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['product']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['price']}</td>
              </tr>";
    }
    echo "</table>";

} catch (Exception $e) {
    // Rollback if error
    $conn->rollback();
    echo "Transaction Failed";
}

$conn->close();
?>