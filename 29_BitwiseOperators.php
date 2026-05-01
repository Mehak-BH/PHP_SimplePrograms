<?php
$x = 5;  // 101 in binary
$y = 3;  // 011 in binary

echo "x = $x, y = $y <br><br>";

echo "Bitwise AND (&): " . ($x & $y) . "<br>";  
// 101 & 011 = 001 → 1

echo "Bitwise OR (|): " . ($x | $y) . "<br>";  
// 101 | 011 = 111 → 7

echo "Bitwise XOR (^): " . ($x ^ $y) . "<br>"; 
// 101 ^ 011 = 110 → 6

echo "Bitwise NOT (~x): " . (~$x) . "<br>";    
// ~5 = -6 (2's complement)

echo "Left Shift (x << 1): " . ($x << 1) . "<br>";  
// 5 << 1 = 10

echo "Right Shift (x >> 1): " . ($x >> 1) . "<br>"; 
// 5 >> 1 = 2
echo "<br>";
echo "This code is written and excecuted by MehakBhutani_0231BCA063";
?>