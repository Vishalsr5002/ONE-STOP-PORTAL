<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login - One Stop Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
        <div class="container">
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
    <section class="hero">
        <div class="container" >
        </div>
    </section>
    <section class="login">
        <div class="container">
            <h2>Staff Login</h2>
            <form id="loginForm" method="post">
                <input placeholder="Staff ID..." type="text" id="username" name="username" required>
                <input placeholder="Password..." type="password" id="password" name="password" required>
                <div class="captcha-container">
                    <input placeholder="Enter CAPTCHA" type="text" id="captcha" name="captcha" required>
                    <img src="captcha.php" alt="CAPTCHA Image" class="captcha-image" id="captchaImage">
                </div>
                <div id="errorMessage" style="color: red;"></div> <!-- Error message container -->
                <button type="button" class="btn" onclick="submitForm()">Login</button> 
                <br><br>
                Back to <a href="index.php">Home </a> <!-- Use type="button" to prevent default form submission -->
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 One Stop Portal. All rights reserved.</p>
        </div>
    </footer>

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function submitForm() {
            var formData = $('#loginForm').serialize();
            $.ajax({
                type: 'POST',
                url: 'login.php',
                data: formData,
                success: function(response) {
                    if (response === 'success') {
                        alert('Login success !');
                        window.location.href = 'dashboard.php';
                    } else {
                        
                        $('#errorMessage').text(response);
                    }
                }
            });
        }
    </script>
</body>
</html>
