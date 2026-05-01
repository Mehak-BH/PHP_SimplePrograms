<?php

$file = "log.txt";
$message = "";

// -------- FORM SUBMISSION --------
if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    // VALIDATION
    if ($name == "" || $email == "") {
        $message = "❌ All fields are required!";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "❌ Invalid email!";
    } 
    else {
        // STRUCTURED LOG FORMAT
        $date = date("Y-m-d H:i:s");
        $log = $date . " | Name: " . $name . " | Email: " . $email . "\n";

        // FILE HANDLING (APPEND MODE)
        $handle = fopen($file, "a");

        if ($handle) {
            fwrite($handle, $log);
            fclose($handle);
            $message = "✅ Data logged successfully!";
        } else {
            $message = "❌ File error!";
        }
    }
}

// -------- READ FILE --------
$logs = "";
if (file_exists($file)) {
    $handle = fopen($file, "r");

    while (!feof($handle)) {
        $logs .= fgets($handle);
    }

    fclose($handle);
} else {
    $logs = "No records found.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Logging System</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        textarea { width: 100%; height: 200px; }
    </style>
</head>
<body>

<h2>📁 Form Logging System</h2>

<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<p><?php echo $message; ?></p>

<hr>

<h3>📊 Stored Logs</h3>
<textarea readonly><?php echo $logs; ?></textarea>

</body>
</html>