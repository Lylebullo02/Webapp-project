<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop_db";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT item, quantity, price FROM orders";
$result = $conn->query($sql);
$receipt = "<h2>Receipt</h2>";

if ($result->num_rows > 0) {
    $receipt .= "<table border='1'>
                    <tr>
                        <th>item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Cost</th>                     
                    </tr>";
    while($row = $result->fetch_assoc()) {
        $total_cost = $row["price"] * $row["quantity"]; 
        $receipt .= "<tr>
                        <td>".$row["item"]."</td>
                        <td>".$row["quantity"]."</td>
                        <td>".$row["price"]."</td>
                        <td>".$total_cost."</td>
                    </tr>";
    }
    $receipt .= "</table>";
} else {
    $receipt .= "0 results";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        header {
            background-color: #333; 
            color: white;
            text-align: center;
            padding: 20px;
        }

        h1, p {
            text-align: center;
            margin: 10px 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        nav {
            background-color: #333; 
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dear valued guest,</h1>
        <p>Payment is accepted upon CASH ON DELIVERY.</p>
    </header>

    <?php echo $receipt; ?>

    <nav>
        <ul>
            <li><a href="index1.php">back</a></li>
           
        </ul>
    </nav>
</body>
</html>
