<?php
require_once '../core/Controller.php';
class CvController extends Controller
{
    // CvController.php
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            // Redirect to login page if the user is not logged in
            header('Location: login.php');
            exit;
        }

        // Get the CVs of the current user
        $cvModel = $this->model('Cv');
        $cvs = $cvModel->getCvs($_SESSION['user_id']);

        // Return the CVs
        return $cvs;
    }
    public function update()
    {
        // Get the new fields from the $_POST array
        $id = $_POST['id'];
        $details = $_POST['details'];
        $template = $_POST['template'];
        $skill1 = $_POST['skill1'];
        $skill2 = $_POST['skill2'];
        $skill3 = $_POST['skill3'];
        $skill4 = $_POST['skill4'];
        $skill5 = $_POST['skill5'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $about_me = $_POST['about_me'];
        $work_experience = $_POST['work_experience'];
        $education = $_POST['education'];
        $languages = $_POST['languages'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $facebookLink = $_POST['facebookLink'];
        $linkedinLink = $_POST['linkedinLink'];

        // Pass them to the updateCv method
        $this->model('Cv')->updateCv($id, $details, $template, $skill1, $skill2, $skill3, $skill4, $skill5, $age, $birthday, $about_me, $work_experience, $education, $languages, $phoneNumber, $email, $website, $facebookLink, $linkedinLink);
    }
    public function create()
    {
        if (!isset($_POST['full_name'],$_POST['language'], $_POST['template'], $_POST['skill1'], $_POST['skill2'], $_POST['skill3'], $_POST['skill4'], $_POST['skill5'], $_POST['age'], $_POST['birthday'], $_POST['about_me'], $_POST['work_experience'], $_POST['education'], $_POST['languages'], $_POST['phoneNumber'], $_POST['email'], $_POST['website'], $_POST['facebookLink'], $_POST['linkedinLink']) || empty($_POST['full_name']) || empty($_POST['template'])) {
            // REDIRECT TO THE SAME create_cv.php PAGE
            header('Location: ../views/create_cv.php?error=1');
            exit();
        } else {
            $full_name = $_POST['full_name'];
            $userId =  $_SESSION['user_id'];
            $template = $_POST['template'];
            $skill1 = $_POST['skill1'];
            $skill2 = $_POST['skill2'];
            $skill3 = $_POST['skill3'];
            $skill4 = $_POST['skill4'];
            $skill5 = $_POST['skill5'];
            $age = $_POST['age'];
            $birthday = $_POST['birthday'];
            $about_me = $_POST['about_me'];
            $work_experience = $_POST['work_experience'];
            $education = $_POST['education'];
            $languages = $_POST['languages'];
            $phoneNumber = $_POST['phoneNumber'];
            $email = $_POST['email'];
            $website = $_POST['website'];
            $facebookLink = $_POST['facebookLink'];
            $linkedinLink = $_POST['linkedinLink'];
            $language = $_POST['language'];
        }
        // Get the new fields from the $_POST array






        if (isset($_FILES['picture'])) {
            $picture = $_FILES['picture'];
            // You can now move the uploaded file to your desired directory
            move_uploaded_file($picture['tmp_name'], '../uploads/' . $picture['name']);
        }

        // Pass them to the createCv method
        $cvId = $this->model('Cv')->createCv($language,$full_name, $picture['name'], $userId, $template, $skill1, $skill2, $skill3, $skill4, $skill5, $age, $birthday, $about_me, $work_experience, $education, $languages, $phoneNumber, $email, $website, $facebookLink, $linkedinLink);
        
        header('Location: preview_cv.php?id=' . $cvId);
    }
    public function preview()
    {
        $id = $_GET['id'];

        // Get the CV with the given id
        $cv = $this->model('Cv')->getCv($id);

        // Return the CV
        return $cv;
    }
}
