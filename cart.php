<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <style>
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #fff;
            border-radius: 5px;
        }
        .item img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 10px;
            float: left;
        }
        .item-info {
            overflow: hidden;
        }
        .item-info h3 {
            margin-top: 0;
        }
        .btn {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            float: right;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #555;
        }
        .buy-label {
            font-weight: bold;
            color: #007bff; 
            margin-left: 10px;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
    </style>


</head>


</head>

<body>
    <header>
        <h1>Cart</h1>
        <a href="index1.php" class="back-icon"><i class="fas fa-arrow-left"></i> Back to Store</a>
    </header>
    
    <div class="container">
       
        <form id="order-form" action="orders.php" method="POST">
            <div id="cart-items">
               <?php            
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "shop_db";

                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                function displayTableData($conn, $table_name, $columns) {
                    $sql = "SELECT " . implode(", ", $columns) . " FROM " . $table_name;
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<h2>$table_name Data</h2>";
                        echo "<table>";
                        echo "<tr>";
                        foreach ($columns as $column) {
                            echo "<th>" . ucfirst($column) . "</th>";
                        }
                        echo "<th>Buy</th>"; 
                        echo "</tr>";
                       
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($columns as $column) {
                                echo "<td>" . $row[$column] . "</td>";
                            }
                            echo "<td><input type='checkbox' name='order_bought[]' value='" . htmlentities(json_encode($row)) . "'></td>"; 
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h2>$table_name Data</h2>";
                        echo "<p>No data found in $table_name</p>";
                    }
                }

                displayTableData($conn, "products", array("item", "quantity", "price"));

                $conn->close();
                ?>

                
                <button type="submit" class="btn">Buy Selected Items</button>
            </div>
        </form>
    </div>

    
</body>
</html>
