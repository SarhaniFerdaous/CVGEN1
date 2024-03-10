<!-- views/create_cv.php -->
<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../controllers/CvController.php';

    $controller = new CvController();
    $controller->create();

    // The create method should handle the form submission and then redirect the user.
    // This will prevent any output from being sent to the browser before the headers are modified.
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Cv</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #ffc600; /* Set background color to #FFC600 */
        }

        .container {
            width: 21cm;
            min-height: 29.7cm;
            padding: 1cm;
            margin: 1cm auto;
            border: 1px solid #d3d3d3;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background: #fff;
            border-radius: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        textarea,
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ffc600; /* Set button background color to #FFC600 */
            color: #fff; /* Set button text color to white */
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #ffae42; /* Darken button color on hover */
        }
    </style>
</head>

<body>
<h1 style="text-align: center; color: #fff;">Creating A CV</h1> <!-- Center and style the title -->

    <div class="container">
    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php" style="background-color: #ffc600; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 4px;">< Home</a>
    </div>
        <form action="create_cv.php" enctype="multipart/form-data" method="post">
            <?php
            if (isset($_GET['error'])) {
                echo '<H2 style="color: red;">All Fields Are Required !</H2>';
                echo '<hr>';    
                echo '<br>';
            }
            ?>
            <div class="section">
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name">
            </div>
            <div class="section">
                <label for="picture">Picture:</label>
                <input type="file" name="picture" accept="image/*">
            </div>

            <div class="section">
            <label for="">Template:</label>

                <label for="template1">
                    <input type="radio" id="template1" name="template" value="1">
                    <img src="./assets/template1.png" alt="Template 1" style="height:300px;">
                </label>
                <label for="template2">
                    <input type="radio" id="template2" name="template" value="2">
                    <img src="./assets/template2.png" alt="Template 2" style="height:300px;">
                </label>
                <label for="template3">
                    <input type="radio" id="template3" name="template" value="3">
                    <img src="./assets/template3.png" alt="Template 3" style="height:300px;">
                </label>
            </div>
            <div class="section">
                <label for="skill1">Skill 1:</label>
                <input type="text" name="skill1">
                <label for="skill2">Skill 2:</label>
                <input type="text" name="skill2">
                <label for="skill3">Skill 3:</label>
                <input type="text" name="skill3">
                <label for="skill4">Skill 4:</label>
                <input type="text" name="skill4">
                <label for="skill5">Skill 5:</label>
                <input type="text" name="skill5">
            </div>
            <div class="section">
                <label for="age">Age:</label>
                <input type="number" name="age">
                <label for="birthday">Birthday:</label>
                <input type="date" name="birthday">
            </div>
            <div class="section">
                <label for="about_me">About Me:</label>
                <textarea name="about_me" rows="5"></textarea>
            </div>
            <div class="section">
                <label for="work_experience">Work Experience:</label>
                <textarea name="work_experience" rows="5"></textarea>
            </div>
            <div class="section">
                <label for="education">Education:</label>
                <textarea name="education" rows="5"></textarea>
            </div>
            <div class="section">
                <label for="languages">Languages:</label>
                <input type="text" name="languages">
            </div>
            <div class="section">
                <label for="phoneNumber">Phone Number:</label>
                <input type="text" name="phoneNumber">
            </div>
            <div class="section">
                <label for="email">Email:</label>
                <input type="email" name="email">
            </div>
            <div class="section">
                <label for="website">Website:</label>
                <input type="url" name="website">
            </div>
            <div class="section">
                <label for="facebookLink">Facebook Link:</label>
                <input type="url" name="facebookLink">
            </div>
            <div class="section">
                <label for="linkedinLink">LinkedIn Link:</label>
                <input type="url" name="linkedinLink">
            </div>
            <div class="section">
                <label for="language">CV Language:</label>
                <select name="language">
                    <option value="english">English</option>
                    <option value="french">French</option>
                </select>
            <input type="submit" value="Submit" >
        </form>
    </div>


</body>

</html>