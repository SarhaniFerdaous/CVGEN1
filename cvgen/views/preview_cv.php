<?php
// if the request is post we get the data from the request 
// require the controller
require_once '../controllers/CvController.php';
// create a new instance of the controller
$controller = new CvController();
// call the preview method that will get the cv
$cv = $controller->preview();




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://localhost/cvgen/views/">
</head>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div>
        <div style="text-align: center; margin-top: 20px;">
            <a href="index.php" style="background-color: #ffc600; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 4px;">
                < Home</a>
        </div>
        <div style="text-align: center; margin-top: 30px;">
            <a href="downloadcv.php?id=<?php echo $_GET['id'] ?>" style="background-color: #ffc600; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 4px;">Download CV as PDF</a>
        </div>
    </div>
    <?php if ($cv['template'] === '1') : ?>
        <link rel="stylesheet" href="http://localhost/cvgen/views/assets/template1.css">

        <div class="resume">
            <div class="resume_left">
                <div class="resume_profile">
                    <img src="
                http://localhost/cvgen/uploads/<?php echo $cv['picture'] ?>
                
                " alt="profile_pic">
                </div>
                <div class="resume_content">
                    <?php  ?>
                    <div class="resume_item resume_info">
                        <div class="title">
                            <p class="bold"><?php echo $cv['full_name'] ?></p>

                        </div>
                        <ul>

                            <li>
                                <div class="icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="data">
                                    <?php echo $cv['phoneNumber'] ?>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="data">
                                    <?php echo $cv['full_name'] ?>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fab fa-weebly"></i>
                                </div>
                                <div class="data">
                                    <p><?php echo $cv['website'] ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="resume_item resume_skills">
                        <div class="title">
                            <p class="bold">
                                <?php if ($cv['language'] === 'english') {
                                    echo 'skill\'s';
                                } else {
                                    echo 'Compétences';
                                } ?>
                            </p>
                        </div>
                        <ul>
                            <li>
                                <div class="skill_name">
                                    <?php echo $cv['skill1'] ?>
                                </div>

                            </li>
                            <li>
                                <div class="skill_name">
                                    <?php echo $cv['skill2'] ?>
                                </div>

                            </li>
                            <li>
                                <div class="skill_name">
                                    <?php echo $cv['skill3'] ?>
                                </div>

                            </li>
                            <li>
                                <div class="skill_name">
                                    <?php echo $cv['skill4'] ?>
                                </div>

                            </li>
                            <li>
                                <div class="skill_name">
                                    <?php echo $cv['skill5'] ?>
                                </div>


                            </li>
                        </ul>
                    </div>
                    <div class="resume_item resume_social">
                        <div class="title">
                            <p class="bold">
                                <?php if ($cv['language'] === 'english') {
                                    echo 'Social';
                                } else {
                                    echo 'Social';
                                } ?>
                            </p>
                        </div>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fab fa-facebook-square"></i>
                                </div>
                                <div class="data">
                                    <p class="semi-bold">Facebook</p>
                                    <p><?php echo $cv['facebookLink'] ?></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fab fa-linkedin"></i>
                                </div>
                                <div class="data">
                                    <p class="semi-bold">Linkedin</p>
                                    <p><?php echo $cv['linkedinLink'] ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="resume_right">
                <div class="resume_item resume_about">
                    <div class="title">
                        <p class="bold">
                            <?php if ($cv['language'] === 'english') {
                                echo 'About Me';
                            } else {
                                echo 'À propos de moi';
                            } ?>
                        </p>
                    </div>
                    <p><?php echo $cv['about_me'] ?></p>
                </div>
                <div class="resume_item resume_work">
                    <div class="title">
                        <p class="bold">
                            <?php if ($cv['language'] === 'english') {
                                echo 'Work Experience';
                            } else {
                                echo 'Expérience de travail';
                            } ?>
                        </p>
                    </div>
                    <p>
                        <?php echo $cv['work_experience'] ?>
                    </p>
                </div>
                <div class="resume_item resume_education">
                    <div class="title">
                        <p class="bold">
                            <?php if ($cv['language'] === 'english') {
                                echo 'Education';
                            } else {
                                echo 'Éducation';
                            } ?>
                        </p>
                    </div>
                    <?php echo $cv['education'] ?>
                </div>
                <div class="resume_item resume_languages">
                    <div class="title">
                        <p class="bold">
                            <?php if ($cv['language'] === 'english') {
                                echo 'Languages';
                            } else {
                                echo 'Langues';
                            } ?>
                        </p>
                    </div>
                    <?php echo $cv['languages'] ?>
                </div>

            </div>
        </div>


    <?php elseif ($cv['template'] === '3') : ?>
        <link rel="stylesheet" href="http://localhost/cvgen/views/assets/template2.css">


        <div class="resume">
            <div class="resume_right" ">
                <div class=" resume_item resume_about">
                <div class="title">
                    <p class="bold">
                        <?php if ($cv['language'] === 'english') {
                            echo 'About Me';
                        } else {
                            echo 'À propos de moi';
                        } ?>
                    </p>
                </div>
                <p><?php echo $cv['about_me'] ?></p>
            </div>
            <div class="resume_item resume_work">
                <div class="title">
                    <p class="bold">
                        <?php if ($cv['language'] === 'english') {
                            echo 'Work Experience';
                        } else {
                            echo 'Expérience de travail';
                        } ?>
                    </p>
                </div>
                <p><?php echo $cv['work_experience'] ?></p>
            </div>
            <div class="resume_item resume_education">
                <div class="title">
                    <p class="bold">
                        <?php if ($cv['language'] === 'english') {
                            echo 'Education';
                        } else {
                            echo 'Éducation';
                        } ?>
                    </p>
                </div>
                <?php echo $cv['education'] ?>
            </div>
            <div class="resume_item resume_languages">
                <div class="title">
                    <p class="bold">
                        <?php if ($cv['language'] === 'english') {
                            echo 'Languages';
                        } else {
                            echo 'Langues';
                        } ?>
                    </p>
                </div>
                <?php echo $cv['languages'] ?>
            </div>

        </div>
        <div class="resume_left" ">
                <div class=" resume_profile">
            <img src="http://localhost/cvgen/uploads/<?php echo $cv['picture'] ?>" alt="profile_pic">
        </div>
        <div class="resume_content">
            <div class="resume_item resume_info">
                <div class="title">
                    <p class="bold"><?php echo $cv['full_name'] ?></p>
                </div>
                <ul>
                    <li>
                        <div class="icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="data"><?php echo $cv['phoneNumber'] ?></div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="data"><?php echo $cv['full_name'] ?></div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fab fa-weebly"></i>
                        </div>
                        <div class="data">
                            <p><?php echo $cv['website'] ?></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="resume_item resume_skills">
                <div class="title">
                    <p class="bold">
                        <?php if ($cv['language'] === 'english') {
                            echo 'skill\'s';
                        } else {
                            echo 'Compétences';
                        } ?>
                    </p>
                </div>
                <ul>
                    <li><?php echo $cv['skill1'] ?></li>
                    <li><?php echo $cv['skill2'] ?></li>
                    <li><?php echo $cv['skill3'] ?></li>
                    <li><?php echo $cv['skill4'] ?></li>
                    <li><?php echo $cv['skill5'] ?></li>
                </ul>
            </div>
            <div class="resume_item resume_social">
                <div class="title">
                    <p class="bold">
                        <?php if ($cv['language'] === 'english') {
                            echo 'Social';
                        } else {
                            echo 'Social';
                        } ?>
                    </p>
                </div>
                <ul>
                    <li>
                        <div class="icon">
                            <i class="fab fa-facebook-square"></i>
                        </div>
                        <div class="data">
                            <p class="semi-bold">Facebook</p>
                            <p><?php echo $cv['facebookLink'] ?></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <i class="fab fa-linkedin"></i>
                        </div>
                        <div class="data">
                            <p class="semi-bold">Linkedin</p>
                            <p><?php echo $cv['linkedinLink'] ?></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </div>
        </div>

    <!-- template 3  -->
    <?php elseif ($cv['template'] === '2') : ?>
        
        <link rel="stylesheet" href="http://localhost/cvgen/views/assets/template3.css">


