<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mobile = $_POST['mobile'];



    try {
        $sql = "INSERT INTO users (fullname, username, password, gender, dob, mobile) 
            VALUES ('$fullname', '$username', '$password', '$gender', '$dob', '$mobile')";

        $a = $conn->query($sql);

        if ($a == 1) {
?>
            <div class="overlay"></div>
            <div class="popup">
                <p style="color:black">Registered Successfully</p>
                <a href="Login.php" class="close-btn">Ok</a>
            </div>

        <?php
        }
    } catch (Exception $e) {
        ?>
        <div class="overlay"></div>
        <div class="popup">
            <p style="color:black">Mobile number alredy Registered</p>
            <a href="Registration.php" class="close-btn">Ok</a>
        </div>

<?php    }
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

        .content {
            padding: 50px 15px 50px;
            text-align: center;
        }

        .account-container {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;

        }

        .account-box {
            background: rgba(51, 51, 51, 0.95);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
            text-align: center;
            width: 55%;
            max-width: 700px;
        }

        .btn-primary {
            background-color: #1DB954;
            border: none;
        }

        .btn-primary:hover {
            background-color: #17a447;
        }

        .navbar {
            background-color: #333333 !important;
            position: sticky;
            top: 0;
            z-index: 1000;
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

        footer {
            background-color: #1d2a3a;
            color: white;
            padding: 20px 0px;
            text-align: center;
            margin-top: auto;
        }

        .popup {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            width: 300px;
            height: 150px;
            padding: 20px;
            border: 2px solid black;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .overlay {
            display: <?php echo $showPopup ? 'block' : 'none'; ?>;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
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

    <div class="account-container">
        <div class="account-box">
            <h2 class="text-light">Create Account</h2>
            <form id="accountForm" method="POST" novalidate>
                <div class="mb-3">
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                </div>

                <div class="mb-3">
                    <select class="form-control" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" name="dob" required>
                </div>
                <div class="mb-3">
                    <input type="tel" class="form-control" name="mobile" placeholder="Mobile No" pattern="\d{10}" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                    <div id="passwordMessage" class="mt-2"></div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create Account</button>
            </form>
            <p class="mt-3">Already have an account? <a href="Login.php" class="text-success">Login</a></p>
        </div>
    </div>
    <script>
        document.getElementById('confirmPassword').addEventListener('input', function() {
            var password = document.getElementById('password').value;
            var confirmPassword = this.value;
            var message = document.getElementById('passwordMessage');
            var submitButton = document.querySelector('button[type="submit"]');

            if (password !== confirmPassword) {
                message.innerHTML = '<span class="text-danger">❌ Passwords do not match.</span>';
                submitButton.disabled = true;
            } else {
                message.innerHTML = '<span class="text-success">✅ Passwords match.</span>';
                submitButton.disabled = false;
            }
        });

        document.getElementById('accountForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                event.preventDefault();
                document.getElementById('passwordMessage').innerHTML = '<span class="text-danger">❌ Passwords do not match.</span>';
            }
        });

        (function() {
            'use strict'
            var forms = document.querySelectorAll('#accountForm')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })();
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