<?php
require_once __DIR__ . '/../classes/student.php';
require_once __DIR__ . '/../classes/attendance.php';

date_default_timezone_set('Asia/Manila');

$studentObj    = new Student();
$attendanceObj = new Attendance();


if (isset($_POST['addStudent'])) {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    if (!empty($name) && !empty($email)) {
        $studentObj->createStudent([
            "name"        => $name,
            "email"       => $email,
            "date_added"  => date("Y-m-d H:i:s"),
            "last_updated"=> date("Y-m-d H:i:s")
        ]);
    }
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['updateStudent'])) {
    $id    = $_POST['id'];
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    if (!empty($id) && !empty($name) && !empty($email)) {
        $studentObj->updateStudent($id, [
            "name"         => $name,
            "email"        => $email,
            "last_updated" => date("Y-m-d H:i:s")
        ]);
    }
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['deleteStudent'])) {
    $id = $_POST['id'];
    $studentObj->deleteStudent($id);
    header("Location: ../index.php");
    exit;
}


if (isset($_POST['addAttendance'])) {
    $student_id = $_POST['student_id'];
    $date       = $_POST['date'];
    $status     = $_POST['status'];
    if (!empty($student_id) && !empty($date) && !empty($status)) {
        $attendanceObj->createAttendance([
            "student_id"   => $student_id,
            "date"         => $date,
            "status"       => $status,
            "date_added"   => date("Y-m-d H:i:s"),
            "last_updated" => date("Y-m-d H:i:s")
        ]);
    }
    header("Location: ../attendance.php");
    exit;
}

if (isset($_POST['updateAttendance'])) {
    $id         = $_POST['id'];
    $student_id = $_POST['student_id'];
    $date       = $_POST['date'];
    $status     = $_POST['status'];
    if (!empty($id) && !empty($student_id) && !empty($date) && !empty($status)) {
        $attendanceObj->updateAttendance($id, [
            "student_id"   => $student_id,
            "date"         => $date,
            "status"       => $status,
            "last_updated" => date("Y-m-d H:i:s")
        ]);
    }
    header("Location: ../attendance.php");
    exit;
}

if (isset($_POST['deleteAttendance'])) {
    $id = $_POST['id'];
    $attendanceObj->deleteAttendance($id);
    header("Location: ../attendance.php");
    exit;
}
