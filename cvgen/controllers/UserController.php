<?php
require_once '../core/Controller.php';
session_start();

class UserController extends Controller {
    public function login() {
        // Logic for user login
        $userModel = $this->model('User');
        $user = $userModel->getUser($_POST['username'], $_POST['password']);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /cvgen/views/index.php');
        } else {
            header('Location: /cvgen/views/login_err.php');
        }
    }

    public function register() {
        // Logic for user registration
        $userModel = $this->model('User');
        $userModel->createUser($_POST['username'], $_POST['password']);
        header('Location: /cvgen/views/login.php');
    }
}

?>