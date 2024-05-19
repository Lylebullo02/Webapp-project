<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_bought'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shop_db";
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    foreach($_POST['order_bought'] as $selected_order_json) {
        $selected_order = json_decode($selected_order_json, true);
        $item = $selected_order['item'];
        $quantity = $selected_order['quantity'];
        $price = $selected_order['price'];

        $sql = "INSERT INTO orders (item, quantity, price) VALUES ('$item', $quantity, $price)";
        if ($conn->query($sql) === FALSE) {
            echo "Error inserting record: " . $conn->error;
        } else {
            echo "Order received: $item - Quantity: $quantity - Price: $price<br>";
        }

        $sql = "DELETE FROM products WHERE item = '$item' AND quantity = $quantity AND price = $price";
        if ($conn->query($sql) === FALSE) {
            echo "Error deleting record: " . $conn->error;
        } else {
            echo "Order removed from products: $item - Quantity: $quantity - Price: $price<br>";
        }
    }

    $conn->close();
} else {
    echo "No orders selected.";
}

header("Location: cart.php");
exit();
?>
