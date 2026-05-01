<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Income Tax Calculator</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>

<h1>Income Tax Calculator</h1>

<form method="post">
    <label>Employee ID:</label>
    <input type="text" name="employee_id" required><br><br>

    <label>Basic Salary:</label>
    <input type="number" name="basic_salary" min="0" required><br><br>

    <input type="submit" name="submit" value="Add">
</form>

<?php
if (isset($_POST['submit'])) {

    $employee_id = $_POST['employee_id'];
    $basic_salary = $_POST['basic_salary'];

    if (is_numeric($basic_salary) && $basic_salary >= 0) {

        $da = 0.5 * $basic_salary;
        $hra = 0.3 * $basic_salary;
        $net_salary = $basic_salary + $da + $hra;

        $found = false;

        // ✅ Check & Update existing record
        if (!empty($_SESSION['records'])) {
            foreach ($_SESSION['records'] as &$row) {
                if ($row['id'] == $employee_id) {
                    $row['bs'] = $basic_salary;
                    $row['da'] = $da;
                    $row['hra'] = $hra;
                    $row['net'] = $net_salary;
                    $found = true;
                    break;
                }
            }
        }

        // ✅ Add new only if not found
        if (!$found) {
            $_SESSION['records'][] = [
                'id' => $employee_id,
                'bs' => $basic_salary,
                'da' => $da,
                'hra' => $hra,
                'net' => $net_salary
            ];
        }

    } else {
        echo "<p style='color:red;'>Invalid salary</p>";
    }
}

// ✅ Display table
if (!empty($_SESSION['records'])) {

    echo "<h2>All Records</h2>";
    echo "<table>";
    echo "<tr>
            <th>Employee ID</th>
            <th>Basic Salary</th>
            <th>DA</th>
            <th>HRA</th>
            <th>Net Salary</th>
          </tr>";

    foreach ($_SESSION['records'] as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>" . number_format($row['bs'], 2) . "</td>
                <td>" . number_format($row['da'], 2) . "</td>
                <td>" . number_format($row['hra'], 2) . "</td>
                <td>" . number_format($row['net'], 2) . "</td>
              </tr>";
    }

    echo "</table>";
}
?>

</body>
</html>