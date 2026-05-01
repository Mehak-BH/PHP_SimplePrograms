<?php
session_start();

$_SESSION['name'] = "Mehak";
$_SESSION['course'] = "BCA";

echo "Name: " . $_SESSION['name'] . "<br>";
echo "Course: " . $_SESSION['course'];
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>