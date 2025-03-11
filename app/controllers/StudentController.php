<?php
require_once __DIR__ . '/../models/students.php';

class StudentController {
    private $studentModel;

    public function __construct() {
        $this->studentModel = new Student();
    }
    public function getStudentModel() {
        return $this->studentModel;
    }
    
    
    public function index() {
        return $this->studentModel->getAll();
    }

    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $nim = $_POST['nim'];
            $major = $_POST['major'];

          
            if (empty($name) || empty($nim) || empty($major)) {
                echo "<script>alert('Semua field harus diisi!');</script>";
                return;
            }

            if ($this->studentModel->create($name, $nim, $major)) {
                header("Location: index.php?message=create_success");
                exit;
            } else {
                echo "<script>alert('Gagal menambahkan mahasiswa!');</script>";
            }
        }

        include __DIR__ . '/../../views/students/create.php';
    }

    
    public function edit($id) {
        $student = $this->studentModel->getById($id);
        
        
        if (!$student) {
            die("Mahasiswa tidak ditemukan.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $nim = $_POST['nim'];
            $major = $_POST['major'];

            
            if (empty($name) || empty($nim) || empty($major)) {
                echo "<script>alert('Semua field harus diisi!');</script>";
                return;
            }

            if ($this->studentModel->update($id, $name, $nim, $major)) {
                header("Location: index.php?message=update_success");
                exit;
            } else {
                echo "<script>alert('Gagal mengupdate mahasiswa!');</script>";
            }
        }

        include __DIR__ . '/../../views/students/edit.php';
    }

    
    public function delete($id) {
        if ($this->studentModel->getById($id)) { 
            if ($this->studentModel->delete($id)) {
                header("Location: index.php?message=delete_success");
                exit();
            } else {
                echo "<script>alert('Gagal menghapus mahasiswa!');</script>";
            }
        } else {
            echo "<script>alert('Mahasiswa tidak ditemukan!');</script>";
        }
    }
    
}
?>