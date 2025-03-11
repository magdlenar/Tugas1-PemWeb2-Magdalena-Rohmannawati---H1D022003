<?php
require_once __DIR__ . '/../../app/controllers/CourseController.php';
require_once __DIR__ . '/../../public/header.php';

$controller = new CourseController();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];
$course = $controller->getCourseModel()->getById($id);

if (!$course) {
    die("Data  tidak ditemukan.");
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $credits = $_POST['credits'];

    if ($controller->getCourseModel()->update($id,  $course_name, $credits)) {
        header("Location: courses.php?message=update_success");
        exit();
    } else {
        echo "<p class='text-danger'>Gagal mengupdate data.</p>";
    }
}
?>

<div class="container mt-4">
    <h2>Edit Data Courses</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="course_name" class="form-label">Course Name </label>
            <input type="text" class="form-control" name="course_name" id="course_name" value="<?= htmlspecialchars($course['course_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="credits" class="form-label">Credits</label>
            <input type="text" class="form-control" name="credits" id="credits" value="<?= htmlspecialchars($course['credits']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php require_once __DIR__ . '/../../public/footer.php'; ?>
