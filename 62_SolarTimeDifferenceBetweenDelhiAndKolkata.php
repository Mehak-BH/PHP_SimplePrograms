<?php
// Longitude values
$delhi_long = 77.1025;
$kolkata_long = 88.3639;

// Time difference (1 degree = 4 minutes)
$diff = abs($kolkata_long - $delhi_long) * 4;

$hours = floor($diff / 60);
$minutes = $diff % 60;

echo "Solar Time Difference: $hours hours $minutes minutes";
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063"; 
?>