<?php
$file = fopen("test.txt", "r");

if ($file) {
    echo fread($file, filesize("test.txt"));
    fclose($file);
}
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>