<?php

session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) { // Verify password
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            header("Location:home.php");
            exit();
        } else {
            ?>
            <div class="overlay"></div>
            <div class="popup">
                <p style="color:black">Invalid Paassword !</p>
                <a href="login.php" class="close-btn">Close</a> 
            </div>

            <?php
        }
    } else {
        ?>
        <div class="overlay"></div>
        <div class="popup">
            <p style="color:black">Username Not Found</p>
            <a href="login.php" class="close-btn">Close</a> 
        </div>

        <?php
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe Heart - Login & Registration</title>

    <!-- Bootstrap & jQuery (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: radial-gradient(circle at center, rgb(158, 135, 135), rgb(19, 57, 88));
            color: white;
            font-family: Arial, sans-serif;
        }



        .navbar {
            background-color: #333 !important;
            height: 80px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .login-container {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: rgba(51, 51, 51, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .btn-primary {
            background-color: #1DB954;
            border: none;
        }

            .btn-primary:hover {
                background-color: #17a447;
            }

        .content {
            padding: 130px 15px 50px;
            text-align: center;
        }

        footer {
            background-color: #1d2a3a;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: auto;
        }

        .hidden {
            display: none;
        }

        .btn-custom {
            background-color: #17a2b8;
            border: none;
            transition: 0.3s;
        }

            .btn-custom:hover {
                background-color: #138496;
            }

        .btn-light {
            background-color: #333;
            color: #E0E0E0;
            border: none;
        }

            .btn-light:hover {
                background-color: #E0E0E0;
                color: #333;
            }
            .popup {
                display:flex;
                flex-direction:column;
                align-items: center;
                justify-content:center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            width:300px;
            height:150px;
            padding: 20px;
            border: 2px solid black;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.5);
            z-index: 1000;
        }
        .overlay {
            display: <?php echo $showPopup ? 'block' : 'none'; ?>;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        .close-btn {
            
            margin-top: 10px;
           
           
           
            padding: 5px 10px;
            background: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <img src="image/logo.png" alt="Safe Heart Logo" style="height: 50px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>

    <!-- Heart Care Information -->
    <div class="content">
        <h2>Take Care of Your Heart</h2>
        <p>Healthy habits lead to a healthy heart. Exercise regularly, eat a balanced diet, and monitor your heart health.</p>
    </div>

    <div class="login-container">
        <div class="login-box">
            <h2 class="text-light">Login</h2>
            <form id="loginForm" method="POST" novalidate>
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Mobile Number" required>
                    <div class="invalid-feedback">Please enter your username.</div>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <div class="invalid-feedback">Please enter your password.</div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <p class="mt-3">Don't have an account? <a href="Registration.php" class="text-success">Create one</a></p>
        </div>
    </div>
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('#loginForm')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()

    </script>
    <!-- Footer -->
    <footer>
        <p>© <span id="year"></span> Safe Heart. All rights reserved.</p>
    </footer>

    <script>
        // Set the current year in the footer
        document.getElementById("year").textContent = new Date().getFullYear();
        
    </script>

</body>
</html>

