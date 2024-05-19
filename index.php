<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takraw Equipment Store</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('Picsart_24-05-01_20-21-49-447.jpg');
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            font-family: Arial, sans-serif;
        }

        header {
            text-align: center;
            padding: 10px;
        }

        nav {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        nav li {
            display: inline-block;
            margin-right: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        section {
            padding: 20px;
            font-size: 18px;
            text-align: center;
        }

        #menu img {
            width: 100%;
            height: auto;
            border-radius: 20px;
        }

        footer {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            color: white;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px; 
        }

        .login-option {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: transform 0.2s;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .login-option:hover {
            transform: translateY(-5px);
        }

        .login-option img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .login-option p {
            margin: 0;
            font-size: 18px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
        }
    

        .login-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-option {
            width: 90px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: transform 0.2s;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .login-option:hover {
            transform: translateY(-5px);
        }

        .login-option img {
            width: 90px;
            height: 70px;
            margin-right: 15px;
        }

        .login-option p {
            margin: 0;
            font-size: 18px;
        }
    </style>
</head>
<body>
<nav>
<header>
    <h1>Welcome to TAKRAW Equipment Store(Surigao city)</h1>
    </header>
    </nav>

    <div class="login-container">
        <div class="login-option">
           <a href="register.php">
                <img src="images (5).png" alt="register">
                <p>REGISTER</p>
            </a>
        </div>
        <div class="login-option">
            <a href="log_in.php">
                <img src="images (5).png" alt="login">
                <p>Login account</p>
            </a>
        </div>
        </body>
</html>

