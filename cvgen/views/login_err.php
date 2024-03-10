<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Set background color */
            color: #ffc600;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        form {
            background-color: #fff;
            max-width: 300px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            margin-right: 10px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"],
        .register-btn {
            margin-top: 10px;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #ffc600;
            color: white;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="text"],
        input[type="password"] {
            width: 200px;
        }
        input[type="submit"]:hover,
        .register-btn:hover {
            background-color: #3949ab;
        }
        .error-message{
            color: red;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <p class="error-message">Login credentials not valid, please double check your username and password</p>

        <input type="submit" value="Login">
        <br>
        <p>Don't have an account? <a href="register.php" class="register-btn">Register</a></p>
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../core/Controller.php';
    require_once '../controllers/UserController.php';

    $controller = new UserController();
    $controller->login();
}
?>

