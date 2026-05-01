<?php
$marks = array("Mehak"=>90, "Riya"=>85, "Aman"=>88);

krsort($marks);

foreach ($marks as $k=>$v) {
    echo "$k : $v<br>";
}
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>