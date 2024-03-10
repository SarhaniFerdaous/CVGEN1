<?php
require_once '../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['id'])) {
        $user = new User();
        $result = $user->delete($_GET['id']);

        if ($result) {
            http_response_code(200);
            echo json_encode(['message' => 'User deleted successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to delete user']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid user id']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}