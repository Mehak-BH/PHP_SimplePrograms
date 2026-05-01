<?php
$dob = new DateTime("2005-10-28"); // change your DOB
$now = new DateTime();

$diff = $dob->diff($now);

$total_seconds = $now->getTimestamp() - $dob->getTimestamp();

$hours = floor($total_seconds / 3600);
$minutes = floor($total_seconds / 60);
$seconds = $total_seconds;

echo "Age:<br>";
echo "Hours: $hours <br>";
echo "Minutes: $minutes <br>";
echo "Seconds: $seconds <br>";
echo "This code is written and excecuted by MehakBhutani_0231BCA063"; 
?>