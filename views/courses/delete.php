<?php
require_once __DIR__ . '/../../app/controllers/CourseController.php';

$controller = new CourseController();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];
$controller->delete($id);
?>
