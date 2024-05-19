<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    
       $stmt = $conn->prepare("INSERT INTO products (equipment, price) VALUES (?, ?)");
    $stmt->bind_param("ss", $item, $price); 

    if ($stmt->execute() === TRUE) {
        echo "Item added to database successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

   
    $stmt->close();
}


$conn->close();
?>
