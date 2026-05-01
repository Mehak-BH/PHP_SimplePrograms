<?php
function factorial($n) {
    if ($n == 0) return 1;
    return $n * factorial($n - 1);
}

echo "Factorial of 5 = " . factorial(5);
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>