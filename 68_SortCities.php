<?php
$cities = ["Delhi", "Mumbai", "Chennai", "Kolkata", "Dubai", "Agra"];

sort($cities);

echo "Sorted Cities:<br>";
foreach ($cities as $c) {
    echo $c . "<br>";
}

echo "<br>Cities starting with D:<br>";
foreach ($cities as $c) {
    if ($c[0] == 'D') {
        echo $c . "<br>";
    }
}
echo "This code is written and excecuted by MehakBhutani_0231BCA063";
?>
