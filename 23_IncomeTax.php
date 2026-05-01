<?php
$income = 1200000;

if ($income < 500000) {
    $tax = 0;
} elseif ($income < 1000000) {
    $tax = $income * 0.10;
} elseif ($income < 1500000) {
    $tax = $income * 0.15;
} elseif ($income < 2000000) {
    $tax = $income * 0.20;
} else {
    $tax = $income * 0.25;
}

echo "Tax = " . $tax;
echo "<br>";
echo "This code is written and excecuted by MehakBhutani_0231BCA063";
?>