<?php
$file = fopen("test.txt", "a"); // append mode
fwrite($file, "\nNew data added");
fclose($file);

echo "Data Written";
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>