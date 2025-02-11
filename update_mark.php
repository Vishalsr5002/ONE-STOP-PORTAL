<?php
require('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["student_id"])) {
    $studentId = $_POST["student_id"];
    $mark = $_POST["total_mark"];
    $promptness = $_POST["promptness"];
    $activeness = $_POST["activeness"];
    $competence = $_POST["competence"];
    $achievements = $_POST["achievements"];
    $leadership = $_POST["leadership"];
    
    $stmt = $conn->prepare("UPDATE student_courses SET mark = ? WHERE student_courses_id = ?");
    $stmt->bind_param("si", $mark, $studentId);
    $stmt->execute();
    $stmt1 = $conn->prepare("UPDATE student_courses SET promptness = ?, activeness = ?, competence = ?, achievements = ?, leadershipskill = ? WHERE student_courses_id = ?");
    $stmt1->bind_param("iiiiii", $promptness, $activeness, $competence, $achievements, $leadership, $studentId);
    
    if ($stmt1->execute()) {
        
        $response = array("success" => true);
        echo json_encode($response);
    } else {
        
        $response = array("success" => false);
        echo json_encode($response);
    }
} else {
   
    $response = array("success" => false);
    echo json_encode($response);
}
?>
