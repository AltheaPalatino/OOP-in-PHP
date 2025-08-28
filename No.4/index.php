<?php
require_once 'classes/student.php';
$studentObj = new Student();
$students   = $studentObj->getAllStudents();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #000000;
            text-align: center;
        }
        form {
            margin-bottom: 15px;
            text-align: center;
        }
        input, button {
            padding: 6px;
            margin: 3px;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #666;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }s
        button {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Student Lists</h1>
    <form action="core/handleforms.php" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="addStudent">Submit</button>
    </form>

    <table border="2" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date Added</th>
            <th>Last Updated</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $stu): ?>
            <tr>
                <td><?= $stu['id'] ?></td>
                <td><?= $stu['name'] ?></td>
                <td><?= $stu['email'] ?></td>
                <td><?= $stu['date_added'] ?></td>
                <td><?= $stu['last_updated'] ?></td>
                <td>

                    <form action="edit.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $stu['id'] ?>">
                        <button type="submit">Edit</button>
                    </form>

                    <form action="core/handleforms.php" method="POST" style="display:inline;" 
                          onsubmit="return confirm('Are you sure you want to delete this?');">
                        <input type="hidden" name="id" value="<?= $stu['id'] ?>">
                        <button type="submit" name="deleteStudent">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
