<html>
<body>

<h3>GET Method</h3>
<form method="get">
    Name: <input type="text" name="gname">
    <input type="submit" value="Submit GET">
</form>

<h3>POST Method</h3>
<form method="post">
    Name: <input type="text" name="pname">
    <input type="submit" value="Submit POST">
</form>

<?php
// Handle GET
if (isset($_GET['gname'])) {
    echo "<br><b>Using GET:</b> " . $_GET['gname'] . "<br>";
}

// Handle POST
if (isset($_POST['pname'])) {
    echo "<br><b>Using POST:</b> " . $_POST['pname'] . "<br>";
}
?>

</body>
</html>