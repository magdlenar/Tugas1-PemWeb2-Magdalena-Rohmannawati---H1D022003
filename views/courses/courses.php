
<?php 
require_once __DIR__ . '/../../app/controllers/CourseController.php';
$controller = new CourseController();
$courses = $controller->index();

include_once __DIR__ . '/../../public/header.php'; 
?>

<div class="container mt-4">
    <h2 class="text-center">Courses List</h2>
    <a href="create.php" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Courses</a>

    <div class="table-responsive">
        <table id="coursesTable" class="table table-hover table-bordered">
            <thead>
                <tr class="table-primary text-center">
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Credits</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($courses)): ?>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td class="text-center"><?= htmlspecialchars($course['id']) ?></td>
                            <td><?= htmlspecialchars($course['course_name']) ?></td>
                            <td><?= htmlspecialchars($course['credits']) ?></td>
                            
                            <td class="text-center">
                                <a href="edit.php?id=<?= $course['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="delete.php?id=<?= $course['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus kursus ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada kursus yang tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#coursesTable').DataTable();
    });
</script>

<?php include_once __DIR__ . '/../../public/footer.php'; ?>
