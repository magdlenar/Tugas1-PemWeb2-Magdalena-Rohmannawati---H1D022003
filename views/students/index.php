<?php
require_once __DIR__ . '/../../app/controllers/StudentController.php';


$controller = new StudentController();
$students = $controller->index();

include_once __DIR__ . '/../../public/header.php';
?>

<div class="container mt-4">
    <h2>Data Mahasiswa</h2>
    <a href="create.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    <table id="studentsTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($students)): ?>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= htmlspecialchars($student['name']) ?></td>
                        <td><?= htmlspecialchars($student['nim']) ?></td>
                        <td><?= htmlspecialchars($student['major']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="delete.php?id=<?= $student['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus kursus ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data mahasiswa.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#studentsTable').DataTable();
    });
</script>

<?php include_once __DIR__ . '/../../public/footer.php'; ?>
