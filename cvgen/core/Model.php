<?php
require_once 'Database.php';
// core/Model.php
class Model {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }
}


?>