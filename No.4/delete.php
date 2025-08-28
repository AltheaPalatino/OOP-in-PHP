<?php
require_once 'classes/student.php';
$studentObj = new Student();
if (isset($_GET['id'])) {
    $studentObj->deleteStudent($_GET['id']);
}
header("Location: index.php");
