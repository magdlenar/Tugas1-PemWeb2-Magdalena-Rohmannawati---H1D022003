<?php require_once __DIR__ . '/../public/header.php'; ?>

<div class="container text-center mt-5">
    <h1>Selamat Datang di Sistem Manajemen Mahasiswa</h1>
    <p>Pilih salah satu menu di bawah untuk mulai mengelola data.</p>

    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title">Students</h3>
                    <p class="card-text">Kelola data mahasiswa, tambah, edit, atau hapus data.</p>
                    <a href="students/index.php" class="btn btn-primary">Kelola Students</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title">Courses</h3>
                    <p class="card-text">Kelola data mata kuliah, tambah, edit, atau hapus data.</p>
                    <a href="courses/courses.php" class="btn btn-success">Kelola Courses</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../public/footer.php'; ?>
