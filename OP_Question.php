<?php
// ================= DATABASE CONNECTION =================
$host = "localhost";
$user = "root";
$password = "";
$dbname = "OrderProcessingDB";

// Create connection
$conn = new mysqli($host, $user, $password);

// Create database if not exists
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");

// Select database
$conn->select_db($dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ================= CREATE TABLES =================
$conn->query("CREATE TABLE IF NOT EXISTS Customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(15)
)");

$conn->query("CREATE TABLE IF NOT EXISTS Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100),
    price DECIMAL(10,2),
    stock INT
)");

$conn->query("CREATE TABLE IF NOT EXISTS Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date DATE,
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
)");

$conn->query("CREATE TABLE IF NOT EXISTS OrderDetails (
    order_detail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (order_id) REFERENCES Orders(order_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
)");

echo "<h3>Tables Created Successfully</h3>";

// ================= INSERT DATA =================
$conn->query("INSERT INTO Customers (name, email, phone)
VALUES ('Mehak Sharma', 'mehak@gmail.com', '9876543210')");

$conn->query("INSERT INTO Products (product_name, price, stock)
VALUES ('Laptop', 60000, 10),
       ('Mouse', 500, 50)");

$conn->query("INSERT INTO Orders (customer_id, order_date)
VALUES (1, CURDATE())");

$conn->query("INSERT INTO OrderDetails (order_id, product_id, quantity)
VALUES (1, 1, 1)");

echo "<h3>Data Inserted</h3>";

// ================= UPDATE =================
$conn->query("UPDATE Products SET price = 55000 WHERE product_id = 1");
echo "<h3>Product Updated</h3>";

// ================= DELETE =================
$conn->query("DELETE FROM OrderDetails WHERE order_detail_id = 1");
echo "<h3>Record Deleted</h3>";

// ================= TRANSACTION =================
$conn->autocommit(FALSE);

try {
    // First update
    $conn->query("UPDATE Products SET stock = stock - 1 WHERE product_id = 1");

    // Savepoint
    $conn->query("SAVEPOINT sp1");

    // Second update
    $conn->query("UPDATE Products SET stock = stock - 2 WHERE product_id = 2");

    // Uncomment to simulate error
    // throw new Exception("Error Occurred");

    // Commit
    $conn->commit();
    echo "<h3>Transaction Successful</h3>";

} catch (Exception $e) {
    $conn->query("ROLLBACK TO sp1");
    $conn->rollback();
    echo "<h3>Transaction Failed</h3>";
}

$conn->autocommit(TRUE);

$conn->close();
?>