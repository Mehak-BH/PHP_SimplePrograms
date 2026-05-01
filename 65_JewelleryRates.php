<?php
$rates = [
    "Gold" => [5000, 5100, 4950, 5050, 5200],
    "Silver" => [60, 62, 58, 61, 63],
    "Diamond" => [30000, 31000, 30500, 32000, 31500]
];

foreach ($rates as $metal => $values) {
    echo "<b>$metal:</b><br>";
    echo "Rates: " . implode(", ", $values) . "<br>";

    echo "Max: " . max($values) . "<br>";
    echo "Min: " . min($values) . "<br>";
    echo "Avg: " . (array_sum($values)/count($values)) . "<br><br>";
}
echo "This code is written and excecuted by MehakBhutani_0231BCA063";
?>