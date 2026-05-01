<?php

$conn = new mysqli("localhost", "root", "", "lab");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CREATE TABLE
$conn->query("CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    course VARCHAR(50)
)");

$message = "";

// -------- ADD STUDENT --------
if (isset($_POST['add'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    // VALIDATION
    if ($name == "" || $email == "" || $course == "") {
        $message = "❌ All fields are required!";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "❌ Invalid email!";
    } 
    else {
        $conn->query("INSERT INTO students (name, email, course)
                      VALUES ('$name', '$email', '$course')");
        $message = "✅ Student added!";
    }
}

// -------- DELETE --------
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
    $message = "🗑️ Deleted!";
}

// -------- FETCH DATA FOR EDIT --------
$editData = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $editData = $result->fetch_assoc();
}

// -------- UPDATE --------
if (isset($_POST['update'])) {

    $id = (int)$_POST['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    // VALIDATION
    if ($name == "" || $email == "" || $course == "") {
        $message = "❌ All fields required for update!";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "❌ Invalid email!";
    } 
    else {
        $conn->query("UPDATE students 
                      SET name='$name', email='$email', course='$course' 
                      WHERE id=$id");
        $message = "✏️ Record updated!";
    }
}

// -------- FETCH ALL --------
$result = $conn->query("SELECT * FROM students");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Record System</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid black; padding: 8px; }
    </style>
</head>
<body>

<h2>🎓 Student Record Management System</h2>

<!-- ADD / UPDATE FORM -->
<form method="post">
    <input type="hidden" name="id" value="<?php echo $editData['id'] ?? ''; ?>">

    Name: <input type="text" name="name" value="<?php echo $editData['name'] ?? ''; ?>"><br><br>
    Email: <input type="text" name="email" value="<?php echo $editData['email'] ?? ''; ?>"><br><br>
    Course: <input type="text" name="course" value="<?php echo $editData['course'] ?? ''; ?>"><br><br>

    <?php if ($editData) { ?>
        <input type="submit" name="update" value="Update Student">
    <?php } else { ?>
        <input type="submit" name="add" value="Add Student">
    <?php } ?>
</form>

<p><?php echo $message; ?></p>

<hr>

<h3>📊 Student Records</h3>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Actions</th>
</tr>

<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['course']; ?></td>
    <td>
        <a href="?edit=<?php echo $row['id']; ?>">Edit</a> |
        <a href="?delete=<?php echo $row['id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>