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
   
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO `log in` (`email`, `password`) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute() === TRUE) {
        echo "Registration successful..";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepak Takraw Equipment Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-image: url('IMG_20230825_231716~2.jpg'); 
            background-size: cover;
            background-position: center;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        
        header h1 {
            margin: 0;
        }
        
        .shop-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #fff;
            font-size: 1.5rem;
            text-decoration: none;
        }
        
        .receipt-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #fff;
            font-size: 1.5rem;
            text-decoration: none;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
            grid-gap: 20px;
        }

        .menu-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
        }
        
        .menu-item:hover {
            transform: translateY(-5px);
        }
        
        .menu-item img {
            max-width: 100px; 
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        
        .menu-item h4 {
            margin-top: 0;
            font-size: 1.2rem; 
        }
        
        .menu-item p {
            margin-bottom: 15px;
            font-size: 1rem; 
        }
        
        .menu-item input[type="number"] {
            width: 60px;
            padding: 5px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .menu-item input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .menu-item input[type="submit"]:hover {
            background-color: #555;
        }
        .logout-link {
        text-decoration: none;
        color: #333; 
        font-weight: bold;
        padding: 5px 10px;
        border: 2px solid #333; 
        border-radius: 5px;
        background-color: #fff; 
        transition: all 0.3s ease; 
        
    }

    
    .logout-link:hover {
        background-color: #333;
        color: #fff;
        
    }
    </style>

<script>
        function showConfirmation() {
            alert("Your item has been added to the cart");
        }
    </script>
</head>

<body>
<header>
    <h1>Sepak Takraw Equipment Store</h1>
    <a href="#" class="shop-icon" onclick="viewCart()"><i class="fas fa-shopping-cart"></i></a> 
    <a href="receipt.php" class="receipt-link"><i class="fas fa-receipt"></i> Receipt</a> 
</header>
    
<form action="add.php" method="post" onsubmit="showConfirmation()">
    <div class="container">
        <div class="menu-category">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "shop_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM `items`"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="menu-item">
                        <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="<?php echo htmlspecialchars($row['item']); ?>">
                        <div class="menu-item-info">
                            <h4><?php echo htmlspecialchars($row['item']); ?></h4>
                            <p>Description: <?php echo htmlspecialchars($row['descriptions']); ?></p>
                            <p>Price: ₱<?php echo htmlspecialchars($row['price']); ?></p>
                            <p>item_unit: <?php echo htmlspecialchars($row['item_unit']); ?></p>
                            <input type="hidden" name="item[]" value="<?php echo htmlspecialchars($row['item']); ?>">
                            <input type="hidden" name="price[]" value="<?php echo htmlspecialchars($row['price']); ?>">
                            <input type="number" name="quantity[]" placeholder="Quantity">
                            <br>
                            <input type="submit" value="Add to Cart">
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </div>
</form>

    
</div>
                 
<script>
    function viewCart() {
        window.location.href = 'cart.php';
    }
</script>
<a href="index.php" class="logout-link">Log out</a>
</body>
</html>
