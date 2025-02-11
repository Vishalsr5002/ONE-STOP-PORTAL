<!DOCTYPE html>
<html lang="en">
<head>
<?php
require('config.php');

session_start();
if(!isset($_SESSION['staff_id']))
{
    header("Location: index.php");
    exit;
}
$result = $_SESSION['staff_id'];
$course_id = $result['course_id'];
$stmt = $conn->prepare("SELECT * FROM course_details WHERE course_id = ?");

$stmt->execute([$course_id]);
$course = $stmt->get_result();
while ($row = $course->fetch_assoc()) {
    $course_name = $row['name'];
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["year"]) && isset($_GET["department"])) {
    $year = $_GET["year"];
    $department = $_GET["department"];

    $stmt = $conn->prepare("SELECT student_courses.promptness,student_courses.activeness,student_courses.competence,student_courses.achievements,student_courses.leadershipskill,student_courses.course_id,student_courses.mark,student_courses.student_courses_id as student_id,student.name,course_details.name as course_name FROM student_courses inner join student on student.student_id=student_courses.student_id inner join course_details on course_details.course_id = student_courses.course_id WHERE student.year = ? AND student.department = ? AND student_courses.course_id = ?");
    $stmt->bind_param("sss", $year, $department, $result['course_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        
        echo "<table>";
        echo "<thead><tr><th>ID</th><th>Name</th>
        <th>Details</th><th>Promptness (25)</th><th>Activeness (25)</th>
        <th>Competence (25)</th><th>Achievements (25)</th><th>LeadershipSkills (25)</th>
        <th>Total</th></tr>
        </thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr id='row{$row['student_id']}'>";
            echo "<td>{$row['student_id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>Year: {$year}<br>Department: {$department}<br>Course ID: {$row['course_id']}<br>Course Name: {$row['course_name']}</td>";
            if($row['mark']=="")
            {
                echo "<td><input id='promptness{$row['student_id']}' min='0' onchange='calculateTotal({$row['student_id']})'type='number' value='0' max='25' class='mark-input'></td>";
                echo "<td><input onchange='calculateTotal({$row['student_id']})'type='number' value='0' max='25' min='0' id='activeness{$row['student_id']}' class='mark-input'></td>";
                echo "<td><input onchange='calculateTotal({$row['student_id']})'type='number' value='0' max='25' min='0' id='competence{$row['student_id']}'class='mark-input'></td>";
                echo "<td><input onchange='calculateTotal({$row['student_id']})'type='number' value='0' max='25' min='0' id='achievements{$row['student_id']}' class='mark-input'></td>";
                echo "<td><input onchange='calculateTotal({$row['student_id']})'type='number' value='0' max='25' min='0' id='leadership{$row['student_id']}'class='mark-input'></td>";
                echo "<td id='buttonCell{$row['student_id']}'></td>";
            
            }else{
                echo "<td>{$row['promptness']}</td>";
                echo "<td>{$row['activeness']}</td>";
                echo "<td>{$row['competence']}</td>";
                
                echo "<td>{$row['achievements']}</td>";
                echo "<td>{$row['leadershipskill']}</td>";
                echo "<td>{$row['mark']}</td>";
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
        input[type=number]
        {
            width:30%
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
            width: 328px;
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
                <li><a class="active" href="#">Welcome, <?php echo $result['name']?></a></li>
                
            </ul>
            <h4>
            <h4>Course Details:<br> ID: <?php echo $result['course_id']?><br> Name: <?php echo $course_name?></h4>
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
    </div>

            <div class="table-container">
            
                </div>
        </div>
    </div>

    <script>
       function calculateTotal(rowId)
       {
        var promptness = parseInt(document.getElementById("promptness" + rowId).value) || 0;
        var activeness = parseInt(document.getElementById("activeness" + rowId).value) || 0;
        var competence = parseInt(document.getElementById("competence" + rowId).value) || 0;
        var achievements = parseInt(document.getElementById("achievements" + rowId).value) || 0;
        var leadership = parseInt(document.getElementById("leadership" + rowId).value) || 0;


        var total_mark = promptness+activeness+competence+achievements+leadership;
        document.getElementById("buttonCell" + rowId).innerHTML = total_mark;
        var submitButton = document.createElement("button");
            submitButton.textContent = "Submit";
            submitButton.onclick = function() {
                uploadMark(rowId, total_mark);
            };
        var buttonCell = document.getElementById("buttonCell" + rowId);

        var totalMarkSpan = document.createElement("span");
        totalMarkSpan.textContent = "Total Mark: " + total_mark;
        buttonCell.innerHTML = "";
        buttonCell.appendChild(totalMarkSpan);
        buttonCell.appendChild(submitButton);

       }
            
        
        function uploadMark(rowId, total_mark) {
            var promptness = parseInt(document.getElementById("promptness" + rowId).value) || 0;
            var activeness = parseInt(document.getElementById("activeness" + rowId).value) || 0;
            var competence = parseInt(document.getElementById("competence" + rowId).value) || 0;
            var achievements = parseInt(document.getElementById("achievements" + rowId).value) || 0;
            var leadership = parseInt(document.getElementById("leadership" + rowId).value) || 0;

        
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              
                var response = JSON.parse(this.responseText);
                if (response.success) {
                    alert("Mark updated successfully!");
                    fetchStudents();
                } else {
                    alert("Failed to update mark!");
                }
            }
        };
        xhr.open("POST", "update_mark.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var payload = "student_id=" + rowId +
                  "&promptness=" + promptness +
                  "&activeness=" + activeness +
                  "&competence=" + competence +
                  "&achievements=" + achievements +
                  "&leadership=" + leadership +
                  "&total_mark=" + total_mark;
                  xhr.send(payload);
    }

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
