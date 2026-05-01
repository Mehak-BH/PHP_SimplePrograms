<?php
$india = new DateTime("now", new DateTimeZone("Asia/Kolkata"));
$berlin = new DateTime("now", new DateTimeZone("Europe/Berlin"));

echo "India Time: " . $india->format("Y-m-d H:i:s") . "<br>";
echo "Berlin Time: " . $berlin->format("Y-m-d H:i:s") . "<br>";

// Get timezone offsets in seconds
$india_offset = $india->getOffset();
$berlin_offset = $berlin->getOffset();

// Difference in seconds
$diff_seconds = $india_offset - $berlin_offset;

// Convert to hours and minutes
$hours = floor(abs($diff_seconds) / 3600);
$minutes = (abs($diff_seconds) % 3600) / 60;

echo "Time Difference: $hours hours $minutes minutes";
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063"; 
?>