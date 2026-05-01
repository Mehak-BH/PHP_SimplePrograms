<?php
$str1 = "Hello";
$str2 = 'World';
echo "String 1: $str1 <br>";
echo "String 2: $str2 <br><br>";
$full = $str1 . " " . $str2;
echo "Concatenated String: " . $full . "<br><br>";
$name = "Mehak";
echo "Using double quotes: Hello $name <br>"; // variable is interpreted
echo 'Using single quotes: Hello $name <br>'; // variable not interpreted
echo "<br>";
echo "Using escape characters:<br>";
echo "He said \"Hello\"<br>";
echo "This is a new line\n";  // works in CLI, not browser
echo "<br><br>";
$text = "This is 
a multiline 
string.";
echo "Multiline String:<br>";
echo $text;
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>