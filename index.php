<?php
// Student Portal - Dynamic Version (Enhanced)

// Sample student data
$students = [
    ["id" => "101", "name" => "Rutuja", "course" => "Computer Engineering", "attendance" => 90, "email" => "rutuja@example.com"],
    ["id" => "102", "name" => "Asha", "course" => "Mechanical Engineering", "attendance" => 85, "email" => "asha@example.com"],
    ["id" => "103", "name" => "Aditi", "course" => "Information Technology", "attendance" => 95, "email" => "aditi@example.com"],
    ["id" => "104", "name" => "Abhishek", "course" => "Electronics", "attendance" => 70, "email" => "abhi@example.com"]
];

// Handle search
$search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
if ($search !== '') {
    $students = array_filter($students, function($s) use ($search) {
        return strpos(strtolower($s["name"]), $search) !== false ||
               strpos(strtolower($s["course"]), $search) !== false;
    });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Dynamic Student Enrollment and Attendance Portal">
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
            font-size: 22px;
            font-weight: bold;
        }
        nav {
            text-align: center;
            margin-top: 10px;
        }
        nav a {
            text-decoration: none;
            margin: 0 15px;
            color: #4a90e2;
            font-weight: bold;
        }
        h1, h2 {
            text-align: center;
            color: #333;
            margin-top: 15px;
        }
        .search-box {
            text-align: center;
            margin: 15px 0;
        }
        .search-box input[type="text"] {
            padding: 8px;
            width: 250px;
        }
        .search-box button {
            padding: 8px 12px;
            background: #4a90e2;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .enroll-box {
            text-align: center;
            margin: 20px 0;
            background: #fff;
            padding: 10px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 6px;
        }
        .enroll-box input {
            margin: 5px;
            padding: 7px;
        }
        .enroll-box button {
            padding: 8px 12px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            max-width: 900px;
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
        .low-attendance {
            background: #ffe5e5;
            color: #d9534f;
            font-weight: bold;
        }
        footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <header>EduLearn Student Portal</header>
    <nav>
        <a href="#">Home</a>
        <a href="#">Students</a>
        <a href="#">Attendance</a>
    </nav>

    <h1>📚 Student Enrollment & Attendance Portal</h1>
    <p style="text-align:center;color:#555;">Date: <?php echo date("d M Y, l - h:i A"); ?></p>

    <div class="search-box">
        <form method="GET">
            <input type="text" name="search" placeholder="Search by name or course" value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="enroll-box">
        <h3>🔑 New Enrollment (Demo)</h3>
        <input type="text" placeholder="Enter Student Name" required>
        <input type="text" placeholder="Enter Course" required>
        <button type="button" onclick="alert('Demo: Student added successfully (not saved)!')">Add Student</button>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Email</th>
            <th>Attendance</th>
            <th>Status</th>
        </tr>
        <?php if (!empty($students)): ?>
            <?php foreach ($students as $s): ?>
                <?php $low = $s["attendance"] < 80; ?>
                <tr class="<?= $low ? 'low-attendance' : '' ?>">
                    <td><?= $s["id"] ?></td>
                    <td><?= $s["name"] ?></td>
                    <td><?= $s["course"] ?></td>
                    <td><?= $s["email"] ?></td>
                    <td><?= $s["attendance"] ?>%</td>
                    <td><?= $low ? "⚠ Low Attendance" : "✅ Good Standing" ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">No students found matching your search.</td></tr>
        <?php endif; ?>
    </table>

    <footer>
        &copy; 2025 EduLearn Student Portal | Server Time: <?= date("h:i:s A") ?>
    </footer>
</body>
</html>
