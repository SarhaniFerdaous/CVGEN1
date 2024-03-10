<?php
require_once '../controllers/AdminController.php';

$adminController = new AdminController();

if (!$adminController->isAdmin()) {

    header('Location: /cvgen/views/index.php');
    exit;
}

$cvs = $adminController->listCvs();
$users = $adminController->listUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #ff3333;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>CVs</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($cvs as $cv) : ?>
                <tr>
                    <td><?php echo $cv['id']; ?></td>
                    <td><?php echo $cv['full_name']; ?></td>
                    <td><button class="delete-btn" onclick="deleteCV(<?php echo $cv['id']; ?>)">Delete</button></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><button class="delete-btn" onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script>
        function deleteCV(cvId) {


            fetch('delete_cv.php?id=' + cvId, {
                    method: 'DELETE'
                })
                .then(response => {
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred');
                });

        }

        function deleteUser(userId) {

            fetch('delete_user.php?id=' + userId, {
                    method: 'DELETE'
                })
                .then(response => {
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred');
                });

        }
    </script>
</body>

</html>