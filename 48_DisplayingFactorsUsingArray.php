<?php
$num = 4200;
$factors = array();

for ($i = 1; $i <= $num; $i++) {
    if ($num % $i == 0) {
        $factors[] = $i;
    }
}

echo "First 10 Factors:<br>";
for ($i = 0; $i < 10; $i++) {
    echo $factors[$i] . " ";
}
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>