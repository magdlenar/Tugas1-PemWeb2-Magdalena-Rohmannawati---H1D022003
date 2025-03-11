<?php
require_once __DIR__ . '/../../app/controllers/CourseController.php';
require_once __DIR__ . '/../../public/header.php';

$controller = new CourseController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $credits = $_POST['credits'];

    if ($controller->create($course_name, $credits)) {
        header("Location: courses.php?message=create_success");
        exit();
    } else {
        echo "<p class='text-danger text-center'>Gagal menambahkan kursus.</p>";
    }
}
?>

<div class="container mt-4">
    <h2 class="text-center">Add Course</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name" required>
        </div>
        <div class="mb-3">
            <label for="credits" class="form-label">Credits</label>
            <textarea class="form-control" name="credits" id="credits" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </form>
</div>

<?php require_once __DIR__ . '/../../public/footer.php'; ?>
