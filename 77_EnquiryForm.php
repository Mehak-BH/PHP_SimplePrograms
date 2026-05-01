<?php
// Step 1: Connect to MySQL server
$conn = new mysqli("localhost", "root", "");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Create Database
$sql = "CREATE DATABASE IF NOT EXISTS sms";
$conn->query($sql);

// Select Database
$conn->select_db("sms");

// Step 3: Create Table
$table = "CREATE TABLE IF NOT EXISTS enquiry (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    address TEXT,
    dob DATE,
    mobile VARCHAR(15),
    email VARCHAR(100),
    course VARCHAR(100)
)";
$conn->query($table);

// Message variable
$message = "";

// Step 4: Insert Data
if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Basic validation
    if ($name == "" || $mobile == "" || $email == "") {
        $message = "Please fill required fields!";
    } else {

        $sql = "INSERT INTO enquiry (name, address, dob, mobile, email, course)
                VALUES ('$name', '$address', '$dob', '$mobile', '$email', '$course')";

        if ($conn->query($sql) === TRUE) {
            $message = "Data has been recorded successfully!";
        } else {
            $message = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Enquiry Form</title>
    <style>
        body { font-family: Arial; }
        .box {
            width: 400px;
            margin: auto;
            border: 1px solid black;
            padding: 20px;
        }
        input, textarea {
            width: 100%;
            margin-bottom: 10px;
        }
        .msg { color: green; }
    </style>
</head>
<body>

<div class="box">
    <h2>Student Enquiry Form</h2>

    <!-- Confirmation Message -->
    <p class="msg"><?php echo $message; ?></p>

    <form method="post">
        Name:
        <input type="text" name="name">

        Address:
        <textarea name="address"></textarea>

        DOB:
        <input type="date" name="dob">

        Mobile:
        <input type="text" name="mobile">

        Email:
        <input type="email" name="email">

        Course:
        <input type="text" name="course">

        <input type="submit" name="save" value="Save">
        <input type="reset" value="Clear">
    </form>
</div>

</body>
</html>