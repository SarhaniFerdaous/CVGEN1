<?php
require_once '../models/CV.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['id'])) {
        $cv = new CV();
        $result = $cv->delete($_GET['id']);

        if ($result) {
            http_response_code(200);
            echo json_encode(['message' => 'CV deleted successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Failed to delete CV']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid CV id']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}