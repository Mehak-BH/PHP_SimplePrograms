<?php
$conn = new mysqli("localhost", "root", "", "test");

$sql = "CREATE TABLE demo (
    id INT,
    name VARCHAR(50),
    salary FLOAT,
    is_active BOOLEAN,
    created_at DATE
)";

if ($conn->query($sql)) {
    echo "Table Created";
}
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>