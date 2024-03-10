<?php
require_once '../models/User.php';
require_once '../models/Cv.php';
require_once '../core/Controller.php';
session_start();

class AdminController extends Controller{
    public function listCvs() {
        $cv = new Cv();
        return $cv->getAll();
    }

    public function listUsers() {
        $user = new User();
        return $user->getAll();
    }

    public function deleteCv($id) {
        $cv = new Cv();
        $cv->delete($id);
    }

    public function deleteUser($id) {
        $user = new User();
        $user->delete($id);
    }
    public function isAdmin() {
        // get the session user id and check if is_admin
        if (isset($_SESSION['user_id'])) {
            $user = new User();
            $user = $user->getUserById($_SESSION['user_id']);
            if ($user['is_admin'] == 1) {
                return true;
            }
            return false;
        }
    }
}