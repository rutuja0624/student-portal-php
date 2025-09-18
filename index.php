<?php
// Simple Student Portal Demo

// Sample student data
$students = [
    ["id" => "101", "name" => "Rutuja", "course" => "Computer Engineering", "attendance" => "90%"],
    ["id" => "102", "name" => "Amit", "course" => "Mechanical Engineering", "attendance" => "85%"],
    ["id" => "103", "name" => "Priya", "course" => "Information Technology", "attendance" => "95%"],
    ["id" => "104", "name" => "Rahul", "course" => "Electronics", "attendance" => "88%"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Simple Student Portal Demo - Attendance and Course Details">
    <title>EduLearn - Student Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        header {
            background:#4a90e2;
            color:white;
            text-align:center;
            padding:15px 0;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 1px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 15px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 800px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background: #4a90e2;
            color: white;
        }
        tr:nth-child(even) { background: #f9f9f9; }
        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <header>Welcome to EduLearn Student Portal</header>
    <h1>📚 Student Details</h1>
    <p style="text-align:center;color:#555;">Date: <?php echo date("d M Y, l"); ?></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Attendance</th>
        </tr>
        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s["id"] ?></td>
            <td><?= $s["name"] ?></td>
            <td><?= $s["course"] ?></td>
            <td><?= $s["attendance"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <footer>
        &copy; 2025 EduLearn Student Portal
    </footer>
</body>
</html>
