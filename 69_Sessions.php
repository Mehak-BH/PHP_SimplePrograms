<?php
session_start();

// Create
$_SESSION['user'] = "Mehak";
echo "Session Created: " . $_SESSION['user'] . "<br>";

// Modify
$_SESSION['user'] = "Riya";
echo "Session Modified: " . $_SESSION['user'] . "<br>";

// Destroy
session_destroy();
echo "Session Destroyed";
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>