<?php
require_once __DIR__ . '/../config/database.php';

class Course {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM courses");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($course_name, $credits) {
        $stmt = $this->pdo->prepare("INSERT INTO courses (course_name, credits) VALUES (:course_name, :credits)");
        return $stmt->execute([
            ':course_name' => $course_name,
            ':credits' => $credits
        ]);
    }
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $course_name, $credits) {
        $stmt = $this->pdo->prepare("UPDATE courses SET course_name = :course_name, credits = :credits WHERE id = :id");
        return $stmt->execute([
            ':id' => $id, 
            ':course_name' => $course_name,
            ':credits' => $credits
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM courses WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

}
?>
