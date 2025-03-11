<?php
require_once '/../app/controllers/StudentController.php';

$controller = new StudentController();
$students = $controller->index();

$controller = new CourseController();
$Courses = $controller->index();
?>
