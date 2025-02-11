<?php
session_start();
require('config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if($_POST['username']!="" && $_POST['password']!="" && $_POST['captcha']!="")
       {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $captcha = $_POST['captcha'];
        $storedCaptcha = $_SESSION['captcha'];
        if ($captcha === $storedCaptcha) {
            $sql = "SELECT * FROM staff WHERE staff_id = ? AND password=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username,$password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $_SESSION['staff_id'] = $row;
                echo 'success';
            }
        } else {
            
            echo 'CAPTCHA verification failed. Please try again.';
        }
    }else {
       
        echo 'All fields are required.';
    }
}
?>