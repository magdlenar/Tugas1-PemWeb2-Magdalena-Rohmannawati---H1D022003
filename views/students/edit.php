<?php
require_once __DIR__ . '/../../app/controllers/StudentController.php';
require_once __DIR__ . '/../../public/header.php';

$controller = new StudentController();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];
$student = $controller->getStudentModel()->getById($id); // Menggunakan getter untuk mengakses model

if (!$student) {
    die("Data mahasiswa tidak ditemukan.");
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $major = $_POST['major'];

    if ($controller->getStudentModel()->update($id, $name, $nim, $major)) {
        header("Location: index.php?message=update_success");
        exit();
    } else {
        echo "<p class='text-danger'>Gagal mengupdate data mahasiswa.</p>";
    }
}
?>

<div class="container mt-4">
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($student['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" id="nim" value="<?= htmlspecialchars($student['nim']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="major" class="form-label">Jurusan</label>
            <input type="text" class="form-control" name="major" id="major" value="<?= htmlspecialchars($student['major']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php require_once __DIR__ . '/../../public/footer.php'; ?>
