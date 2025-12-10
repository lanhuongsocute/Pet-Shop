<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Shop Pet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-image: url('https://i.pinimg.com/736x/d1/d1/81/d1d18156545ed373db49a08fa9896488.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff;
            text-align: center;
        }

        .welcome-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        .welcome-container h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .welcome-container p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .welcome-container a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.2em;
            color: #fff;
            background-color: #007BFF;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .welcome-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <h1>Welcome to Shop Pet</h1>
        <p>Quản lý thú cưng, sản phẩm và đơn hàng một cách dễ dàng.</p>
        <a href="{{ route('login') }}">Đăng nhập dành cho Admin</a>
    </div>
</body>

</html>
