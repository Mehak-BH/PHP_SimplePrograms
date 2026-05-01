<?php
if (isset($_POST['name']) && isset($_POST['basic'])) {

    $name = $_POST['name'];
    $basic = $_POST['basic'];

    // Validation
    if ($basic <= 0) {
        echo "Basic salary must be greater than 0";
        exit;
    }

    // Calculations
    $hra = 0.20 * $basic;
    $da = 0.10 * $basic;
    $gross = $basic + $hra + $da;
    $tax = 0.10 * $gross;
    $net = $gross - $tax;

    // Associative Array
    $employee = array(
        "Employee Name" => $name,
        "Basic Salary" => $basic,
        "HRA (20%)" => $hra,
        "DA (10%)" => $da,
        "Gross Salary" => $gross,
        "Tax (10%)" => $tax,
        "Net Salary" => $net
    );

    // Display Result
    echo "<h2>Salary Breakdown</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";

    foreach ($employee as $key => $value) {
        echo "<tr>";
        echo "<th>$key</th>";
        echo "<td>$value</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
?>

<!DOCTYPE html>
<html>
<head>
    <title>Salary Calculator</title>
</head>
<body>

<h2>Enter Employee Details</h2>

<form method="post">
    Employee Name: <input type="text" name="name" required><br><br>
    Basic Salary: <input type="number" name="basic" required><br><br>
    <input type="submit" value="Calculate Salary">
</form>

</body>
</html>

<?php
}
?>