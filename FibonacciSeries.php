<?php
if (isset($_POST['terms'])) {

    $terms = $_POST['terms'];

    if ($terms <= 0) {
        echo "Enter a positive number";
        exit;
    }

    $a = 0;
    $b = 1;

    echo "<h2>Fibonacci Series</h2>";

    for ($i = 1; $i <= $terms; $i++) {
        echo $a . " ";

        $next = $a + $b;
        $a = $b;
        $b = $next;
    }

} else {
?>

<form method="post">
    Enter number of terms:
    <input type="number" name="terms" required>
    <input type="submit" value="Generate">
</form>

<?php
}
?>