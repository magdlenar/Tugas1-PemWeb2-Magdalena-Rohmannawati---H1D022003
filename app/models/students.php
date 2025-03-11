<?php
require_once __DIR__ . '/../../app/config/database.php';

class Student {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function create($name, $nim, $major) {
        $stmt = $this->pdo->prepare("INSERT INTO students (name, nim, major) VALUES (:name, :nim, :major)");
        $stmt->execute([
            ':name' => $name,
            ':nim' => $nim,
            ':major' => $major
        ]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $nim, $major) {
        $stmt = $this->pdo->prepare("UPDATE students SET name = :name, nim = :nim, major = :major WHERE id = :id");
        return $stmt->execute([
            ':id' => $id, 
            ':name' => $name, 
            ':nim' => $nim, 
            ':major' => $major
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM students WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>
