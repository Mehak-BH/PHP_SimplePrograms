<?php
$name = "Mehak";
$dob = new DateTime("2005-10-28");
$now = new DateTime();

$diff = $dob->diff($now);

$seconds = $now->getTimestamp() - $dob->getTimestamp();
$hours = floor($seconds / 3600);
$minutes = floor($seconds / 60);

echo "Hey $name, you are {$diff->y} years {$diff->m} months {$diff->d} days old.<br>";
echo "You have spent $hours hours, $minutes minutes, $seconds seconds on Earth.<br>";
echo "Happy Birthday!";
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>