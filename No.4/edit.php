<?php
require_once 'classes/student.php';

$studentObj = new Student();
$student    = $studentObj->getStudentById($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        a {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #007bff;
        }
        form {
            margin-top: 10px;
        }
        input, button {
            padding: 8px;
            margin: 5px;
            width: 300px;
            border: outset;
        }
        button {
            cursor: pointer;
            width: 100px;
        }
        .info-box {
            margin-top: 20px;
            padding: 10px;
            background: #f8f9fa;
            border: 1px solid #ccc;
            width: 320px;
        }
        .info-box p {
            margin: 5px 0;
            font-size: 14px;
            color: #444;
        }
    </style>
</head>
<body>
    <h1>Edit Student</h1>

    <a href="index.php">Home</a>

    <form action="core/handleforms.php" method="POST">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">
        <input type="text" name="name" value="<?= $student['name'] ?>" required>
        <input type="email" name="email" value="<?= $student['email'] ?>" required>
        <button type="submit" name="updateStudent">Update</button>
    </form>

    <div class="info-box">
        <p><strong>Date Added:</strong> <?= $student['date_added'] ?></p>
        <p><strong>Last Updated:</strong> <?= $student['last_updated'] ?></p>
    </div>
</body>
</html>
