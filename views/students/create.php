<?php
include_once __DIR__ . '/../../public/header.php';
require_once __DIR__ . '/../../app/controllers/StudentController.php';

$controller = new StudentController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create();
}
?>

<?php include_once __DIR__ . '/../../public/header.php'; ?>

<div class="container mt-4">
    <h2>Tambah Mahasiswa</h2>   

    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="major" class="form-label">Jurusan</label>
            <input type="text" name="major" id="major" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include_once __DIR__ . '/../../public/footer.php'; ?>
