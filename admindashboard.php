<!DOCTYPE html>
<html lang="en">
<head>
<?php
require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["year"]) && isset($_GET["department"])) {
    $year = $_GET["year"];
    $department = $_GET["department"];

    
    $stmt = $conn->prepare("SELECT * FROM student WHERE year = ? AND department = ?");
    $stmt->bind_param("ss", $year, $department);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        
        echo "<table>";
        echo "<thead><tr><th>ID</th><th>Name</th><th>Registered courses with marks</th><th>Grade</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr id='row{$row['student_id']}'>";
            echo "<td>{$row['student_id']}</td>";
            echo "<td>{$row['name']}</td>";
        
        
            $stmtp = $conn->prepare("SELECT * FROM student_courses INNER JOIN course_details ON course_details.course_id = student_courses.course_id WHERE student_courses.student_id = ?");
            $stmtp->bind_param("s", $row['student_id']);
            $stmtp->execute();
            $courses = $stmtp->get_result();
        
            $highest_mark = 0;
            $highest_subject = "";
        
            if ($courses->num_rows > 0) {
                echo "<td>";
                while ($course = $courses->fetch_assoc()) {
                    $course_name = $course['name'];
                    $mark = $course['mark'];
        
                    
                    if ($mark != "") {
                        echo "{$course['course_id']} - {$course_name} - <span style='color:red'>{$mark}</span><br>";
        
                        
                        if ($mark > $highest_mark) {
                            $highest_mark = $mark;
                            $highest_subject = $course_name;
                        }
                    } else {
                        echo "{$course['course_id']} - {$course_name} - <span style='color:red'>Mark Not entered</span><br>";
                    }
                }
                echo "</td>";
            }
        
            if (!empty($highest_subject)) {
                echo "<td>Highest Mark: {$highest_mark} in {$highest_subject}</td>";
            } else {
                echo "<td>No marks entered</td>";
            }
        
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No students found for the selected year and department.";
    }

    exit;
}
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login - One Stop Portal</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        a.active
        {
            color: #5b4747;
            border: 1px solid;
            padding: 7px;
            background-color: #87b78e;
            border-radius: 7px;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        a:hover {
            color: #ecf0f1;
        }
        .table-container {
    max-height: 300px; /* Set your desired maximum height */
    overflow-y: auto;
}
        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            display: flex;
        }

        aside {
            width: 250px;
            background-color: #3498db;
            
            color: white;
            height: 80vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        a.active {
            color: #5b4747;
            border: 1px solid;
            padding: 7px;
            background-color: #87b78e;
            border-radius: 7px;
        }

        .profile-photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }
        header{
            background-color: #719acede;
    color: #402222;
    padding: 15px;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;

        }
    </style>
</head>
<body>
<header>
        <div class="container" style="color: #fdfdfd;">
            <div class="logo-left">
                <img src="images/logo 2.png" alt="Left Logo">
            </div>
            <div class="center-content">
                <h1>SRI RAMAKRISHNA ENGINEERING COLLEGE</h1>
                <p>Educational Service: SNR Sons Charitable Trust, Autonomous Institution, Reaccredited by NAAC with ‘A+’ Grade <br> Approved by AICTE and Permanently Affiliated to Anna University, Chennai [ISO 9001:2015 Certified and all eligible programmes Accredited by NBA]</p>
            </div>
            <div class="logo-right">
                <img src="images/logo3.png" alt="Right Logo">
            </div>
        </div>
    </header>

    <div class="container">
        <aside>
            <h4></h4>
            <h4>
        <ul>
                <li><a class="active" href="#">Welcome, Admin</a></li>
                
            </ul>
            <h4>
            <h4>You can search for the student in the Right side panel.</h4>
            <a style="color:blue"href="logout.php">Logout</a>
            
        </aside>

        <div class="main-content">
        <form id="studentForm">
        <label for="year">Select Year:</label>
        <select id="year" name="year">
            <option value="2021-2022">2021-2022</option>
            <option value="2022-2023">2022-2023</option>
            <option value="2023-2024">2023-2024</option>
        </select><br><br>

        <label for="department">Select Department:</label>
        <select id="department" name="department">
            <option value="EEE">EEE</option>
            <option value="CSE">CSE</option>
            <option value="ECE">ECE</option>
            <option value="EIE">EIE</option>
            <option value="BME">BME</option>
            <option value="CIVIL">CIVIL</option>
            <option value="AERO">AERO</option>
            <option value="MECH">MECH</option>
            <option value="IT">IT</option>
            <option value="MTECH">MTECH</option>
            <option value="AIDS">AIDS</option>
        </select><br><br>

        <button type="button" onclick="fetchStudents()">Fetch Students</button>
    </form>
    <div id="studentTable" class="table-container">
        <!-- Student details will be displayed here -->
    </div>

            <div class="table-container">
            
                </div>
        </div>
    </div>

    <script>

        function fetchStudents() {
            var year = document.getElementById("year").value;
            var department = document.getElementById("department").value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("studentTable").innerHTML = this.responseText;
                }
            };
            xhr.open("GET", "<?php echo $_SERVER['PHP_SELF']; ?>?year=" + year + "&department=" + department, true);
            xhr.send();
        }

    </script>
</body>
</html>
