<?php
require_once __DIR__ . '/../models/courses.php';

class CourseController {
    private $courseModel;

    public function __construct() {
        $this->courseModel = new Course();
    }
    public function getCourseModel() {
        return $this->courseModel;
    }

    public function index() {
        return $this->courseModel->getAll();
    }


    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $course_name = $_POST['course_name'];
            $credits = $_POST['credits'];
        

          
            if (empty($course_name) || empty($credits)) {
                echo "<script>alert('Semua field harus diisi!');</script>";
                return;
            }

            if ($this->courseModel->create($course_name, $credits)) {
                header("Location: courses.php?message=create_success");
                exit;
            } else {
                echo "<script>alert('Gagal menambahkan Course!');</script>";
            }
        }

        include __DIR__ . '/../../views/courses/create.php';
    }
    public function edit($id) {
        $course = $this->courseModel->getById($id);
        
        
        if (! $course ) {
            die("Course tidak ditemukan.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $course_name = $_POST['course_name '];
            $credits = $_POST['credits'];

            
            if (empty($course_name) || empty($credits)) {
                echo "<script>alert('Semua field harus diisi!');</script>";
                return;
            }

            if ($this->courseModel->update($id, $course_name, $credits)) {
                header("Location: course.php?message=update_success");
                exit;
            } else {
                echo "<script>alert('Gagal mengupdate course!');</script>";
            }
        }

        include __DIR__ . '/../../views/courses/edit.php';
    }

    
    public function delete($id) {
        if ($this->courseModel->getById($id)) { 
            if ($this->courseModel->delete($id)) {
                header("Location: courses.php?message=delete_success");
                exit();
            } else {
                echo "<script>alert('Gagal menghapus !');</script>";
            }
        } else {
            echo "<script>alert('tidak ditemukan!');</script>";
        }
    }
}
?>
