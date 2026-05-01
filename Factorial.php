<?php
if (isset($_POST['num'])) {

    $num = $_POST['num'];

    if ($num < 0) {
        echo "Factorial not defined for negative numbers";
        exit;
    }

    $fact = 1;

    for ($i = 1; $i <= $num; $i++) {
        $fact = $fact * $i;
    }

    echo "<h2>Result</h2>";
    echo "Factorial of $num is $fact";

} else {
?>

<form method="post">
    Enter a number:
    <input type="number" name="num" required>
    <input type="submit" value="Calculate">
</form>

<?php
}
?>