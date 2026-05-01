<?php
class Student {
    public $name;
    public $marks;

    function setData($n, $m) {
        $this->name = $n;
        $this->marks = $m;
    }

    function display() {
        echo "Name: $this->name | Marks: $this->marks<br>";
    }
}

$s1 = new Student();
$s1->setData("Mehak", 90);
$s1->display();
echo "<br>" . "This code is written and excecuted by MehakBhutani_0231BCA063";
?>