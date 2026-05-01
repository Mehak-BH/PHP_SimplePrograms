<?php
// Set cookie
setcookie("user", "Mehak", time()+3600);

if (isset($_COOKIE['user'])) {
    echo "Cookie Value: " . $_COOKIE['user'] . "<br>";
}

// Destroy cookie
setcookie("user", "", time()-3600);
echo "Cookie Deleted";
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>