<?php
require_once '../core/Model.php';

class Cv extends Model {
    public function getCvs($userId) {
        // Logic to get a user's CVs from the database
        $stmt = $this->db->connect()->prepare("SELECT * FROM CVs WHERE user_id = :userId");
        $stmt->execute(['userId' => $userId]);

        return $stmt->fetchAll();
    }

    public function getCv($id) {
        // Logic to get a user's CV from the database
        $stmt = $this->db->connect()->prepare("SELECT * FROM CVs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function updateCv($id, $template, $skill1, $skill2, $skill3, $skill4, $skill5, $age, $birthday, $about_me, $work_experience, $education, $languages, $phoneNumber, $email, $website, $facebookLink, $linkedinLink) {
        $stmt = $this->db->connect()->prepare("UPDATE cv SET details = ?, template = ?, skill1 = ?, skill2 = ?, skill3 = ?, skill4 = ?, skill5 = ?, age = ?, birthday = ?, about_me = ?, work_experience = ?, education = ?, languages = ?, phoneNumber = ?, email = ?, website = ?, facebookLink = ?, linkedinLink = ? WHERE id = ?");
        $stmt->execute([ $template, $skill1, $skill2, $skill3, $skill4, $skill5, $age, $birthday, $about_me, $work_experience, $education, $languages, $phoneNumber, $email, $website, $facebookLink, $linkedinLink, $id]);
    }
    
    public function createCv($language,$full_name, $picture, $userId, $template, $skill1, $skill2, $skill3, $skill4, $skill5, $age, $birthday, $about_me, $work_experience, $education, $languages, $phoneNumber, $email, $website, $facebookLink, $linkedinLink) {
        $db = $this->db->connect();
        $stmt = $db->prepare("INSERT INTO CVs (language,full_name, picture, user_id, template, skill1, skill2, skill3, skill4, skill5, age, birthday, about_me, work_experience, education, languages, phoneNumber, email, website, facebookLink, linkedinLink) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$language,$full_name, $picture, $userId, $template, $skill1, $skill2, $skill3, $skill4, $skill5, $age, $birthday, $about_me, $work_experience, $education, $languages, $phoneNumber, $email, $website, $facebookLink, $linkedinLink]);
        return $db->lastInsertId();
    }
    public function delete($id) {
        $stmt = $this->db->connect()->prepare("DELETE FROM CVs WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
    public function getAll() {
        $stmt = $this->db->connect()->prepare("SELECT * FROM CVs");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>