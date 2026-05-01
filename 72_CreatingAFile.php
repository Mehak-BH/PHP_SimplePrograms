<?php
$file = fopen("test.txt", "w");
fwrite($file, "File created successfully!");
fclose($file);

echo "File Created";
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>
