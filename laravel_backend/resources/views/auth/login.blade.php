<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Shop Pet</title>
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
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 300px;
        }

        .login-container h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.8em;
        }

        .login-container form {
            display: flex;
            flex-direction: column;
        }

        .login-container input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button {
            padding: 10px;
            font-size: 1em;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
