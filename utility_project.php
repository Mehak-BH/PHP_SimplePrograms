<?php

class Utils {

    // Sanitize input
    public static function sanitize($data) {
        return htmlspecialchars(trim($data));
    }

    // Convert string to integer array
    public static function stringToArray($str) {
        $arr = explode(",", $str);
        return array_map('intval', $arr);
    }

    // Sum of array
    public static function sumArray($arr) {
        return array_sum($arr);
    }

    // Maximum value
    public static function maxValue($arr) {
        return max($arr);
    }

    // Minimum value
    public static function minValue($arr) {
        return min($arr);
    }

    // Average
    public static function average($arr) {
        return count($arr) ? array_sum($arr) / count($arr) : 0;
    }

    // Sort array ascending
    public static function sortAsc($arr) {
        sort($arr);
        return $arr;
    }

    // Sort array descending
    public static function sortDesc($arr) {
        rsort($arr);
        return $arr;
    }

    // Reverse array
    public static function reverseArray($arr) {
        return array_reverse($arr);
    }

    // Remove duplicates
    public static function uniqueArray($arr) {
        return array_unique($arr);
    }

    // Count elements
    public static function countElements($arr) {
        return count($arr);
    }

    // Config (associative array)
    public static function config() {
        return [
            "host" => "localhost",
            "user" => "root",
            "db" => "lab"
        ];
    }
}

// ---------------- MAIN LOGIC ----------------

$message = "";
$result = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $input = Utils::sanitize($_POST['numbers']);

    $arr = Utils::stringToArray($input);

    if (empty($arr)) {
        $message = "❌ Invalid input!";
    } else {

        $result['sum'] = Utils::sumArray($arr);
        $result['max'] = Utils::maxValue($arr);
        $result['min'] = Utils::minValue($arr);
        $result['avg'] = Utils::average($arr);
        $result['count'] = Utils::countElements($arr);
        $result['asc'] = implode(", ", Utils::sortAsc($arr));
        $result['desc'] = implode(", ", Utils::sortDesc($arr));
        $result['reverse'] = implode(", ", Utils::reverseArray($arr));
        $result['unique'] = implode(", ", Utils::uniqueArray($arr));

        $message = "✅ Data processed successfully!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Advanced Utility Library</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        input { margin: 5px; }
    </style>
</head>
<body>

<h2>📊 Advanced Utility Library System</h2>

<form method="post">
    Enter numbers (comma separated):  
    <input type="text" name="numbers" placeholder="10,20,30,20" required>
    <br><br>
    <input type="submit" value="Process">
</form>

<p><?php echo $message; ?></p>

<?php if(!empty($result)) { ?>
    <h3>Results:</h3>
    Sum: <?php echo $result['sum']; ?> <br>
    Max: <?php echo $result['max']; ?> <br>
    Min: <?php echo $result['min']; ?> <br>
    Average: <?php echo $result['avg']; ?> <br>
    Count: <?php echo $result['count']; ?> <br>
    Sorted (ASC): <?php echo $result['asc']; ?> <br>
    Sorted (DESC): <?php echo $result['desc']; ?> <br>
    Reversed: <?php echo $result['reverse']; ?> <br>
    Unique: <?php echo $result['unique']; ?> <br>
<?php } ?>

</body>
</html>