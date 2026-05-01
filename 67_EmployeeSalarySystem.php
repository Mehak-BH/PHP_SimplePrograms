<html>
<body>
<form method="post">
Name: <input type="text" name="name"><br>
Basic Salary: <input type="number" name="basic"><br>
<input type="submit">
</form>

<?php
if ($_POST) {
    $name = $_POST['name'];
    $basic = $_POST['basic'];

    $hra = 0.20 * $basic;
    $da = 0.10 * $basic;
    $gross = $basic + $hra + $da;
    $tax = 0.10 * $gross;
    $net = $gross - $tax;

    $emp = [
        "Name" => $name,
        "Basic" => $basic,
        "HRA" => $hra,
        "DA" => $da,
        "Gross" => $gross,
        "Tax" => $tax,
        "Net" => $net
    ];

    echo "<table border=1>";
    foreach ($emp as $k => $v) {
        echo "<tr><td>$k</td><td>$v</td></tr>";
    }
    echo "</table>";
}
?>
</body>
</html>