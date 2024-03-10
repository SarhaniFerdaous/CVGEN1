<?php
require_once '../core/Model.php';

class User extends Model {
    public function getUser($username, $password) {
        // Logic to get a user from the database
        $stmt = $this->db->connect()->prepare("SELECT * FROM Users WHERE username = :username AND password = :password");
        $stmt->execute(['username' => $username, 'password' => $password]);
        return $stmt->fetch();
    }
    public function getUserById($id) {
        // Logic to get a user from the database
        $stmt = $this->db->connect()->prepare("SELECT * FROM Users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function createUser($username, $password) {
        // Logic to create a new user in the database
        $stmt = $this->db->connect()->prepare("INSERT INTO Users (username, password) VALUES (:username, :password)");
        $stmt->execute(['username' => $username, 'password' => $password]);
    }
    public function getAll() {
        $stmt = $this->db->connect()->prepare("SELECT * FROM Users");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete($id) {
        $stmt = $this->db->connect()->prepare("DELETE FROM Users WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
    
}

?>