<div class="resume">
    <div class="resume_right" ">
        <div class=" resume_item resume_about">
        <div class="title">
            <p class="bold">
                <?php if ($cv['language'] === 'english') {
                    echo 'About Me';
                } else {
                    echo 'À propos de moi';
                } ?>
            </p>
        </div>
        <p><?php echo $cv['about_me'] ?></p>
    </div>
    <div class="resume_item resume_work">
        <div class="title">
            <p class="bold">
                <?php if ($cv['language'] === 'english') {
                    echo 'Work Experience';
                } else {
                    echo 'Expérience de travail';
                } ?>
            </p>
        </div>
        <p><?php echo $cv['work_experience'] ?></p>
    </div>
    <div class="resume_item resume_education">
        <div class="title">
            <p class="bold">
                <?php if ($cv['language'] === 'english') {
                    echo 'Education';
                } else {
                    echo 'Éducation';
                } ?>
            </p>
        </div>
        <?php echo $cv['education'] ?>
    </div>
    <div class="resume_item resume_languages">
        <div class="title">
            <p class="bold">
                <?php if ($cv['language'] === 'english') {
                    echo 'Languages';
                } else {
                    echo 'Langues';
                } ?>
            </p>
        </div>
        <?php echo $cv['languages'] ?>
    </div>

