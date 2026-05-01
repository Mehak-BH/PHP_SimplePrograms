<?php
session_start();

$message = "";

// -------- ADD ITEM TO CART --------
if (isset($_POST['add'])) {

    $product = trim($_POST['product']);

    if ($product == "") {
        $message = "❌ Enter product name!";
    } else {

        // SESSION (store cart)
        $_SESSION['cart'][] = $product;

        // COOKIE (store last product)
        setcookie("last_product", $product, time() + 3600);

        $message = "✅ Product added to cart!";
    }
}

// -------- CLEAR CART --------
if (isset($_POST['clear'])) {
    session_destroy();
    $message = "🗑️ Cart cleared!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session & Cookie System</title>
    <style>
        body { font-family: Arial; margin: 40px; }
    </style>
</head>
<body>

<h2>🛒 Shopping Cart (Session & Cookie)</h2>

<!-- ADD PRODUCT -->
<form method="post">
    Enter Product: 
    <input type="text" name="product">
    <input type="submit" name="add" value="Add to Cart">
</form>

<p><?php echo $message; ?></p>

<hr>

<h3>📦 Cart Items (Session)</h3>

<?php
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $item) {
        echo $item . "<br>";
    }
} else {
    echo "Cart is empty.";
}
?>

<hr>

<h3>🍪 Last Viewed Product (Cookie)</h3>

<?php
if (isset($_COOKIE['last_product'])) {
    echo $_COOKIE['last_product'];
} else {
    echo "No product viewed yet.";
}
?>

<hr>

<!-- CLEAR BUTTON -->
<form method="post">
    <input type="submit" name="clear" value="Clear Cart">
</form>

</body>
</html>