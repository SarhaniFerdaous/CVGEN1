
<?php
require_once '../controllers/AdminController.php';

$adminController = new AdminController();
$isadmin = $adminController->isAdmin();

?>

<!DOCTYPE html>
<html>
<head>
    <title>CVs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            color: #ffc600;
        }
        nav {
            background-color: #ffc600;
            padding: 10px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav .logo {
            margin-left: 20px;
            color: white;
            text-decoration: none;
        }
        nav .nav-links {
            margin-right: 20px;
        }
        nav .nav-links a {
            transition: 0.3s ease;
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        nav .nav-links a:hover{
            font-size: 20px;

        }
        h1 {
            margin-top: 20px;
            margin-left: 20px;
        }
        .create-cv-btn {
            text-align: center;
            margin-top: 20px;
        }
        .create-cv-btn a {
            background-color: #ffc600;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .create-cv-btn a:hover {
            background-color: #3949ab;
        }
        .cv-list {
            margin-left: 20px;
        }
        .cv-list a {
            display: block;
            margin-bottom: 10px;
            color: white;
            text-decoration: none;
            background-color: #ffc600;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .cv-list a:hover {
            background-color: #3949ab;
        }
    </style>
</head>
<body>
    <nav>
        <img class="logo" src="./assets/logo.png" width="200px" alt="Logo">
        <div class="nav-links">
            <!-- admin dashboard on $isadmin -->
            <?php if ($isadmin) : ?>
                <a href="admin.php">Admin Dashboard</a>
            <?php endif; ?>
            
            <a href="logout.php">Logout</a>
        </div>

    </nav>
    <div class="create-cv-btn">
        <a href="create_cv.php">Create CV</a>
    </div>
    <h1>Your CVs</h1>
    <div class="cv-list">
        <?php
        require_once '../controllers/CvController.php';
        $cvs = (new CvController())->index();
        if (!empty($cvs)) {
            // counter
            $i = 0;
            foreach ($cvs as $cv) {
                echo "<a href='preview_cv.php?id={$cv['id']}'>CV $i : Created At {$cv['creation_date']}</a>";
                $i++;
            }
        } else {
            echo "<p>No CVs found.</p>";
        }
        ?>
    </div>
</body>
</html>
`
