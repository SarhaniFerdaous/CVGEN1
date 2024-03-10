<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Set background color */
            display: flex;
            color: #ffc600;

            justify-content: center;
            align-items: center;
            height: 100vh; /* Set height of the body to 100% of the viewport height */
            margin: 0; /* Remove default margin */
        }

        form {
            background-color: #fff;
            max-width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ffc600; /* Set button background color */
            color: #fff; /* Set button text color */
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #ffae42; /* Darken button color on hover */
        }
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
    </style>
</head>
<body>
    <form action="register.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Register">
        <p>Aready have an account? <a href="login.php" class="register-btn">Login</a></p>

    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../controllers/UserController.php';

    $controller = new UserController();
    $controller->register();
}
?>