</div>
<div class="resume_left" ">
        <div class=" resume_profile">
    <img src="http://localhost/cvgen/uploads/<?php echo $cv['picture'] ?>" alt="profile_pic">
</div>
<div class="resume_content">
    <div class="resume_item resume_info">
        <div class="title">
            <p class="bold"><?php echo $cv['full_name'] ?></p>
        </div>
        <ul>
            <li>
                <div class="icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <div class="data"><?php echo $cv['phoneNumber'] ?></div>
            </li>
            <li>
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="data"><?php echo $cv['full_name'] ?></div>
            </li>
            <li>
                <div class="icon">
                    <i class="fab fa-weebly"></i>
                </div>
                <div class="data">
                    <p><?php echo $cv['website'] ?></p>
                </div>
            </li>
        </ul>
    </div>
    <div class="resume_item resume_skills">
        <div class="title">
            <p class="bold">
                <?php if ($cv['language'] === 'english') {
                    echo 'skill\'s';
                } else {
                    echo 'Compétences';
                } ?>
            </p>
        </div>
        <ul>
            <li><?php echo $cv['skill1'] ?></li>
            <li><?php echo $cv['skill2'] ?></li>
            <li><?php echo $cv['skill3'] ?></li>
            <li><?php echo $cv['skill4'] ?></li>
            <li><?php echo $cv['skill5'] ?></li>
        </ul>
    </div>
    <div class="resume_item resume_social">
        <div class="title">
            <p class="bold">
                <?php if ($cv['language'] === 'english') {
                    echo 'Social';
                } else {
                    echo 'Social';
                } ?>
            </p>
        </div>
        <ul>
            <li>
                <div class="icon">
                    <i class="fab fa-facebook-square"></i>
                </div>
                <div class="data">
                    <p class="semi-bold">Facebook</p>
                    <p><?php echo $cv['facebookLink'] ?></p>
                </div>
            </li>
            <li>
                <div class="icon">
                    <i class="fab fa-linkedin"></i>
                </div>
                <div class="data">
                    <p class="semi-bold">Linkedin</p>
                    <p><?php echo $cv['linkedinLink'] ?></p>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
<?php endif; ?>


</body>

</html>