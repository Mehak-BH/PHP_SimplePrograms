<?php
$x = 10;

function localScope() {
    $x = 20;
    echo "Local x = $x<br>";
}

function globalScope() {
    global $x;
    echo "Global x = $x<br>";
}

localScope();
globalScope();
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>