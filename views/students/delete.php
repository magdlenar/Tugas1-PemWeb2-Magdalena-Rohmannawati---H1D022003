<?php
require_once __DIR__ . '/../../app/controllers/StudentController.php';

$controller = new StudentController();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];
$controller->delete($id);
?>
