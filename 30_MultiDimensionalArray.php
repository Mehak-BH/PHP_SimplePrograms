<?php
$students = array(
    array("name" => "Mehak", "marks" => 90),
    array("name" => "Riya", "marks" => 85),
    array("name" => "Aman", "marks" => 88)
);

echo "<b>Student Details:</b><br>";
foreach ($students as $s) {
    echo "Name: " . $s["name"] . " | Marks: " . $s["marks"] . "<br>";
}
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>