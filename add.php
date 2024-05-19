<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop_db";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function insertOrder($item, $quantity, $price, $conn) {
    $item = sanitize($item);
    $quantity = intval($quantity);
    $price = intval($price);
    $stmt = $conn->prepare("INSERT INTO products (item, quantity, price,) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $item, $quantity, $price,);
    $stmt->execute();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['item'] as $key => $item) {
        $quantity = $_POST['quantity'][$key];
        $price = $_POST['price'][$key];
        if ($quantity > 0) {
            insertOrder($item, $quantity, $price, $conn);
        }
    }
}

header("Location: index1.php");
exit();
?>
