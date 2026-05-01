<?php
class Greeting {
    public $str = "Hello world!";

    function showGreeting() {
        return $this->str;
    }
}

$message = new Greeting;
var_dump($message);
echo "<br>";

echo "This code is written and executed by MehakBhutani_0231BCA063";
?>